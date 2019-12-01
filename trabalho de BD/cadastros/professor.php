<?php 
require_once('../html/header.php');
require_once('../daos/professorDao.php');    
require_once('../classes/professor.php');
$id = isset($_GET["id"]);

if($id){
  $id = $_GET["id"];
  $cdao = new ProfessorDAO();
  $cur = $cdao->buscar(intval($id));
}
?>
<div id="jumbotron2" class="jumbotron text-center">
  <h2 style="color: #fff">Cadastro Professores</h2>
  <br>
  <form action="inserir/professor.php" method="post">
  
    <div class="form-group">
      <input type="text" class="txtLogin" placeholder="Nome" id="nome" name="nome" value="<?php if($id) echo $cur->getNome();?>">
      <span style="visibility:hidden;"></span>
    </div>
      <?php if($id){ ?>
      <input type="hidden" name="id" value="<?php echo $cur->getId();?>">
      <?php } ?>
    <div class="form-group">
      <button type="submit" class="btn btn-sm btn-primary" >enviar</button>
      <button type="reset" class="btn btn-sm btn-secondary" >limpar</button>  </div>
  </form>
  
  <?php include_once("../html/footer.php");?>
      </div>
