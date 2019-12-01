<?php 
require_once('../../html/header.php');
require_once('../../daos/professorDao.php');    
require_once('../../classes/professor.php');
$id = isset($_GET['id']);

if($id){
  $id = $_GET['id'];
  $cdao = new ProfessorDAO();
  $cur = $cdao->buscar(intval($id));
}
?>
<div id="jumbotron2" class="jumbotron text-center">
  <h4>DETALHES Professor</h4>
<br>  
  <ul class="list-group">
    <div class="list-group-item active"><?= $cur->getNome()." (id:".$cur->getId().")";?></div>
  </ul>
  
  <a href="../professor.php" class="btn btn-sm active" role="button" aria-pressed="true"> << voltar</a>
  
  <?php include_once("../../html/footer.php");?>
</div>
