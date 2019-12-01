<?php

class TurmaDAO{

	private function criaConexao(){
		$con = new PDO("pgsql:host=localhost;dbname=academico;port=5432", "postgres", ""); 
		return $con;
    }
    
	public function inserir($cur){
		$con = $this->criaConexao();
		$sql ='INSERT INTO "Turma" ("nome") 
			VALUES (?) RETURNING "id"'; 
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$cur->getNome());
		
		$res = $stm->execute();
		$stm->closeCursor();
		$stm = NULL;
		$con = NULL;
		return $res;	
	}

    public function alterar($cur){
		$con = $this->criaConexao();
		$sql='UPDATE "Turma" SET "nome" = ? WHERE "id" = ? ';
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$cur->getNome());
		$stm->bindValue(2,$cur->getId(),PDO::PARAM_INT);
		$res = $stm->execute();
		$stm->closeCursor();
		$stm = NULL;
		$con = NULL;
		return $res;
    }
    
    public function listar($limit, $offset){
		$con = $this->criaConexao();
		$sql = 'SELECT * FROM "Turma" LIMIT ? OFFSET ?';
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$limit);
		$stm->bindValue(2,$offset);
		$res=$stm->execute();
		$listcur = array();
		if($res){	
			while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
				$cur = new Turma($linha["nome"]);
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
		$sql = 'SELECT * FROM "Turma" WHERE "id" = ?';
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$id);

		$res = $stm->execute();
		if($res ){	
			$linha = $stm->fetch(PDO::FETCH_ASSOC);
			$cur = new Turma($linha["nome"]);
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
		$sql = 'DELETE FROM "Turma" WHERE "id" = ?';
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
