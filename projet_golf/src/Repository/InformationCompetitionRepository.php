<?php

namespace App\Repository;

use App\Entity\InformationCompetition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method InformationCompetition|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformationCompetition|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformationCompetition[]    findAll()
 * @method InformationCompetition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationCompetitionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InformationCompetition::class);
    }

    // /**
    //  * @return InformationCompetition[] Returns an array of InformationCompetition objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InformationCompetition
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
