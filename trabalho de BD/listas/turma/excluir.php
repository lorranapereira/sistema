<?php
require_once('../../daos/turmaDao.php');    
$id = $_GET['id'];
$cdao = new TurmaDAO();

if($id!==null)    $cdao->deletar($id);


//redireciona para o listar.php
header("Location: ../turma.php");

?>