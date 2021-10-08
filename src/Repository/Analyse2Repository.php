<?php

namespace App\Repository;

use App\Entity\Analyse2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Analyse2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Analyse2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Analyse2[]    findAll()
 * @method Analyse2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Analyse2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Analyse2::class);
    }

    // /**
    //  * @return Analyse2[] Returns an array of Analyse2 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Analyse2
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
