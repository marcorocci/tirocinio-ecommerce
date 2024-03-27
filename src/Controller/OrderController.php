<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;

class OrderController extends AbstractController
{
    private $orders;
    public function __construct()
    {
        $this->orders = [];
    }

    public function index(Request $request): Response
    {
        $session = $request->getSession();

        for($i = 0; $i < 10; $i++)
        {
            $order = [
                'id' => $i,
                'products' => [
                    'product1',
                    'product2',
                ],
            ];
            $this->addOrder($order);
        }

        return $this->render('orders/index.html.twig', [
            'orders' => $this->getOrders(),
        ]);
    }
    /**
     * ordine 1 -> prodotto 1, prodotto 2.
     * opzioni: traccia, restituisci
     */
    private function addOrder($order)
    {
        $this->orders[] = $order;
    }

    private function getOrders()
    {
        return $this->orders;
    }
}
