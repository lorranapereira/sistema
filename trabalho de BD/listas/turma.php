<?php 
require_once('../html/header.php');
require_once('../daos/turmaDao.php');    
require_once('../classes/turma.php');    
$cdao = new TurmaDAO();
$listcur = $cdao->listar(50,0);
?>
<div id="jumbotron2" class="jumbotron text-center">
  <h3>Lista de turmas</h3>
  <br>
  <table class="table table-sm table-responsive-sm table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col"></th>
    </tr>
  </thead> 
  <tbody>
    <?php  
        foreach($listcur as $curso){
    ?>
    <tr>
      <td> <?php echo $curso->getId(); ?> </td>
      <td> <?php echo $curso->getNome(); ?> </td>
      <td> 
        <a href="turma/detalhes.php?id=<?php echo $curso->getId(); ?>" style='color:black' class="btn btn-sm btn-primary"> 					
          Detalhes</a>
        <a href="../cadastros/turma.php?id=<?php echo $curso->getId(); ?>" style='color:black' class="btn btn-sm btn-warning">
          Alterar</a>				
        <a href="turma/excluir.php?id=<?php echo $curso->getId(); ?>" style='color:black' class="btn btn-sm btn-danger"> 					
          EXCLUIR</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<a href="../cadastros/turma.php" class="btn btn-secondary active" role="button" aria-pressed="true">ADICIONAR</a>



<?php include_once("../html/footer.php");?>
</div>