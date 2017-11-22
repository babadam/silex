<?php

namespace BOUTIQUE\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MembreController
{
    public function profilAction(Application $app)
    {
        session_start();
            $_SESSION['membre']['pseudo'] = 'Yakine';
            $_SESSION['membre']['id_membre'] = '1';
            $_SESSION['membre']['sexe'] = 'm';
            $_SESSION['membre']['prenom'] = 'Yakine';
            $_SESSION['membre']['nom'] = 'Hamida';
            $_SESSION['membre']['email'] = 'yakine.hamida@evogue.fr';
            $_SESSION['membre']['adresse'] = '142 avenue Jean Jaures';
            $_SESSION['membre']['code_postal'] = 93150;
            $_SESSION['membre']['ville'] = 'Pantin';
            $_SESSION['membre']['statut'] = '0';

       $params = array(
           'membre' => $_SESSION['membre'],
           'title' => 'Profil'
       );


       return $app['twig'] -> render('profil.html.twig', $params);
    }

}
