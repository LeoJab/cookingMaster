<?php

namespace App\Repository;

use App\Entity\EtapeCompose;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EtapeCompose>
 *
 * @method EtapeCompose|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtapeCompose|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtapeCompose[]    findAll()
 * @method EtapeCompose[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtapeComposeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtapeCompose::class);
    }

//    /**
//     * @return EtapeCompose[] Returns an array of EtapeCompose objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EtapeCompose
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
