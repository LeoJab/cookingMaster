<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Recette;
use App\Entity\Ingredient;
use App\Entity\Compose;
use App\Entity\Favorie;
use App\Entity\Notation;
use App\Entity\Photo;
use App\Entity\Utilisateur;
use App\Entity\Commentaire;
use App\Entity\Etape;
use App\Entity\EtapeCompose;

class Test1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Utilisateur
        $uti1 = new Utilisateur();
        $uti1->setNom("Pierre");
        $uti1->setPrenom("Pierre");
        $uti1->setEmail("pierre.pierre@gmail.com");
        $uti1->setPassword('$2y$13$hG8TszNbiu8KqWGVfow.qOqn7pihm3CBPijBGXeVMK8NAQ3VmxqFq');
        $uti1->setDdn(new \DateTime());
        $uti1->setPp("https://picsum.photos/840/200");
        $manager->persist($uti1);

        $uti2 = new Utilisateur();
        $uti2->setNom("Pierre");
        $uti2->setPrenom("Pierre");
        $uti2->setEmail("pierre.pierre2@gmail.com");
        $uti2->setPassword('$2y$13$hG8TszNbiu8KqWGVfow.qOqn7pihm3CBPijBGXeVMK8NAQ3VmxqFq');
        $uti2->setDdn(new \DateTime());
        $uti2->setPp("https://picsum.photos/840/200");
        $manager->persist($uti2);
        
        //Recette
        $recette1 = new Recette();
        $recette1->setTitre("test notation");
        $recette1->setDescription("Les pâtes à la carbonara sont une spécialité culinaire à base de pâtes, très souvent des spaghetti, imbibés d'une émulsion d'un peu d'eau de cuisson des pâtes avec du pecorino râpé et des jaunes d'oeufs");
        $recette1->setDate(new \DateTime());
        $recette1->setSlug("pates-a-la-carbonara-a-la-francaise-1");
        $recette1->setCategorie("plats");
        $recette1->setTemps(20);
        $recette1->setDiff("Très Facile");
        $recette1->setPhoto("https://picsum.photos/840/200");
        $recette1->setUtilisateur($uti1);
        $manager->persist($recette1);

        $recette2 = new Recette();
        $recette2->setTitre("Pâtes à la 'carbonara' à la Française");
        $recette2->setDescription("Les pâtes à la carbonara sont une spécialité culinaire à base de pâtes, très souvent des spaghetti, imbibés d'une émulsion d'un peu d'eau de cuisson des pâtes avec du pecorino râpé et des jaunes d'oeufs");
        $recette2->setDate(new \DateTime());
        $recette2->setSlug("pates-a-la-carbonara-a-la-francaise-2");
        $recette2->setCategorie("plats");
        $recette2->setTemps(20);
        $recette2->setDiff("Très Facile");
        $recette2->setPhoto("https://picsum.photos/840/200");
        $recette2->setUtilisateur($uti1);
        $manager->persist($recette2);

        $recette3 = new Recette();
        $recette3->setTitre("Pâtes à la 'carbonara' à la Française");
        $recette3->setDescription("Les pâtes à la carbonara sont une spécialité culinaire à base de pâtes, très souvent des spaghetti, imbibés d'une émulsion d'un peu d'eau de cuisson des pâtes avec du pecorino râpé et des jaunes d'oeufs");
        $recette3->setDate(new \DateTime());
        $recette3->setSlug("pates-a-la-carbonara-a-la-francaise-3");
        $recette3->setCategorie("entrées");
        $recette3->setTemps(20);
        $recette3->setDiff("Très Facile");
        $recette3->setPhoto("https://picsum.photos/840/200");
        $recette3->setUtilisateur($uti1);
        $manager->persist($recette3);

        $recette4 = new Recette();
        $recette4->setTitre("Pâtes à la 'carbonara' à la Française");
        $recette4->setDescription("Les pâtes à la carbonara sont une spécialité culinaire à base de pâtes, très souvent des spaghetti, imbibés d'une émulsion d'un peu d'eau de cuisson des pâtes avec du pecorino râpé et des jaunes d'oeufs");
        $recette4->setDate(new \DateTime());
        $recette4->setSlug("pates-a-la-carbonara-a-la-francaise-4");
        $recette4->setCategorie("plats");
        $recette4->setTemps(20);
        $recette4->setDiff("Très Facile");
        $recette4->setPhoto("https://picsum.photos/840/200");
        $recette4->setUtilisateur($uti1);
        $manager->persist($recette4);

        $recette5 = new Recette();
        $recette5->setTitre("Pâtes à la 'carbonara' à la Française");
        $recette5->setDescription("Les pâtes à la carbonara sont une spécialité culinaire à base de pâtes, très souvent des spaghetti, imbibés d'une émulsion d'un peu d'eau de cuisson des pâtes avec du pecorino râpé et des jaunes d'oeufs");
        $recette5->setDate(new \DateTime());
        $recette5->setSlug("pates-a-la-carbonara-a-la-francaise-5");
        $recette5->setCategorie("apéritifs");
        $recette5->setTemps(20);
        $recette5->setDiff("Très Facile");
        $recette5->setPhoto("https://picsum.photos/840/200");
        $recette5->setUtilisateur($uti1);
        $manager->persist($recette5);

        //Ingrédients
        $ingredient1 = new Ingredient();
        $ingredient1->setNom("Carotte");
        $ingredient1->setAllergie("Aucune");
        $ingredient1->setImage("https://picsum.photos/840/200");
        $manager->persist($ingredient1);

        $ingredient2 = new Ingredient();
        $ingredient2->setNom("Carotte");
        $ingredient2->setAllergie("Aucune");
        $ingredient2->setImage("https://picsum.photos/840/200");
        $manager->persist($ingredient2);

        $ingredient3 = new Ingredient();
        $ingredient3->setNom("Carotte");
        $ingredient3->setAllergie("Aucune");
        $ingredient3->setImage("https://picsum.photos/840/200");
        $manager->persist($ingredient3);

        $ingredient4 = new Ingredient();
        $ingredient4->setNom("Carotte");
        $ingredient4->setAllergie("Aucune");
        $ingredient4->setImage("https://picsum.photos/840/200");
        $manager->persist($ingredient4);

        $ingredient5 = new Ingredient();
        $ingredient5->setNom("Carotte");
        $ingredient5->setAllergie("Aucune");
        $ingredient5->setImage("https://picsum.photos/840/200");
        $manager->persist($ingredient5);

        //Etapes
        $etape1 = new Etape();
        $etape1->setTitre('');
        $etape1->setNumero(1);
        $etape1->setContenue('Lorem ipsum dolor sit amet. Et deserunt molestias est internos animi sit officiis doloribus est esse velit aut iure magnam et consectetur labore. Est sequi porro et rerum omnis qui voluptas facilis in blanditiis ipsa qui voluptatem provident ut voluptatem natus aut nostrum placeat.');
        $etape1->setRecette($recette1);
        $manager->persist($etape1);

        $etape2 = new Etape();
        $etape2->setTitre('');
        $etape2->setNumero(2);
        $etape2->setContenue('Lorem ipsum dolor sit amet. Et deserunt molestias est internos animi sit officiis doloribus est esse velit aut iure magnam et consectetur labore. Est sequi porro et rerum omnis qui voluptas facilis in blanditiis ipsa qui voluptatem provident ut voluptatem natus aut nostrum placeat.');
        $etape2->setRecette($recette1);
        $manager->persist($etape2);

        $etape3 = new Etape();
        $etape3->setTitre('');
        $etape3->setNumero(3);
        $etape3->setContenue('Lorem ipsum dolor sit amet. Et deserunt molestias est internos animi sit officiis doloribus est esse velit aut iure magnam et consectetur labore. Est sequi porro et rerum omnis qui voluptas facilis in blanditiis ipsa qui voluptatem provident ut voluptatem natus aut nostrum placeat.');
        $etape3->setRecette($recette1);
        $manager->persist($etape3);

        //Etape Compose
        $etape_compose2 = new EtapeCompose();
        $etape_compose2->setEtape($etape2);
        $etape_compose2->setIngredient($ingredient1);
        $manager->persist($etape_compose2);

        $etape_compose3 = new EtapeCompose();
        $etape_compose3->setEtape($etape3);
        $etape_compose3->setIngredient($ingredient1);
        $manager->persist($etape_compose3);

        $etape_compose1 = new EtapeCompose();
        $etape_compose1->setEtape($etape1);
        $etape_compose1->setIngredient($ingredient1);
        $manager->persist($etape_compose1);

        //Compose
        $compose1 = new Compose();
        $compose1->setQte(3);
        $compose1->setUnite("g");
        $compose1->setRecette($recette1);
        $compose1->setIngredient($ingredient1);
        $manager->persist($compose1);

        $compose2 = new Compose();
        $compose2->setQte(3);
        $compose2->setUnite("g");
        $compose2->setRecette($recette1);
        $compose2->setIngredient($ingredient2);
        $manager->persist($compose2);

        $compose3 = new Compose();
        $compose3->setQte(3);
        $compose3->setUnite("g");
        $compose3->setRecette($recette1);
        $compose3->setIngredient($ingredient3);
        $manager->persist($compose3);

        //Commentaire
        $com1 = new Commentaire();
        $com1->setContenue("Lorem ipsum dolor sit amet. Et deserunt molestias est internos animi sit officiis doloribus est esse velit aut iure magnam et consectetur labore. Est sequi porro et rerum omnis qui voluptas facilis in blanditiis ipsa qui voluptatem provident ut voluptatem natus aut nostrum placeat.");
        $com1->setDate(new \DateTime());
        $com1->setUtilisateur($uti1);
        $com1->setRecette($recette1);
        $manager->persist($com1);

        $com2 = new Commentaire();
        $com2->setContenue("Lorem ipsum dolor sit amet. Et deserunt molestias est internos animi sit officiis doloribus est esse velit aut iure magnam et consectetur labore. Est sequi porro et rerum omnis qui voluptas facilis in blanditiis ipsa qui voluptatem provident ut voluptatem natus aut nostrum placeat.");
        $com2->setDate(new \DateTime());
        $com2->setUtilisateur($uti1);
        $com2->setRecette($recette1);
        $manager->persist($com2);

        $com3 = new Commentaire();
        $com3->setContenue("Lorem ipsum dolor sit amet. Et deserunt molestias est internos animi sit officiis doloribus est esse velit aut iure magnam et consectetur labore. Est sequi porro et rerum omnis qui voluptas facilis in blanditiis ipsa qui voluptatem provident ut voluptatem natus aut nostrum placeat.");
        $com3->setDate(new \DateTime());
        $com3->setUtilisateur($uti1);
        $com3->setRecette($recette2);
        $manager->persist($com3);

        //Notation
        $not1 = new Notation();
        $not1->setValue(5);
        $not1->setUtilisateur($uti1);
        $not1->setRecette($recette1);
        $manager->persist($not1);

        $not2 = new Notation();
        $not2->setValue(3);
        $not2->setUtilisateur($uti2);
        $not2->setRecette($recette1);
        $manager->persist($not2);

        $not3 = new Notation();
        $not3->setValue(3);
        $not3->setUtilisateur($uti2);
        $not3->setRecette($recette2);
        $manager->persist($not3);

        $not4 = new Notation();
        $not4->setValue(3);
        $not4->setUtilisateur($uti2);
        $not4->setRecette($recette3);
        $manager->persist($not4);

        $not5 = new Notation();
        $not5->setValue(3);
        $not5->setUtilisateur($uti2);
        $not5->setRecette($recette4);
        $manager->persist($not5);

        //Photo
        $pho1 = new Photo();
        $pho1->setUrl("https://picsum.photos/840/200");
        $pho1->setRecette($recette1);
        $manager->persist($pho1);

        $pho2 = new Photo();
        $pho2->setUrl("https://picsum.photos/840/200");
        $pho2->setRecette($recette1);
        $manager->persist($pho2);

        $pho3 = new Photo();
        $pho3->setUrl("https://picsum.photos/840/200");
        $pho3->setRecette($recette1);
        $manager->persist($pho3);

        $pho4 = new Photo();
        $pho4->setUrl("https://picsum.photos/840/200");
        $pho4->setRecette($recette4);
        $manager->persist($pho4);

        $pho5 = new Photo();
        $pho5->setUrl("https://picsum.photos/840/200");
        $pho5->setRecette($recette5);
        $manager->persist($pho5);

        //Favorie
        $fav1 = new Favorie();
        $fav1->setUtilisateur($uti1);
        $fav1->setRecette($recette1);
        $manager->persist($fav1);

        $manager->flush();
    }
}
