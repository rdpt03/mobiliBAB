<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexCommercialController extends AbstractController
 {
    #[Route("/index/commercial", name:"index_commercial")]
     public function index()
     {
        
        return $this->render('default/index.html.twig', [
            'message' => "page d'index des commerciaux",
        ]); // $this->render() retourne un objet Response
     }
}
