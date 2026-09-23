<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:product-index.php");
    die();
}

require_once('Classe/CRUD.php');

$crud = new CRUD;
$insert = $crud->insert('product', $_POST);

if($insert){
    header("location:product-show.php?id=$insert");
}else{
    header("location:product-index.php");
}