<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:client-index.php");
    die();
}

require_once('Classe/CRUD.php');

$crud = new CRUD;
$crud->delete('client', $_POST['id']);

header('location:client-index.php');