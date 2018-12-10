<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Animal;
class AnimalController extends AbstractController
{
   
    public function index()
    {
        return $this->render('animal/index.html.twig', [
            'controller_name' => 'AnimalController',
        ]);
    }

    public function save(){
        //Guardar en una tabla de la base de datos

        //Cargar el entitymanager
        $entityManager=$this->getDoctrine()->getManager();
        
        //Crear el objeto
        $animal=new Animal();
        
        $animal->setTipo('13sasas');
        $animal->setColor('Verde');
        $animal->setRaza('africana');
        
        
        $animal->setTipo('16asas');
        $animal->setColor('Verdesss');
        $animal->setRaza('africanasss');
        //Guradar objeto endocrine
        $entityManager->persist($animal);
        //Guardar o volcar los datos en la tabla
        $entityManager->flush();

        return new Response('El animal Gua:rdado tiene el id: '.$animal->getId());
    }

    public function animal($id){

        //cargar repositorio
        $repAnimal=$this->getDoctrine()->getRepository(Animal::class);

        //consulta
        $animal=$repAnimal->find($id);
        
        if(!$animal){
            $message='En animal no existe';
        }else{
            $message='Tu animal elegido es:'.$animal->getTipo();
        }

        return new Response('Hola desde la terminal:'.$message);
    }
}
