<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:product-index.php");
    die();
}

require_once('Classe/CRUD.php');

$id = $_POST['id'];
$crud = new CRUD;
$delete = $crud->delete('product', $id);

if($delete){
    header('location:product-index.php');
}else{
    echo "Error";
}