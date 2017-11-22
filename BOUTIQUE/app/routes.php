<?php

use Symfony\Component\HttpFoundation\Request; // request est la classe Symfony qui gérer les requêtes HTTP (POST). On ne récupère pas les infos avec $_POST diectement
// créer cela en étape 6.3 et commenté en etape 7.9
// $app -> get('/', function(){
//     require '../src/model.php';
//     // Fichier qui contient notre fonction afficheAll()
//
//     $infos = afficheAll();
//
//     $produits = $infos['produits'];
//     $categories = $infos['categories'];
//
//     ob_start();// Enclenche la temporisation. Cela signifie que tout ce qui suit ne sera pas executé.
//     require '../views/view.php';
//     $view = ob_get_clean();// Stocke tout ce qui a été retenu dans une variable.
//     return $view;

    //Ici on a stocké notre vue dans la varieble $view grace à (ob_start() et ob_get_clean()).
    //Ensuite on return la vue.
    // C'est la base de la fonction render() qu'on utilisera par la suite.

    //
//});
// Créer en étape 7.9 :

// Route pour l'affichage de ma home :
$app -> get('/', "BOUTIQUE\Controller\BaseController::indexAction")->bind('home');

// Route pour l'affichage d'un produit
$app -> get('/fiche_produit/{id}', "BOUTIQUE\Controller\ProduitController::produitAction")->bind('fiche_produit');

// On souhaite construire une nouvelle route (fonctionnalité/affichage) qui va nous afficher tous les produits en fonction de la catégorie. l'URL souhaitée est : www.boutique.dev/boutique/nom_de_la_catégorie
$app -> get('/boutique/{categorie}', "BOUTIQUE\Controller\ProduitController::boutiqueAction")->bind('boutique');

// Route pour l'affichage du profil du membre
$app -> get('/profil', "BOUTIQUE\Controller\MembreController::profilAction")->bind('profil');

// Fonctionnalité pour le formulaire de contact : /contact
$app -> match('/contact/', "BOUTIQUE\Controller\BaseController::contactAction")->bind('contact');

// Route pour l'affichage du tableau contenant les produits
$app -> get('/backoffice/produit', "BOUTIQUE\Controller\BackofficeController::produitAction")->bind('bo_produit');

// Route pour ajouter un nouveau produit
$app -> match('/backoffice/produit/add', "BOUTIQUE\Controller\BackofficeController::addProduitAction")->bind('bo_produit_add');
