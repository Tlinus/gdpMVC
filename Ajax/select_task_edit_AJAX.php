<?php

session_start();
require '../zOthers/BDD/connectbdd.php';
$_SESSION["TaskByID"] = '';
$taskID = $_POST['taskID'];

$_SESSION["TaskByID"] = $taskID;




