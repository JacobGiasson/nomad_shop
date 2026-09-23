<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:product-index.php");
    die();
}

require_once('Classe/CRUD.php');

$crud = new CRUD;
$update = $crud->update('product', $_POST);

if($update){
    header('location:product-show.php?id='.$_POST['id']);
}else{
    header('location:product-index.php');
}