<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'ferney'=>'helllo fernye si se puede '
        ]);
    }

    public function animales($nombre,$apellidos){
        $animales=array('perro','leon','ballena','gato','raton');
        $pajaros=array(
            'tipo'=>'palomo',
            'color'=>'gris',
            'edad'=>4,
            'raza'=>'kely'
        );
        /* dump($pajaros);exit(); */
        $title="Bienvemido a la pagina de animales ".$nombre."---".$apellidos;
        return $this->render('home/animales.html.twig',[
            'title'=>$title,
            'animales'=>$animales,
            'aves'=>$pajaros
            ]);
    }

    public function redirigir(){
        return $this->redirectToRoute('animales',[
            'nombre'=>'ferney',
            'apellidos'=>'9'
        ]); 
        /* return $this->redirect('wwww.google.com'); */
    }
}
