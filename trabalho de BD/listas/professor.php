<?php 
require_once('../html/header.php');
require_once('../daos/professorDao.php');    
require_once('../classes/professor.php');    
$cdao = new ProfessorDAO();
$listcur = $cdao->listar(50,0);
?>
<div id="jumbotron2" class="jumbotron text-center">
  <h3>Lista Professores</h3>
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
        <a href="professor/detalhes.php?id=<?php echo $curso->getId(); ?>" style='color:black' class="btn btn-sm btn-primary"> 					
          Detalhes</a>
        <a href="../cadastros/professor.php?id=<?php echo $curso->getId(); ?>" style='color:black' class="btn btn-sm btn-warning">
          Alterar</a>				
        <a href="professor/excluir.php?id=<?php echo $curso->getId(); ?>" style='color:black' class="btn btn-sm btn-danger"> 					
          EXCLUIR</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<a href="../cadastros/professor.php" class="btn btn-secondary active" role="button" aria-pressed="true">ADICIONAR</a>



<?php include_once("../html/footer.php");?>
</div>