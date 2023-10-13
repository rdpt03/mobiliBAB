<?php

// src/Controller/DefaultController.php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController {

    #[Route("/",name:"index_general")]
    public function index() {
        if ($this->getUser()!=null){
        if (in_array("ROLE_CLIENT", $this->getUser()->getRoles())) {
            return $this->redirectToRoute("index_client");
        } elseif (in_array("ROLE_COMMERCIAL", $this->getUser()->getRoles())) {
            return $this->redirectToRoute("index_commercial");
        } elseif (in_array("ROLE_VENTE", $this->getUser()->getRoles())) {
            return $this->redirectToRoute("index_vente");
        } else {
            return $this->render('default/index.html.twig', [
                        'message' => "Vous n'avez pas de rôle.",
            ]); 
        }
        }
        else{
            return $this->redirectToRoute("app_login");
        }
    }

}
