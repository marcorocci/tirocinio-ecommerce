<?php

namespace App\Repository;

use App\Entity\Cart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cart>
 *
 * @method Cart|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cart|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cart[]    findAll()
 * @method Cart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cart::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Cart $entity, bool $flush = true): void
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
    public function remove(Cart $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findByName() {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            select cart.id, nome, descrizione, prezzo, imagePath, quantita, categoria from prodotti inner join cart on cart.idProdotto = prodotti.id order by aggiunto;
            ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }



    public function totalprice(){
        $tot = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT SUM(p.prezzo * c.quantita) AS total_price
        FROM prodotti p
        JOIN cart c ON p.id = c.idProdotto;
        ';
        $stmt = $tot->prepare($sql);
        $resultSet = $stmt->executeQuery();

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();

    }
    public function carusel($categoria){
        $car = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT * FROM prodotti WHERE categoria = :categoria
        ';
        
       
        $stmt = $car->prepare($sql); 
        $stmt->bindValue(':categoria', $categoria);
        $resultSet = $stmt->executeQuery();

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();

    }
    




    public function inserToCart($idProdotto) {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            INSERT INTO cart (quantita, idProdotto)
            VALUES (1, :idProdotto)
            ON DUPLICATE KEY UPDATE
            quantita = quantita + 1;
        ';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':idProdotto', $idProdotto);
        $resultSet = $stmt->executeQuery();

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    public function removeFromCart($idCarrello) {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        DELETE FROM cart WHERE id = :idCarrello
        ';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':idCarrello', $idCarrello);
        $resultSet = $stmt->executeQuery();

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    




    // /**
    //  * @return Cart[] Returns an array of Cart objects
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
    public function findOneBySomeField($value): ?Cart
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
