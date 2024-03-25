<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="vendite")
     */
    public function vendite() {
        return $this->render("vendite/vendite.html.twig");
    }
    /**
     * @Route("/prodotti", name="prodotti")
     */
    public function index() {
       return $this->render("products/products.html.twig", [
        'imgs' => ['imgs/astuccio.jpeg', 'imgs/astuccio1.jpeg', 'imgs/bicchiere.jpeg', 'imgs/bicchiere1.jpeg', 'imgs/penna.jpeg', 'imgs/penna1.jpeg'],
        'nome' =>['astuccio rosa', 'astuccio blu', 'bicchiere acqua', 'calice', 'penna sfera', 'penna bic'],
        'prezzo' => ['15,99€', '23,90€', '9,99€', '18,99€', '29,99€', '16,99€'],
       ]);
    }
    /**
     * @Route("/carrello", name="carrello")
     */
    public function cart() {
        return $this->render("cart/cart.html.twig");
     }

}



