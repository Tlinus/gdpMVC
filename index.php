<?php

session_start();
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array(
    'debug' => true
    ));
$twig->addExtension(new Twig_Extension_Debug());

include_once('./zOthers/BDD/connectbdd.php');
include_once('./controller/login_controller.php');
$page = new LoginController();

/**
 * With Composer and autoload
 * Twig Php Template Engine
 * En dessous les config de Twig pas à toucher
 */



/**
 * Ici les data de la base de donnée
 * Envoie à la vue par Twig
 */

//$template = $twig->display('admin/admin.twig', array('admin' => true));


?>


