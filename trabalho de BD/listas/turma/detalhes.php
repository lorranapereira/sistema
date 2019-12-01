<?php 
require_once('../../html/header.php');
require_once('../../daos/alunoDao.php');    
require_once('../../classes/aluno.php');
require_once('../../daos/turmaDao.php');    
require_once('../../classes/turma.php');
$id = isset($_GET['id']);


if($id){
  $id = $_GET['id'];
  $cdao = new AlunoDAO();
    $listcur2 = $cdao->listar(50,0);
    foreach($listcur2 as $curso2){
     $c = $curso2->getTurma();
      $listcur = "SELECT * FROM 'Aluno' WHERE 'fk_turma' = '".$id."'";
      print_r($listcur);
    }
  
}
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
    </tr>
    <?php } ?>
  </tbody>
</table>



<?php include_once("../html/footer.php");?>
