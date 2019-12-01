<?php
require_once('../../daos/cursoDao.php');    
$id = $_GET['id'];
$cdao = new CursoDAO();

if($id!==null)    $cdao->deletar($id);


//redireciona para o listar.php
header("Location: ../curso.php");

?>