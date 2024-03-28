<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Repository\CartRepository;

class AndamentoProdottiController extends AbstractController
{
    private $cartRepository;
    public function __construct(CartRepository $cartRepository) {
        $this->cartRepository = $cartRepository;
    }
    public function andamento(): Response {
        $result = $this->cartRepository->findByName();
       /* $salesData = $this->getDoctrine()
        ->getConnection()
        ->fetchAllAssociative('
            SELECT YEAR(created_at) AS year, SUM(price) AS salesA
            FROM sales
            WHERE product_id = ?
            GROUP BY YEAR(created_at)
            ORDER BY YEAR(created_at)
        ', [$productId]);
        */
        $morrisData = [];
        for ($i = 0; $i < 10; $i++) {
            $morrisData[] =  [
                'year' => '2020', 
                'sales' => 12 + $i
            ];
        }  
        return $this->render("vendite/vendite.html.twig", [
            "data" =>  json_encode($morrisData),
            'cartProd' => $result
        ]); 
        
    }

}
