<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use App\Form\RecetteType;

use App\Entity\Recette;
use App\Repository\EtapeRepository;
use App\Repository\ComposeRepository;
use App\Repository\PhotoRepository;

class RecetteController extends AbstractController
{
    #[Route('/recette/add', name: 'app_recette_add')]
    public function app_recette_add(): Response
    {


        return $this->render('recette/add_recette.html.twig', [
            'controller_name' => 'RecetteController',
        ]);
    }

    #[Route('/recette/update/{recette}', name: 'app_recette_update')]
    public function app_recette_update(Recette $recette, Request $request): Response
    {
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) 
        { 
            dd($form->getData()); 
        }

        //dd($form);

        return $this->render('recette/update_recette.html.twig', [
            //'form' => $form,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/recette/delete/{recette}', name: 'app_recette_delete')]
    public function app_recette_delete(Recette $recette, EntityManagerInterface $entityManager): Response
    {   
        $entityManager->remove($recette);
        $entityManager->flush();

        return $this->redirectToRoute('mes_recettes');
    }
}
