<?php

class CursoDAO{

	private function criaConexao(){
		$con = new PDO("pgsql:host=localhost;dbname=academico;port=5432", "postgres", ""); 
		return $con;
    }
    
	public function inserir($cur){
		$con = $this->criaConexao();
		$sql ='INSERT INTO "Curso" ("nome", "area", "cargaHoraria", "dataFundacao") 
			VALUES (?,?,?,?) RETURNING "id"'; 
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$cur->getNome());
		$stm->bindValue(2,$cur->getArea());
        $stm->bindValue(3,$cur->getcargaHoraria());
        $stm->bindValue(4,$cur->getdataFundacao());
		
		$res = $stm->execute();
		$stm->closeCursor();
		$stm = NULL;
		$con = NULL;
		return $res;	
	}

    public function alterar($cur){
		$con = $this->criaConexao();
		$sql='UPDATE "Curso" SET "nome" = ?, "area" = ?, 
		  "cargaHoraria" = ?, "dataFundacao" = ? WHERE "id" = ? ';
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$cur->getNome());
		$stm->bindValue(2,$cur->getArea());
        $stm->bindValue(3,$cur->getcargaHoraria());
        $stm->bindValue(4,$cur->getdataFundacao());
		$stm->bindValue(5,$cur->getid(),PDO::PARAM_INT);
		$res = $stm->execute();
		$stm->closeCursor();
		$stm = NULL;
		$con = NULL;
		return $res;
    }
    
    public function listar($limit, $offset){
		$con = $this->criaConexao();
		$sql = 'SELECT * FROM "Curso" LIMIT ? OFFSET ?';
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$limit);
		$stm->bindValue(2,$offset);
		$res=$stm->execute();
		$listcur = array();
		if($res){	
			while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
				$cur = new Curso($linha["nome"],$linha["area"],$linha["cargaHoraria"],$linha["dataFundacao"]);
				$cur->setid(intval($linha["id"]));
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
		$sql = 'SELECT * FROM "Curso" WHERE "id" = ?';
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$id);

		$res = $stm->execute();
		if($res ){	
			$linha = $stm->fetch(PDO::FETCH_ASSOC);
			$cur = new Curso($linha["nome"],$linha["area"],$linha["cargaHoraria"],$linha["dataFundacao"]);
			$cur->setid(intval($linha["id"]));
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
		$sql = 'DELETE FROM "Curso" WHERE "id" = ?';
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
