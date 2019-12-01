<?php
require_once('../../daos/alunoDao.php');    
$id = $_GET['id'];
$cdao = new AlunoDAO();

if($id!==null)    $cdao->deletar($id);


//redireciona para o listar.php
header("Location: ../aluno.php");

?>