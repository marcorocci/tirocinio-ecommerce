<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Repository\PromozioniRepository;

class PromozioniController extends AbstractController
{
    private $promoRepo;
    public function __construct(PromozioniRepository $promoRepo) {
        $this->promoRepo = $promoRepo;
    }
    public function index(Request $request): Response {
        $postData = $request->request->all();
        if (array_key_exists("remove", $postData)) {
            $code = $postData["promoCode"];
            $this->promoRepo->removePromoCode($code);
            return $this->json("Removed");
        }
        if(array_key_exists("promoCode", $postData)){
            $code = $postData["promoCode"];
            return $this->json($this->promoRepo->isPromoCode($code));
        }
        return [];
        
    }

}
