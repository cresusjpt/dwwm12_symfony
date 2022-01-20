<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StockController extends AbstractController
{

    /**
     * @Route("/stock", name="stock")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('categorie_crud/index.html.twig', [
            'categories' => $categorieRepository->findAll(),
        ]);
    }
}
