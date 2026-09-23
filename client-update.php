<?php
// Receives the edit form and updates the client
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:client-index.php");
    die();
}

require_once('Classe/CRUD.php');

$crud = new CRUD;
$update = $crud->update('client', $_POST);

if($update){
    header('location:client-show.php?id='.$_POST['id']);
}else{
    header('location:client-index.php');
}