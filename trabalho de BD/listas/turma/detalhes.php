<?php 
require_once('../../html/header.php');
require_once('../../daos/alunoDao.php');    
require_once('../../classes/aluno.php');
require_once('../../daos/turmaDao.php');    
require_once('../../classes/turma.php');
$id = isset($_GET['id']);

if($id){
  $id = $_GET['id'];
  $cdao = new AlunoDAO();
  function criaConexao(){
		$con = new PDO("pgsql:host=localhost;dbname=academico;port=5432", "postgres", ""); 
		return $con;
    }
  $con = criaConexao();
  $sql = 'SELECT * FROM "Aluno"';
  $res = $con->execute($sql);
  $con->closeCursor();
		$con = NULL;
  print_r($res);

}
?>
