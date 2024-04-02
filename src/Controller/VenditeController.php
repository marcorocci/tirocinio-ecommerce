<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Repository\CartRepository;
use App\Repository\VenditeRepository;

class VenditeController extends AbstractController
{
    private $cartRepository;
    private $venditeRepository;

    public function __construct(CartRepository $cartRepository, VenditeRepository $venditeRepository) {
        $this->cartRepository = $cartRepository;
        $this->venditeRepository =  $venditeRepository;
    }

    public function vendite() {
        // $morrisData = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $morrisData[] =  [
        //         'year' => '2020', 
        //         'sales' => 12 + $i
        //     ];
        // }  
        $cartProd = $this->cartRepository->findByName();
        $result = $this->venditeRepository->totAnn();
        return $this->render("vendite/vendite.html.twig", [
            "data" =>  json_encode($result),
            'cartProd' => $cartProd
        ]);
    }
}


