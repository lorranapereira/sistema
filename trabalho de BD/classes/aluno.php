<?php

class Aluno{
    private $id;
    private $nome;
    private $dtnascimento;    
    private $matricula;
    private $fk_curso; 
    private $fk_turma;

    public function __construct($nome,$dtnascimento=null,$matricula){
        $this->nome = $nome;
        $this->dtnascimento = $dtnascimento;
        $this->matricula = $matricula;
    }
    public function getCurso(){        
		return $this->curso;
    }

    public function getTurma(){        
		return $this->turma;
    }
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    
    public function getmatricula(){
        return $this->matricula;
    }
    public function getDtnascimento(){
		return $this->dtnascimento;
    }
    public function setCurso($fk_curso){        
		$this->curso = $fk_curso;
    }

    public function setTurma($fk_turma){        
		$this->turma = $fk_turma;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setmatricula($matricula){
        $this->matricula = $matricula;
    }
    public function setDtnascimento($dtnascimento){
        $this->dtnascimento = $dtnascimento;
    }
}
?>
