<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexClientController extends AbstractController
 {

     #[Route("/client/index", name:"index_client")]
     public function index()
     {
        $email = $this->getUser()->getEmail();
        $rib = $this->getUser()->getRib();;
        return $this->render('client/index.html.twig', [
            'email' => $email,
            'rib' => $rib,
        
        //'message' => "page d'index des clients",
        ]); // $this->render() retourne un objet Response
     }
     
     
}
