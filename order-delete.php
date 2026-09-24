<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:order-index.php");
    die();
}

require_once('Classe/CRUD.php');

$id = $_POST['id'];
$crud = new CRUD;
$delete = $crud->delete('orders', $id);

if($delete){
    header('location:order-index.php');
}else{
    echo "Error";
}