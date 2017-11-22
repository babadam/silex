<?php

namespace BOUTIQUE\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use BOUTIQUE\Form\Type\ContactType;
use BOUTIQUE\Entity\Produit;

class BaseController
{
    public function indexAction(Application $app) // indexAction est la fonction qui doit etre capable de me retouner l'index
    {
        $produits = $app['dao.produit'] -> findAll();
        // $produits = objetModelProduit(ProduitDAO) -> findAll();
        // produits est un tableau multidimentionnel composé d'objet.
        $categories = $app['dao.produit'] -> findAllCategories();


          // Mis en commentaire à l'etape 8.6
          // ob_start();// Enclenche la temporisation. Cela signifie que tout ce qui suit ne sera pas executé.
          // require '../views/view.php';
          // $view = ob_get_clean();// Stocke tout ce qui a été retenu dans une variable.
          // return $view;

          // Ajouté à l'étape 8.6
          $params = array(
              'produits' => $produits,
              'categories' => $categories,
              'title' => 'Accueil'
          );
          return $app['twig'] -> render('index.html.twig', $params);
    }

    public function contactAction(Request $request, Application $app)
    {
        $contactForm = $app['form.factory'] -> create(ContactType::class);
        $contactForm -> handleRequest($request);

        if($contactForm -> isSubmitted() && $contactForm -> isValid()){ //isValid vérifie les conditions qu'on a posé dans ContactType
            $data = $contactForm -> getData(); // meme fonction que $_POST
            echo '<pre>';
            print_r($data);
            echo '</pre>';

            // fonction mail()
            extract($data);
            // $prenom, $sujet, $nom, $email, $message
            // $headers (cf cours PHP formulaire5.php)
            //mail();

        }


        $contactFormView = $contactForm -> createView();

        $params = array(
            'title' => 'Formulaire Contact',
            'contactForm' => $contactFormView
        );

        return $app['twig'] -> render('contact.html.twig', $params);
    }
}
