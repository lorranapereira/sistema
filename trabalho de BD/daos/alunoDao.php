<?php

class AlunoDAO{

	private function criaConexao(){
		$con = new PDO("pgsql:host=localhost;dbname=academico;port=5432", "postgres", ""); 
		return $con;
    }
    
	public function inserir($cur){
		$con = $this->criaConexao();
		$sql ='INSERT INTO "Aluno" ("nome", "dtnascimento", "matricula", "fk_curso","fk_turma") 
			VALUES (?,?,?,?,?) RETURNING "id"'; 
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$cur->getNome());
		$stm->bindValue(2,$cur->getDtnascimento());
		$stm->bindValue(3,$cur->getmatricula());
		$stm->bindValue(4,$cur->getCurso()->getId());
		$stm->bindValue(5,$cur->getTurma()->getId());

		
		$res = $stm->execute();
		if($res ){	
			echo $res;
		}
		else{
			$cur=$res;
			echo $stm->queryString;
			var_dump($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm = NULL;
		$con = NULL;
	}

    public function alterar($cur){
		$con = $this->criaConexao();
		$sql='UPDATE "Aluno" SET "nome" = ?, "dtnascimento" = ?, 
		  "matricula" = ?, "fk_curso" = ?, "fk_turma" = ? WHERE "id" = ? ';
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$cur->getNome());
		$stm->bindValue(2,$cur->getmatricula());
		$stm->bindValue(3,$cur->getDtnascimento());
		$stm->bindValue(4,$cur->getCurso());
		$stm->bindValue(5,$cur->getTurma());
		$stm->bindValue(6,$cur->getId(),PDO::PARAM_INT);
		$res = $stm->execute();
		$stm->closeCursor();
		$stm = NULL;
		$con = NULL;
		return $res;
    }
    
    public function listar($limit, $offset){
		$con = $this->criaConexao();
		$sql = 'SELECT * FROM "Aluno" LIMIT ? OFFSET ?';
		 $stm = $con->prepare($sql);
		$stm->bindValue(1,$limit);
		$stm->bindValue(2,$offset);
		$res=$stm->execute();
		$listcur = array();
		if($res){	
			while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
				$cur = new Aluno($linha["nome"],$linha["dtnascimento"],$linha["matricula"],$linha["fk_curso"],$linha["fk_turma"]);
				$cur->setId(intval($linha["id"]));
				array_push($listcur,$cur);
			}
		}
		$stm->closeCursor();
		$stm=NULL;
		$con = NULL;
		return $listcur;
	}

	public function buscar($id){
		$con = $this->criaConexao();
		$sql = 'SELECT * FROM "Aluno" WHERE "id" = ?';
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$id);

		$res = $stm->execute();
		if($res ){	
			$linha = $stm->fetch(PDO::FETCH_ASSOC);
			$cur = new Aluno($linha["nome"],$linha["dtnascimento"],$linha["matricula"],$linha["fk_curso"],$linha["fk_turma"]);
			$cur->setId(intval($linha["id"]));
		}
		else{
			$cur=$res;
			echo $stm->queryString;
			var_dump($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm=NULL;
		$con = NULL;
		return $cur;
    } 

    public function deletar($id){
		$con = $this->criaConexao();
		$sql = 'DELETE FROM "Aluno" WHERE "id" = ?';
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$id);
		$res = $stm->execute();
		if(!$res){
			echo $stm->queryString;
			var_dump($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm = NULL;
		$con = NULL;
		return $res;
	}
    
}

?>
