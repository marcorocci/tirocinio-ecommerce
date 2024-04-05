<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Repository\CheckoutRepository;

class CheckoutController extends AbstractController
{
    private $checkoutRepository;

    public function __construct(CheckoutRepository $checkoutRepository) {
        $this->chekoutRepository = $checkoutRepository;
    }
    public function checkout() {
        $result = $this->checkoutRepository->findAll();
        return $this->render("checkout/checkout.html.twig", [
            'result' => $result
        ]);
    }
}


