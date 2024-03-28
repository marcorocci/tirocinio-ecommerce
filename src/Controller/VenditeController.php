<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Repository\CartRepository;

class VenditeController extends AbstractController
{
    private $cartRepository;

    public function __construct(CartRepository $cartRepository) {
        $this->cartRepository = $cartRepository;
    }

    public function vendite() {
        $morrisData = [];
        for ($i = 0; $i < 10; $i++) {
            $morrisData[] =  [
                'year' => '2020', 
                'sales' => 12 + $i
            ];
        }  
        $cartProd = $this->cartRepository->findByName();
       return $this->render("vendite/vendite.html.twig", [
        "data" =>  json_encode($morrisData),
        'cartProd' => $cartProd
       ]);
    }
}


