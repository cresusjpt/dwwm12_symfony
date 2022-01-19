<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * une annotation servant à définir les routes directement sur les fonctions
     * @Route("/", name="home")
     */
    public function index(EntityManagerInterface $manager): Response
    {
        $manager->getRepository(User::class)->findAll();

        dd($manager);
        return $this->render('home/index.html.twig', [
            'users' => $manager
        ]);
    }
}
