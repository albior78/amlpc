<?php

namespace App\Repository;

use App\Entity\Carouselhome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Carouselhome|null find($id, $lockMode = null, $lockVersion = null)
 * @method Carouselhome|null findOneBy(array $criteria, array $orderBy = null)
 * @method Carouselhome[]    findAll()
 * @method Carouselhome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarouselhomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Carouselhome::class);
    }

    // /**
    //  * @return Carouselhome[] Returns an array of Carouselhome objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Carouselhome
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
