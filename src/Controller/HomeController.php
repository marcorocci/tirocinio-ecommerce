<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Repository\ProdottiRepository;
use App\Repository\CartRepository;

class HomeController extends AbstractController
{
    private $prodottiRepository;
    private $cartRepository;

    public function __construct(ProdottiRepository $prodottiRepository, CartRepository $cartRepository) {
        $this->prodottiRepository = $prodottiRepository;
        $this->cartRepository = $cartRepository;
    }

    
    public function prodotti() {
        $products = $this->prodottiRepository->findAll();
        $result = $this->cartRepository->findByName();
        $categorie = $this->prodottiRepository->findCategories();
        return $this->render("products/products.html.twig", [
            'products' => $products,
            'cartProd' => $result,
            'categories' => $categorie
        ]);
    }
}


