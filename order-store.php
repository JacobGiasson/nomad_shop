<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:order-index.php");
    die();
}

require_once('Classe/CRUD.php');

$crud = new CRUD;
$insert = $crud->insert('orders', $_POST);

if($insert){
    header("location:order-show.php?id=$insert");
}else{
    header("location:order-index.php");
}