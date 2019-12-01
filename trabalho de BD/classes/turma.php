<?php

class Turma{
    private $id;
    private $nome;
    private $aluno;

    public function __construct($nome){
        $this->nome = $nome;
        $this->aluno = array();
    }
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function addaluno(Aluno $a) {
        array_push($this->aluno,$a);
    }
    public function getaluno(){
        return $this->aluno;
    }
     
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setId($id){
        $this->id = $id;
    }
}



?>
