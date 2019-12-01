<?php
require_once('../../daos/cursoDao.php');    
require_once('../../classes/curso.php');

$id = isset($_POST["id"]);

$cur = new Curso($_POST["nome"],$_POST["area"],$_POST["cargaHoraria"],$_POST["dataFundacao"]);

$cdao = new CursoDAO();

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
header("Location: ../../listas/curso.php");

?>