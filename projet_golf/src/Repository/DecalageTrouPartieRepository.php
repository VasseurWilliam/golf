<?php

namespace App\Repository;

use App\Entity\DecalageTrouPartie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DecalageTrouPartie|null find($id, $lockMode = null, $lockVersion = null)
 * @method DecalageTrouPartie|null findOneBy(array $criteria, array $orderBy = null)
 * @method DecalageTrouPartie[]    findAll()
 * @method DecalageTrouPartie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DecalageTrouPartieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DecalageTrouPartie::class);
    }

    // /**
    //  * @return DecalageTrouPartie[] Returns an array of DecalageTrouPartie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DecalageTrouPartie
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
