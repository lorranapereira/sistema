<?php

include_once('../../classes/aluno.php');
include_once('../../classes/curso.php');
include_once('../../classes/turma.php');
include_once('../../daos/alunoDao.php');
include_once('../../daos/cursoDao.php');
include_once('../../daos/turmaDao.php');

$i = 1;
$AlunoDAO = new AlunoDAO();
$data = new DateTime($_POST['dtnascimento']);
$A = new Aluno($_POST["nome"],$data->format('Y-m-d'),$_POST["matricula"]);
$CursoDAO = new CursoDAO();
$c = $CursoDAO->buscar(intval($_POST["fk_curso"]));
$turmaDAO = new TurmaDAO();
$c2 = $turmaDAO->buscar(intval($_POST["fk_turma"]));
$A->setCurso($c);
$A->setTurma($c2);
if($_POST['id']){
    $A->setId(intval($_POST['id']));
    $AlunoDAO->alterar($A);
}else{
    $AlunoDAO->inserir($A);
}
//redireciona para o listar.php
header("Location: ../../listas/aluno.php");
?>
