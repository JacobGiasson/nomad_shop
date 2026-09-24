<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:order-index.php");
    die();
}

require_once('Classe/CRUD.php');

$crud = new CRUD;
$update = $crud->update('orders', $_POST);

if($update){
    header('location:order-show.php?id='.$_POST['id']);
}else{
    header('location:order-index.php');
}