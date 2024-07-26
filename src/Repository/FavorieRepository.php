<?php

namespace App\Repository;

use App\Entity\Favorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Favorie>
 *
 * @method Favorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Favorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Favorie[]    findAll()
 * @method Favorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FavorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Favorie::class);
    }

    public function getRecetteFavUti($user, $recette): ?Favorie
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.utilisateur = :u')
            ->andWhere('f.recette = :r')
            ->setParameter('u', $user)
            ->setParameter('r', $recette)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getFavorieUti($user): array
    {
        return $this->createQueryBuilder('f')
            ->select('IDENTITY(f.recette) AS recette_id')
            ->andWhere('f.utilisateur = :u')
            ->setParameter('u', $user)
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Favorie[] Returns an array of Favorie objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Favorie
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
