<?php
require_once('../../daos/professorDao.php');    
$id = $_GET['id'];
$cdao = new ProfessorDAO();

if($id!==null)    $cdao->deletar($id);


//redireciona para o listar.php
header("Location: ../professor.php");

?>