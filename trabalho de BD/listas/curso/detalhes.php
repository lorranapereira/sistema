<?php 
require_once('../../html/header.php');
require_once('../../daos/cursoDao.php');    
require_once('../../classes/curso.php');
$id = isset($_GET['id']);

if($id){
  $id = $_GET['id'];
  $cdao = new CursoDAO();
  $cur = $cdao->buscar(intval($id));
}
?>
<div id="jumbotron2" class="jumbotron text-center">
  <h4>DETALHES CURSO</h4>
<br>  
  <ul class="list-group">
    <div class="list-group-item active"><?= $cur->getNome()." (id:".$cur->getid().")";?></div>
    <li class="list-group-item active"><?php echo "AREA: ".$cur->getArea();?></li>
    <li class="list-group-item active"><?php echo "CARGA HORARIA: ".$cur->getcargaHoraria();?></li>
    <li class="list-group-item active"><?php echo "DATA FUNDAÇÃO: ".$cur->getdataFundacao();?></li>
  </ul>
  
  <a href="curso.php" class="btn btn-sm active" role="button" aria-pressed="true"> << voltar</a>
  
  <?php include_once("../../html/footer.php");?>
</div>
