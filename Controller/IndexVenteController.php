<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexVenteController extends AbstractController
 {
     #[Route("/index/vente", name:"index_vente")]
     public function index()
     {
        
        return $this->render('default/index.html.twig', [
            'message' => "page d'index des vendeurs",
            'corps' => "Mes Tickets"
        ]); // $this->render() retourne un objet Response
     }
}
