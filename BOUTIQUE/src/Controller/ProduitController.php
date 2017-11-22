<?php

namespace BOUTIQUE\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use BOUTIQUE\Entity\Produit;

class ProduitController
{
    public function produitAction($id, Application $app)
    {
        $pdt = $app['dao.produit']->findById($id); // $pdt recupère le resultat de la requete qui se trouve dans PoduitDAO
        // SELECT * FROM produit WHERE id_produit = $id

        $params = array(
            'produit' => $pdt,
            'title' => 'Fiche produit'
        );

        return $app['twig'] -> render('fiche_produit.html.twig', $params);
    }
    
    public function boutiqueAction($categorie, Application $app)
    {
        // Etape 1 : récupérer les produits en fonctions de $categorie
        // SELECT * FROM produit WHERE categorie = '$categorie'
        $produits = $app['dao.produit']->findAllByCategorie($categorie); // $pdt recupère le resultat de la requete qui se trouve dans PoduitDAO

        // Etape 2 : Récupérer également toutes les catégories pour ré-afficher le menu latérel
        $categories = $app['dao.produit'] -> findAllCategories();

        $params = array(
            'produits' => $produits,
            'categories' => $categories,
            'title' => 'Nos ' . $categorie . 's'
        );

        return $app['twig'] -> render('index.html.twig', $params);
    }
}
