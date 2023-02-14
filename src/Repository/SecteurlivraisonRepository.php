<?php

namespace App\Repository;

use App\Entity\Secteurlivraison;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Secteurlivraison>
 *
 * @method Secteurlivraison|null find($id, $lockMode = null, $lockVersion = null)
 * @method Secteurlivraison|null findOneBy(array $criteria, array $orderBy = null)
 * @method Secteurlivraison[]    findAll()
 * @method Secteurlivraison[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecteurlivraisonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Secteurlivraison::class);
    }

    public function add(Secteurlivraison $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Secteurlivraison $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Secteurlivraison[] Returns an array of Secteurlivraison objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Secteurlivraison
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
