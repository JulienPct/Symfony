<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CakeController extends AbstractController
{
    /**
     * @Route("/cake", name="cake")
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function createCake(EntityManagerInterface $entityManager): Response
    {
        $cake = new Cake();
        $cake -> setName('Fraisier');

        $entityManager -> persist($cake);
        $entityManager -> flush();

        return new Response('Saved new cake with id '.$cake->getId());
    }
}
