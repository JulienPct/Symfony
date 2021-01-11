<?php


namespace App\Controller\Forms;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends AbstractController
{

    public function loginForm(Request $request):Response{

        $form = $this->createForm(LoginFormType::class);

        //Aucun message par défaut
        $message = null;
        //Prise en charge de la requête
        $form->handleRequest($request);
        //On vérifie si le formulaire a été soumis (clic sur Envoyer) et s'il est valide (valeurs bien formées)
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $login = $data['login'];
            $password = $data['password'];

            return $this->redirectToRoute('hello', ['prenom'=>$data['login']]);
        }else if ($form->isSubmitted()){
            $message = 'Login ou mot de passe mal formé';
        }

        //L'appel à createView génère une version utilisable par le moteur de rendu
        $formView = $form->createView();

        return $this->render('login.html.twig', ['form'=>$formView, 'message'=>$message]);

    }

}