<?php

namespace App\Repository;

use App\Entity\Onboarding;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Onboarding>
 *
 * @method Onboarding|null find($id, $lockMode = null, $lockVersion = null)
 * @method Onboarding|null findOneBy(array $criteria, array $orderBy = null)
 * @method Onboarding[]    findAll()
 * @method Onboarding[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OnboardingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Onboarding::class);
    }

//    /**
//     * @return Onboarding[] Returns an array of Onboarding objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Onboarding
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
