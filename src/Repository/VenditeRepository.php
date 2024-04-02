<?php

namespace App\Repository;

use App\Entity\Vendite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vendite>
 *
 * @method Vendite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vendite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vendite[]    findAll()
 * @method Vendite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VenditeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vendite::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Vendite $entity, bool $flush = true): void
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
    public function remove(Vendite $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function totAnn() {
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
            select year(dataVendita) as anno, GROUP_CONCAT(DISTINCT nome) as nome, COUNT(prezzoTotale) as prodotti_venduti
            from Vendite
            inner join prodotti on prodotti.id = Vendite.idProdotto
            group by year(dataVendita);
        ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchAllAssociative();
    }
    // /**
    //  * @return Vendite[] Returns an array of Vendite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vendite
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
