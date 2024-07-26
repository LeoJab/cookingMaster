<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Favorie;
use Doctrine\ORM\EntityManagerInterface;

use App\Repository\RecetteRepository;
use App\Repository\FavorieRepository;
use App\Entity\Recette;

class MainController extends AbstractController
{
    #[Route('/', name: 'default')]
    public function index(RecetteRepository $recetteRepo): Response
    {
        //dd($categorie);
        $recettes = $recetteRepo->findRecetteCategorie("Apéritifs");
        $nouvellesRecettes = $recetteRepo->findNouvelleRecetteLimite();
        //dd($categorie, $recettes, $nouvellesRecettes);

        return $this->render('main/index.html.twig', [
            'recettes' => $recettes,
            'nouvellesRecettes' => $nouvellesRecettes,
        ]);
    }

    #[Route('/recettes/{categorie}', name: 'recettes')]
    public function accueil($categorie, RecetteRepository $recetteRepo): Response
    {
        //dd($categorie);
        $recettes = $recetteRepo->findRecetteCategorie($categorie);
        $nouvellesRecettes = $recetteRepo->findNouvelleRecetteLimite();
        //dd($categorie, $recettes, $nouvellesRecettes);

        return $this->render('main/index.html.twig', [
            'recettes' => $recettes,
            'nouvellesRecettes' => $nouvellesRecettes,
        ]);
    }

    #[Route('/top_recette/{categorie}', name: 'top_recette')]
    public function top_recette($categorie, RecetteRepository $recetteRepo): Response
    {
        //dd($categorie);
        $recettes = $recetteRepo->findTopRecette($categorie);
        $nouvellesRecettes = $recetteRepo->findNouvelleRecetteLimite();
        //dd($categorie, $recettes, $nouvellesRecettes);

        return $this->render('main/top_recette.html.twig', [
            'recettes' => $recettes,
            'nouvellesRecettes' => $nouvellesRecettes,
        ]);
    }

    #[Route('/nouvelle_recette/{categorie}', name: 'nouvelle_recette')]
    public function nouvelle_recette($categorie, RecetteRepository $recetteRepo): Response
    {
        //dd($categorie);
        $recettes = $recetteRepo->findNouvelleRecette($categorie);
        $nouvellesRecettes = $recetteRepo->findNouvelleRecetteLimite();
        //dd($categorie, $recettes, $nouvellesRecettes);

        return $this->render('main/nouvelle_recette.html.twig', [
            'recettes' => $recettes,
            'nouvellesRecettes' => $nouvellesRecettes,
        ]);
    }

    #[Route('/recette/{id}', name: 'details_recette')]
    public function details_recette(Recette $recette, RecetteRepository $recetteRepo): Response
    {
        $recettes_similaires = $recetteRepo->getRecettesSimilaires($recette);
        //dd($recette, $recettes_similaires);
        
        return $this->render('main/details_recette.html.twig', [
            'details_recette' => $recette,
            'recettes_similaires' => $recettes_similaires,
        ]);
    }

    #[Route('/addFavorie/{id}', name: 'add_favorie')]
    public function add_favorie(Recette $id, EntityManagerInterface $entityManager, FavorieRepository $favorieRepo): Response
    {
        $user = $this->getUser();
        $recette_fav = $favorieRepo->getRecetteFavUti($user, $id);
        //dd($recette_fav);

        if(!$recette_fav) {
            $favorie = new Favorie();
            //dd($user, $id);
            $favorie->setUtilisateur($user);
            $favorie->setRecette($id);
            $entityManager->persist($favorie);
            $entityManager->flush();
        } else {
            $entityManager->remove($recette_fav);
            $entityManager->flush();
        }
        
        return $this->redirectToRoute('details_recette', ['id' => $id->getId()]);

    }

    #[Route('/rechercheHeader', name: "recherche_header")]
    public function recherche_header(Request $request): Response
    {
        dd($request);
        $form->handleRequest($request);
        dd($form);
        $recettes = $recetteRepo->find('%'.$info.'%');
        dd($recettes);

        return $this->render('main/index.html.twig', [
            'recettes' => $recettes,
            'nouvellesRecettes' => $nouvellesRecettes,
        ]);
    }

}
