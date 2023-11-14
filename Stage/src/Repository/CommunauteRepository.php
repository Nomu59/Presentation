<?php

namespace App\Repository;

use App\Entity\Communaute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Communaute>
 *
 * @method Communaute|null find($id, $lockMode = null, $lockVersion = null)
 * @method Communaute|null findOneBy(array $criteria, array $orderBy = null)
 * @method Communaute[]    findAll()
 * @method Communaute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommunauteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Communaute::class);
    }

//    /**
//     * @return Communaute[] Returns an array of Communaute objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Communaute
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
