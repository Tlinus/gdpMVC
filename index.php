<?php

session_start();
include_once('./zOthers/BDD/connectbdd.php');
include_once('./controller/login_controller.php');
$page = new index();

/**
 * With Composer and autoload
 * Twig Php Template Engine
 * En dessous les config de Twig pas à toucher
 */
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);


/**
 * Ici les data de la base de donnée
 * Envoie à la vue par Twig
 */

$template = $twig->display('admin/admin.twig', array('name' => 'Fabien'));


?>


