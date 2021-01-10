<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController extends AbstractController
{
    function Hello($prenom):Response{

        return $this->render('hello.html.twig', [
            'prenom'=>$prenom
        ]);
    }

    function HelloList():Response{


        return $this->render('helloList.html.twig',[
            'liste'=> [
                ['prenom' => 'Patrick', 'nom' => 'Michoulier'],
                ['prenom' => 'Marc', 'nom' => 'Dutrou'],
            ]
        ]);
    }

    function form():Response{
        return new Response("
        <html lang='fr'>
            <body>
                <form method='post'>
                    Nom : <input name = 'name' />
                    <input type='submit'/>
                </form>
            </body>
        </html>
        ");
    }

    function formReceive(Request $request):Response{
        $name = $request->request->get('name');
        return new Response("Merci $name");
    }

}