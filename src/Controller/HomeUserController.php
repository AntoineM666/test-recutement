<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeUserController extends AbstractController
{
    #[Route('/', name: 'home_user')]
    public function index2(MovieRepository $movieRepository): Response
    {
        return $this->render('home_user/index.html.twig', [
            'controller_name' => 'HomeUserController',
            'movies' => $movieRepository->findAll(),
        ]);
    }

   
 
   
}
