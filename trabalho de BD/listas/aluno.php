<?php 
require_once('../html/header.php');
require_once('../daos/alunoDao.php');    
require_once('../classes/aluno.php');    
$cdao = new AlunoDAO();
$listcur = $cdao->listar(50,0);
?>
<div id="jumbotron2" class="jumbotron text-center">
  <h3>Lista de alunos</h3>
  <br>
  <table class="table table-sm table-responsive-sm table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Data Nascimento</th>
            <th scope="col">matricula</th>
            <th scope="col">Curso</th>
            <th scope="col">turma</th>

    </tr>
  </thead>
  <tbody>
    <?php  
        foreach($listcur as $curso){
    ?>
    <tr>
      <td> <?php echo $curso->getId(); ?> </td>
      <td> <?php echo $curso->getNome(); ?> </td>
      <td> <?php echo $curso->getDtnascimento(); ?> </td>
      <td> <?php echo $curso->getmatricula(); ?> </td>
      <td> <?php echo $curso->getCurso(); ?> </td>
      <td> <?php echo $curso->getTurma(); ?> </td>
      <td> 
        <a href="aluno/detalhes.php?id=<?php echo $curso->getId(); ?>" style='color:black' class="btn btn-sm btn-primary"> 					
          Detalhes</a>
        <a href="../cadastros/aluno.php?id=<?php echo $curso->getId(); ?>" style='color:black' class="btn btn-sm btn-warning">
          Alterar</a>				
        <a href="aluno/excluir.php?id=<?php echo $curso->getId(); ?>" style='color:black' class="btn btn-sm btn-danger"> 					
          EXCLUIR</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<a href="../cadastros/aluno.php" class="btn btn-secondary active" role="button" aria-pressed="true">ADICIONAR</a>



<?php include_once("../html/footer.php");?>
</div>