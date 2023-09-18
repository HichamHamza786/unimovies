<?php

namespace App\Controller\Front;

use App\Entity\Movie;
use App\Repository\GenreRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(MovieRepository $movieRepository, GenreRepository $genreRepository): Response
    {   
        $movies = $movieRepository->findAll();
        $genres = $genreRepository->findAll();

        return $this->render('main/home.html.twig', [
            'movies' => $movies,
            'genres' => $genres,
        ]);
    }
}
