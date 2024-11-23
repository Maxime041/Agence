<?php

abstract class ModelGenerique{

    protected $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=agence", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function user(){
        return unserialize($_SESSION['user']);
    }

    

    public function executeReq(string $query, $data = []){
        $stmt = $this->pdo->prepare($query);

        foreach($data as $cle => $valeur){
            $data[$cle] = htmlentities($valeur);
        }
        $stmt->execute($data);

        return $stmt;
    }
}