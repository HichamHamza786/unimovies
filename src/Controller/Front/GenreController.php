<?php

namespace App\Controller\Front;
use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GenreController extends AbstractController
{   
    #[Route('/genre/{id}/movies', name: 'app_genre_list')]
    public function list($id, GenreRepository $genreRepository): Response
    {
        $genres = $genreRepository->find($id);
    
        if (!$genres) {
            throw $this->createNotFoundException('Le genre n\'existe pas');
        }
    
        $movies = $genres->getMovies();
    
        return $this->render('genre/list.html.twig', [
            'movies' => $movies,
            'genres' => $genres,
        ]);
    }
    
}