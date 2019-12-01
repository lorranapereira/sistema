<?php
require_once('../../daos/professorDao.php');    
require_once('../../classes/professor.php');

$id = isset($_POST["id"]);

$cur = new Professor($_POST["nome"]);

$cdao = new ProfessorDAO();

//se o id existe então é um UPDATE, senão é um INSERT
if($id){
    echo $id;
    $cur->setid(intval($_POST["id"]));
     $cdao->alterar($cur);
 }
 else{
     echo $id;
     $cdao->inserir($cur);
}
//redireciona para o listar.php
header("Location: ../../listas/professor.php");
?>