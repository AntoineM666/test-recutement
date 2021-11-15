<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeUserController extends AbstractController
{
    #[Route('/', name: 'home_user')]
    public function index(MovieRepository $movieRepository): Response
    {

        
        return $this->render('home_user/index.html.twig', [
            'controller_name' => 'HomeUserController',
            'movies' => $movieRepository->findAll(),
        ]);




    }
    
    #[Route('/aa',methods: ['GET','POST'])] 
    public function searchBar()
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('handleSearch'))
            ->add('query', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'genre'
                ]
            ])
            ->add('recherche', SubmitType::class, [
                'attr' => [
                    'class' => 'submit'
                ]
            ])
            ->getForm();
        return $this->render('home_user/_search.html.twig', ['form' => $form->createView() ]);
            
       
    }
    
    #[Route('/handleSearch', name: 'handleSearch')]
    public function handleSearch(Request $request, MovieRepository $repo)
    {
       
        $query = $request->request->get('form')['query'];
        if($query) {
            $movie = $repo->findArticlesByName($query);
        }
        return $this->render('home_user/_search.html.twig', [
            'movies' => $movie
        ]);
    }
   
}
