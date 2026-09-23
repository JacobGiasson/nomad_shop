<?php
// Receives the create form and inserts the client
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:client-index.php");
    die();
}

require_once('Classe/CRUD.php');

$crud = new CRUD;
$insert = $crud->insert('client', $_POST);

if($insert){
    header("location:client-show.php?id=$insert");
}else{
    header("location:client-index.php");
}