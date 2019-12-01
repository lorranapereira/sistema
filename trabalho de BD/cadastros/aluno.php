<?php 
require_once('../html/header.php');

              if($_GET["id"]){
                  include_once('../daos/alunoDao.php');
                  include_once('../classes/aluno.php');
                  $AlunoDAO = new AlunoDAO();
                  $cur = $AlunoDAO->buscar(intval($_GET["id"]));
                }

?> 
<div id="jumbotron2" class="jumbotron text-center">
<h2 style="color: #fff">Cadastro Alunos</h2>
  <br>
  <form id="form" action="inserir/aluno.php" method="POST">
  <div class="form-group">
    <input type="text" class="txtLogin" placeholder="Nome" id="nome" name="nome" value="<?php if($id) echo $cur->getNome();?>">
  </div>
  <div class="form-group">
    <input type="text" class="txtLogin" placeholder="matricula" id="matricula" name="matricula" value="<?php if($id) echo $cur->getmatricula();?>">
  </div>
  <div class="form-group">
    <label for="dtnascimento">Data de Nascimento</label>
    <br>
    <input type="date" class="txtLogin" id="dtnascimento" name="dtnascimento" value="<?php if($id) echo $cur->getDtnascimento();?>">
  </div>

      <input name="id" value="<?php if($_GET['id']){  echo $cur->getId();}?>" type="hidden"> 
      <div id= "cate" class="form-group">
          <select name="fk_curso" placeholder="Curso" value="<?php if($_GET["id"]){ echo $cur->getCurso()->getNome(); }?>"  class="txtLogin">
            <?php
              include_once('../daos/cursoDao.php');
              include_once('../classes/curso.php');

              $c = new CursoDAO();
              $cursos = $c->listar(50,0);  
              $i = 0;  
              foreach ($cursos as $v) {
            ?>
            <option  value="<?php if($_GET['id']){  echo $v->getId();} else { echo $v->getId(); } ?>" ><?php echo $v->getNome(); ?></option>
          <?php }; ?> 
          </select> 
          <br/> 
          <input name="id" value="<?php if($_GET['id']){  echo $cur->getId();}?>" type="hidden"> 
      <div id= "cate" class="form-group">
          <select name="fk_turma" placeholder="turma" value="<?php if($_GET["id"]){ echo $cur->getTurma()->getNome(); }?>"  class="txtLogin">
            <?php
              include_once('../daos/turmaDao.php');
              include_once('../classes/turma.php');

              $c = new TurmaDAO();
              $turmas = $c->listar(50,0);  
              $i = 0;  
              foreach ($turmas as $v) {
            ?>
            <option  value="<?php if($_GET['id']){  echo $v->getId();} else { echo $v->getId(); } ?>" ><?php echo $v->getNome(); ?></option>
          <?php }; ?> 
          </select> 
          <br/>               
</div>
<div class="form-group">
<button type="submit" class="btn btn-sm btn-primary" >enviar</button>
<button type="reset" class="btn btn-sm btn-secondary" >limpar</button>  
</div>
</form>
<a href="../index.php" class="btn btn-sm active" role="button" aria-pressed="true"> << voltar</a>
<?php include_once("../html/footer.php");?>
</div>
