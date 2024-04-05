<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Repository\CartRepository;

class CarrelloController extends AbstractController
{
    private $cartRepository;

    public function __construct(CartRepository $cartRepository) {
        $this->cartRepository = $cartRepository;
    }

    public function cart() {
        
        $result = $this->cartRepository->findByName(); 
        $tot = $this->cartRepository->totalprice();
        
        return $this->render("cart/cart.html.twig", [
            "products" => $result,
            "tot"=> json_encode ($tot)
            
        ]); 
    }
    
    public function handlePost(Request $request) {
        $postData = $request->request->all();
        
           
        if(array_key_exists("prodottoId", $postData)){
            
            $id = $postData["prodottoId"];
            $info = $this->cartRepository->inserToCart($id); 
        }
        else if (array_key_exists("idCarrello", $postData)){
            
            $id = $postData["idCarrello"];
            $info = $this->cartRepository->removeFromCart($id); 
        }

        else {
            return $this->json(['message' => "Operazione non riuscita"]);
        }
        return $this->cart();
    }
}


