<?php

namespace App\Repository;

use App\Entity\CLient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CLient|null find($id, $lockMode = null, $lockVersion = null)
 * @method CLient|null findOneBy(array $criteria, array $orderBy = null)
 * @method CLient[]    findAll()
 * @method CLient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CLientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CLient::class);
    }

    // /**
    //  * @return CLient[] Returns an array of CLient objects
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
    public function findOneBySomeField($value): ?CLient
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
