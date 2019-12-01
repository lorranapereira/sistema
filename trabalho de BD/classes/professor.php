<?php

class Professor{
    private $id;
    private $nome;

    public function __construct($nome){
        $this->nome = $nome;

    }
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setId($id){
        $this->id = $id;
    }
}



?>
