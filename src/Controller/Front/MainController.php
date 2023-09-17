<?php

namespace App\Controller\Front;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(MovieRepository $movieRepository): Response
    {   
        $movies = $movieRepository->findAll();

        return $this->render('main/home.html.twig', [
            'movies' => $movies,
        ]);
    }
}
