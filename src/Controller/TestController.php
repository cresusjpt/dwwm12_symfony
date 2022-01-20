<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @IsGranted("ROLE_ADMIN")
 */
class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/hello", name="hello")
     */
    public function hello()
    {
        var_dump("avant l'application du role");

        $this->denyAccessUnlessGranted("ROLE_STOCK");

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
