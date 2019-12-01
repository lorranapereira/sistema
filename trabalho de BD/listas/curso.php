<?php 
require_once('../html/header.php');
require_once('../daos/cursoDao.php');    
require_once('../classes/curso.php');    
$cdao = new CursoDAO();
$listcur = $cdao->listar(50,0);
?>
<div id="jumbotron2" class="jumbotron text-center">
  <h3>Lista de cursos</h3>
  <br>
  <table class="table table-sm table-responsive-sm table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Area</th>
            <th scope="col">carga Horaria</th>
            <th scope="col">data Fundação</th>
            <th scope="col"></th>
            <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php  
        foreach($listcur as $curso){
    ?>
    <tr>
      <td> <?php echo $curso->getid(); ?> </td>
      <td> <?php echo $curso->getNome(); ?> </td>
      <td> <?php echo $curso->getArea(); ?> </td>
      <td> <?php echo $curso->getcargaHoraria(); ?> </td>
      <td> <?php echo $curso->getdataFundacao(); ?> </td>
      <td> 
        <a href="curso/detalhes.php?id=<?php echo $curso->getid(); ?>" style='color:black' class="btn btn-sm btn-primary"> 					
          Detalhes</a>
        <a href="../cadastros/curso.php?id=<?php echo $curso->getid(); ?>" style='color:black' class="btn btn-sm btn-warning">
          Alterar</a>				
        <a href="curso/excluir.php?id=<?php echo $curso->getid(); ?>" style='color:black' class="btn btn-sm btn-danger"> 					
          EXCLUIR</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<a href="../cadastros/curso.php" class="btn btn-secondary active" role="button" aria-pressed="true">ADICIONAR</a>



<?php include_once("../html/footer.php");?>
</div>