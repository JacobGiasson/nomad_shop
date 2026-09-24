<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:product-index.php");
    die();
}

require_once('Classe/CRUD.php');
require_once('Classe/Product.php');

$product = new Product(
    $_POST['name'],
    $_POST['description'],
    $_POST['price'],
    $_POST['stock']
);

$crud = new CRUD;
$insert = $crud->insert('product', $product->getData());

if($insert){
    header("location:product-show.php?id=$insert");
}else{
    header("location:product-index.php");
}