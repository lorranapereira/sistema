<?php 
require_once('../../html/header.php');
require_once('../../daos/alunoDao.php');    
require_once('../../classes/aluno.php');
$id = isset($_GET['id']);

if($id){
  $id = $_GET['id'];
  $cdao = new AlunoDAO();
  $cur = $cdao->buscar(intval($id));
}
?>
<div id="jumbotron2" class="jumbotron text-center">
  <h4>DETALHES Aluno</h4>
<br>  
  <ul class="list-group">
    <div class="list-group-item active"><?= $cur->getNome()." (id:".$cur->getId().")";?></div>
    <li class="list-group-item active"><?php echo "Data de Nascimento: ".$cur->getDtnascimento();?></li>
    <li class="list-group-item active"><?php echo "Matricula: ".$cur->getmatricula();?></li>
    <li class="list-group-item active"><?php echo "Curso: ".$cur->getCurso();?></li>
    <li class="list-group-item active"><?php echo "Turma: ".$cur->getTurma();?></li>

  </ul>
  
  <a href="../aluno.php" class="btn btn-sm active" role="button" aria-pressed="true"> << voltar</a>
  
  <?php include_once("../../html/footer.php");?>
</div>
