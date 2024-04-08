<?php

namespace App\Repository;

use App\Entity\Promozioni;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Promozioni>
 *
 * @method Promozioni|null find($id, $lockMode = null, $lockVersion = null)
 * @method Promozioni|null findOneBy(array $criteria, array $orderBy = null)
 * @method Promozioni[]    findAll()
 * @method Promozioni[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PromozioniRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Promozioni::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Promozioni $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Promozioni $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function isPromoCode($promoCode) {
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
            select codicePromozionale, sconto, dataInizio, dataFine from Promozioni where codicePromozionale = :promoCode;
        ';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':promoCode', $promoCode);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function removePromoCode($promoCode) {
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
            DELETE FROM Promozioni WHERE codicePromozionale = :promoCode;
        ';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':promoCode', $promoCode);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    
    // /**
    //  * @return Promozioni[] Returns an array of Promozioni objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Promozioni
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
