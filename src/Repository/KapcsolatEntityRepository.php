<?php

namespace App\Repository;

use App\Entity\KapcsolatEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<KapcsolatEntity>
 *
 * @method KapcsolatEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method KapcsolatEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method KapcsolatEntity[]    findAll()
 * @method KapcsolatEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KapcsolatEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KapcsolatEntity::class);
    }

    public function add(KapcsolatEntity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(KapcsolatEntity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return KapcsolatEntity[] Returns an array of KapcsolatEntity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('k.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?KapcsolatEntity
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
