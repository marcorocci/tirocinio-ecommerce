<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use App\Repository\CartRepository;

class OrderController extends AbstractController
{
    private $orders;
    private $cartRepository;
    public function __construct(CartRepository $cartRepository)
    {
        $this->orders = [];
        $this->cartRepository = $cartRepository;
    }

    public function index(Request $request): Response
    {
        $result = $this->cartRepository->findByName();
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
            'cartProd' => count($result)
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
