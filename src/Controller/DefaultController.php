<?php

namespace App\Controller;

use App\Entity\Employe;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'default_home')]
    public function home(EntityManagerInterface $entityManager): Response
    {   //Permet de recuperer toutes les lignes de la table employe
        $employes = $entityManager->getRepository(Employe::class)->findAll();
        
        //On passe le variable $employes a render Twig pour les afficher
        return $this->render('default/home.html.twig', [
            'employes' => $employes
        ]);
    }
}
