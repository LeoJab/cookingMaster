<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Utilisateur;
use App\Repository\RecetteRepository;
use App\Repository\FavorieRepository;
use App\Repository\CommentaireRepository;
use App\Form\UpdateInfoUserType;
use App\Form\PassWordFormType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/monCompte')]
class MonCompteController extends AbstractController
{
    #[Route('/mesInformations', name: 'mes_infos')]
    public function mon_compte(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $hasherPassword): Response
    {
        if(!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        };

        $user = $this->getUser();

        $form = $this->createForm(UpdateInfoUserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            //dd($form->getData());
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('mes_infos');
        }

        $formPassWord = $this->createForm(PassWordFormType::class, $user);
        $formPassWord->handleRequest($request);
        if($formPassWord->isSubmitted() && $formPassWord->isValid()) {
            $user->setPassword( $hasherPassword->hashPassword( $user, $formPassWord->get('plainPassword')->getData() ) );
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('mes_infos');
        }

        return $this->render('mon_compte/mes_infos.html.twig', [
            'form' => $form,
            'formPassWord' => $formPassWord,
        ]);
    }

    #[Route('/mesRecettes', name: 'mes_recettes')]
    public function mes_recettes(RecetteRepository $recetteRepo): Response
    {
        $user = $this->getUser();

        $recettes = $recetteRepo->getRecetteUtilisateur($user);
        //dd($recettes);

        return $this->render('mon_compte/mes_recettes.html.twig', [
            'recettes' => $recettes,
        ]);
    }

    #[Route('/mesFavories', name: 'mes_favories')]
    public function mes_favories(FavorieRepository $favRepo, RecetteRepository $recetteRepo): Response
    {
        $user = $this->getUser();
        $recettes_favs = $favRepo->findBy(['utilisateur' => $user]);
        //dd($recettes_favs);

        return $this->render('mon_compte/mes_favories.html.twig', [
            'recettes_favs' => $recettes_favs,
        ]);
    }

    #[Route('/mesCommentaires', name: 'mes_commentaires')]
    public function mes_commentaires(CommentaireRepository $comRepo): Response
    {
        $user = $this->getUser();

        $commentaires = $comRepo->findBy(['utilisateur' => $user]);

        return $this->render('mon_compte/mes_commentaires.html.twig', [
            'commentaires' => $commentaires,
        ]);
    }
}
