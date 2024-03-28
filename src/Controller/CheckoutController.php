<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Repository\CartRepository;

class CheckoutController extends AbstractController
{
    private $cartRepository;

    public function __construct(CartRepository $cartRepository) {
        $this->cartRepository = $cartRepository;
    }
    public function checkout() {
        $result = $this->cartRepository->findAll();
        return $this->render("checkout/checkout.html.twig", [
            'cartProd' => $result
        ]);
    }
}


