<?php

// Classe CRUD
// Elle s'occupe de la connexion a la base pis des operations
// de base : lire, ajouter, modifier, supprimer.
// Elle herite de PDO, la classe de PHP qui parle a MySQL.

class CRUD extends PDO {

    // Ouvre la connexion a la base
    public function __construct(){
        parent::__construct('mysql:host=localhost; dbname=nomad_shop; port=3306; charset=utf8mb4', 'root', '');
    }

    // Va chercher toutes les lignes d'une table
    public function select(string $table, $field = "id", $order = "ASC"):array{
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    // Va chercher une seule ligne avec son id
    public function selectId(string $table, int|string $value, $field = 'id'):bool|array{
        $sql = "SELECT * FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1){
            return $stmt->fetch();
        }else{
            return false;
        }
    }

    // Ajoute une ligne dans la table
    // Les noms de colonnes viennent des cles du tableau $data
    public function insert(string $table, array $data):bool|int{
        $fieldName = implode(', ', array_keys($data));
        $fieldBindValue = ":".implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldBindValue);";
        $stmt = $this->prepare($sql);

        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }

        if($stmt->execute()){
            return $this->lastInsertId();
        }else{
            return false;
        }
    }

    // Modifie une ligne
    // L'id doit etre dans le tableau $data
    public function update(string $table, array $data, $field = 'id'):bool{
        $fieldName = null;

        foreach($data as $key=>$value){
            $fieldName .= "$key = :$key, ";
        }

        // Enleve la virgule en trop a la fin
        $fieldName = rtrim($fieldName, ', ');

        $sql = "UPDATE $table SET $fieldName WHERE $field = :$field;";
        $stmt = $this->prepare($sql);

        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Supprime une ligne avec son id
    public function delete(string $table, int|string $value, $field = 'id'):bool{
        $sql = "DELETE FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

}