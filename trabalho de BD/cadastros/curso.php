<?php 
require_once('../html/header.php');
require_once('../daos/cursoDao.php');    
require_once('../classes/curso.php');
$id = isset($_GET["id"]);

if($id){
  $id = $_GET["id"];
  $cdao = new CursoDAO();
  $cur = $cdao->buscar(intval($id));
}
?>
<div id="jumbotron2" class="jumbotron text-center">
  <h2 style="color: #fff">Cadastro Cursos</h2>
  <br>
  <form action="inserir/curso.php" method="post">
  
    <div class="form-group">
      <input type="text" class="txtLogin" placeholder="Usuário" id="nome" name="nome" value="<?php if($id) echo $cur->getNome();?>">
      <span style="visibility:hidden;"></span>
    </div>
    <div class="form-group">
      <input type="text" class="txtLogin" placeholder="Area" id="area" name="area" value="<?php if($id) echo $cur->getArea();?>">
    </div>
    <div class="form-group">
      <input type="number" class="txtLogin" placeholder="Carga Horaria" id="cargaHoraria" name="cargaHoraria" value="<?php if($id) echo $cur->getcargaHoraria();?>">
    </div>
    <div class="form-group">
      <label for="datafundacao">Data de Fundacao</label>
      <br>
      <input type="date" class="txtLogin" id="dataFundacao" name="dataFundacao" value="<?php if($id) echo $cur->getdataFundacao();?>">
    </div>
      <?php if($id){ ?>
      <input type="hidden" name="id" value="<?php echo $cur->getid();?>">
      <?php } ?>
    <div class="form-group">
      <button type="submit" class="btn btn-sm btn-primary" >enviar</button>
      <button type="reset" class="btn btn-sm btn-secondary" >limpar</button>  </div>
  </form>
  
  <a href="listar.php" class="btn btn-sm active" role="button" aria-pressed="true"> << voltar</a>
  <?php include_once("../html/footer.php");?>
      </div>
