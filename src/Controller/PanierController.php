<?php

namespace App\Controller;

use App\Entity\CLient;
use App\Entity\Commande;
use App\Entity\Detail;
use App\Entity\Produit;
use App\Repository\DetailRepository;
use App\Repository\ProduitRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier/{id}", name="panier")
     */
    public function index(Produit $produit, Session $session, EntityManagerInterface $entityManagerInterface,CLient $client): Response
    {
        $session->set($produit->getId(), $produit);
        $commande = new Commande();
        $commande->setCLient($client);
        $commande->setCreatedAt(date('yyyy-MM-dd'));
        $commande->setEtat(false);

        $detail = new Detail();


        $detail->setQte(1);
        $detail->setDetailProduit($produit);
        $detail->setDetailCommande($commande);

        $entityManagerInterface->persist($detail);
        $entityManagerInterface->flush();


        return $this->redirectToRoute('home');
    }


    /**
     * @Route("/list-panier/", name="listpanier")
     */
    public function list(Session $session, ProduitRepository $produitRepository)
    {
        //$produits = $session->get($produit->getId());
        $produits = $produitRepository->findAll();
        return $this->render('panier/list.html.twig', [
            'produits' => $produits
        ]);
    }
}
