<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Stripe\Stripe;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class StripeController extends AbstractController
{
    /**
     * @Route("/createpaiement", name="stripe")
     */
    public function index(ProduitRepository $produitRepository, Request $request, EntityManagerInterface $entityManagerInterface, Session $session): Response
    {
        $produits = $produitRepository->findAll();

        Stripe::setApiKey($this->getParameter('stripe_key'));
        $panier = $session->get('panier');
        $commande = [];

        foreach ($produits as $prod) {
            $detail_commande[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $prod->getNom(),
                    ],
                    'unit_amount' => $prod->getPrix() * 100,
                ],
                'quantity' => $prod->getQteStock(),
            ];
        }

        $stripesession = \Stripe\Checkout\Session::create([
            'line_items' => [$detail_commande],
            'mode' => 'payment',
            'success_url' => 'https://localhost:8003/stripe-success/',
            'cancel_url' => 'https://localhost:8003/stripe-error/',
        ]);
        return $this->redirect($stripesession->url);
    }


    /**
     * @Route("/stripe-error", name="stripe_error")
     */
    public function error(/*Commande $commande*/)
    {
        return $this->render('stripe/error.html.twig');
    }

    /**
     * @Route("/stripe-success/", name="stripe_success")
     */
    public function success(/*Commande $commande*/)
    {
        return $this->render('stripe/success.html.twig');
    }
}
