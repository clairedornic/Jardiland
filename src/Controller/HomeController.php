<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use PhpCsFixer\DocBlock\Annotation as DocBlockAnnotation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/",  name="home")
     */
    public function home(CategoryRepository $catRepo, ProductRepository $productRepo): Response
    {
        return $this->render('home.html.twig', [
            'categories' => $catRepo -> findAll(),
            'highlighted_products' => $productRepo -> findBy(array('highlighted' => true)),
       ]);
    }
}