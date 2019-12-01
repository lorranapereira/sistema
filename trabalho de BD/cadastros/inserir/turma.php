<?php
require_once('../../daos/turmaDao.php');    
require_once('../../classes/turma.php');

$id = isset($_POST["id"]);

$cur = new Turma($_POST["nome"]);

$cdao = new TurmaDAO();

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
header("Location: ../../listas/turma.php");

?>