<?php 
    require('cursoDao.php');
    require('curso.php');
    
    $banco = new CursoDAO();
    
// TESTE INSERIR
    //$teste = new Curso('teste', 'Passar', 5, '10/10/2019');
    //$banco->inserir($teste);
    //var_dump($teste);

// TESTE BUSCAR E ALTERAR
    //$teste = $banco->buscar(10);
    //var_dump($teste);

    //$teste->setNome('Port');
    //$banco->alterar($teste);
    //var_dump($teste);
    
// TESTE DELETAR
    //$banco->Deletar(10);
    
?>