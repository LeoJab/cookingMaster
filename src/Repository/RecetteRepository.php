<?php

namespace App\Repository;

use App\Entity\Recette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recette>
 *
 * @method Recette|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recette|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recette[]    findAll()
 * @method Recette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recette::class);
    }

    public function findRecetteCategorie($categorie): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.categorie = :c')
            ->setParameter('c', $categorie)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findNouvelleRecetteLimite(): array
    {
        return $this->createQueryBuilder('n')
            ->orderBy('n.date', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findNouvelleRecette($categorie): array
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.categorie = :c')
            ->setParameter('c', $categorie)
            ->orderBy('n.date', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getRecettesSimilaires(Recette $recette) 
    { 
        $qb = $this->createQueryBuilder('r'); 
        $qb->andWhere($qb->expr()->neq('r.id', $recette->getId())); 
        $qb->expr()->eq('r.categorie', $qb->expr()->literal($recette->getCategorie()));
        $qb->orderBy('RAND()');
        $qb->setMaxResults(3);
        return $qb->getQuery()->getResult(); 
    }

    /* public function getAvgByRecette(Product $product): int 
    { 
        $qb = $this->createQueryBuilder('pr'); 
        $qb->select('AVG(pr.rating) AS avg') 
            ->where($qb->expr()->eq('pr.product', $product->getId())); 
        $result = $qb->getQuery()?->getSingleScalarResult(); 
        return $result !== null ? $result : 5; 
    } */

    public function findTopRecette($categorie): array
    {
        $qb = $this->createQueryBuilder('r')->leftJoin('r.notation', 'n'); 
        $qb->andWhere($qb->expr()->eq('r.categorie', $qb->expr()->literal($categorie)));
        $qb->groupBy('r.id')->orderBy('AVG(n.value)', 'DESC'); 
        return $qb->getQuery()->getResult();
    }

    public function getRecetteUtilisateur($user): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.utilisateur = :u')
            ->setParameter('u', $user)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getRecettesFavs($recettes_favs): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.id = :f')
            ->setParameter('f', $recettes_favs)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getObjectRecette($recette): object 
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.id = :t')
            ->setParameter('t', $recette)
            ->getQuery()
            ->getOneOrNullResult();
    }

//    /**
//     * @return Recette[] Returns an array of Recette objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Recette
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
