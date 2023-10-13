<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Materiau;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Form\MateriauType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Doctrine\ORM\EntityManagerInterface;


class AchatsAbonnementsController extends AbstractController {

    /* #[Route("/materiau/new", name:"new_materiau")]
    public function new(EntityManagerInterface $entityManager,Request $request) {

        $form = $this->createFormBuilder()
                ->add('nomM',
                        TextType::class,
                        ['required' => true]
                )
                ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $unMateriau = new Materiau();
            $unMateriau->setNomM($form->get("nomM")->getData());
            $entityManager->persist($unMateriau);
            $entityManager->flush();
            return $this->redirectToRoute('detail_materiau', array('id' => $unMateriau->getId()));
        }
        return $this->render('materiau/new.html.twig', [
                    'form' => $form->createView(),
        ]);
    }
*/
     #[Route("/client/liste", name:"liste_achats_abonnements")]
    public function liste(EntityManagerInterface $entityManager)      {
        $email = $this->getUser()->getEmail();
        $listeDesAbonnements = $this->getUser()->getLesSouscriptions();
        $listeDesTitres = $this->getUser()->getLesAchats();
        
        
        return $this->render('client/mesachats.html.twig', [
            'listeDesAbonnements' => $listeDesAbonnements,
            'listeDesTitres' => $listeDesTitres,
            'email' => $email,
            'listeDesAbonnements' => $listeDesAbonnements
        //'message' => "page d'index des clients",
        ]); // $this->render() retourne un objet Response
    }
/*     #[Route("/materiau/liste", name:"liste_materiaux")]


     #[Route("/materiau/upd/{id}", name:"upd_materiau")]
    public function upd(EntityManagerInterface $entityManager,$id, Request $request) {
        $unMateriau = $entityManager->getRepository(Materiau::class)->find($id);

        $form = $this->createForm(MateriauType::class, $unMateriau);



        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // on peut se passer de 
            //$unMateriau->setNomM($form->get("nomM")->getData());
            // car getData() a deja récupéré l'objet complet modifié
            $unMateriau = $form->getData();
            $entityManager->persist($unMateriau);
            $entityManager->flush();
        }
        return $this->render('materiau/upd.html.twig', [
                    'form' => $form->createView(),
        ]);
    }
    
    
     #[Route("/materiau/del/{id}", name:"del_materiau")]
    public function delMateriau(EntityManagerInterface $entityManager,$id) {
        $leMateriau = $entityManager->getRepository(Materiau::class)->find($id);
        $entityManager->remove($leMateriau);
        $entityManager->flush();

        return $this->redirectToRoute('liste_materiaux');
    }*/

}