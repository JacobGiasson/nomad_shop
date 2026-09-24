<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("location:client-index.php");
    die();
}

require_once('Classe/CRUD.php');
require_once('Classe/Client.php');

$client = new Client(
    $_POST['name'],
    $_POST['email'],
    $_POST['phone'],
    $_POST['address'],
    $_POST['city'],
    $_POST['zip_code']
);

$crud = new CRUD;
$insert = $crud->insert('client', $client->getData());

if($insert){
    header("location:client-show.php?id=$insert");
}else{
    header("location:client-index.php");
}