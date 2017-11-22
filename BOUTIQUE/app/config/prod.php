<?php

$app['db.options'] = array(
    'host' => 'localhost',
    'dbname' => 'base_site',
    'user' => 'root',
    'password' => '',
    'charset' => 'utf8',
);

// Doctrine DBAL est prévue pour récupérer nos informations de connexion à la BDD grace à $app['db.options']
// voila pourquoi on les met ici :)
// Quand on passe notre site sur le serveur distant de OVH ou autre registres,
// c'est ici que nous viendrions changer les informations de connexion à la BDD.













 ?>
