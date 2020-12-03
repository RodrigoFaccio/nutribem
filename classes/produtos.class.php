<?php

class Produtos {

    public function produtosRevendedor($categoria){
        global $pdo;
        
    
        

        $sql = $pdo->query("SELECT * FROM produtoss");

        
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
    }

    public function produtosDistribuidor(){

        global $pdo;

        $sql = $pdo->query("SELECT * FROM produtoss   ");

        
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;

    } public function cadastroProdutos($nome,$uso,$composicao,$valor_distribuidor,$valor_revendedor,$categoria){
        global $pdo;

        $sql = $pdo->prepare("INSERT INTO produtoss SET nome = :nome,preco_revendedor = :preco_revendedor, preco_distribuidor = :preco_distribuidor, categoria = :categoria,composicao = :composicao,indicacao = :indicacao ");
            $sql->bindValue(":nome", $nome);
			$sql->bindValue(":categoria", $categoria);
            
            $sql->bindValue(":indicacao", $uso);
            $sql->bindValue(":composicao", $composicao);
            $sql->bindValue(":preco_distribuidor", $valor_distribuidor);
            $sql->bindValue(":preco_revendedor", $valor_revendedor);
            $sql->execute();

			return true;



    }
    public function editarProduto($nome,$uso,$composicao,$valor_distribuidor,$valor_revendedor,$categoria,$id){
        global $pdo;

        $sql = $pdo->prepare("UPDATE  produtoss SET nome = :nome,preco_revendedor = :preco_revendedor, preco_distribuidor = :preco_distribuidor, categoria = :categoria,composicao = :composicao,indicacao = :indicacao WHERE id = $id ");
            $sql->bindValue(":nome", $nome);
			$sql->bindValue(":categoria", $categoria);
            
            $sql->bindValue(":indicacao", $uso);
            $sql->bindValue(":composicao", $composicao);
            $sql->bindValue(":preco_distribuidor", $valor_distribuidor);
            $sql->bindValue(":preco_revendedor", $valor_revendedor);
            $sql->execute();

			return true;



    }
    public function getProduto($id){
        global $pdo;

        $sql = $pdo->query("SELECT * FROM produtoss WHERE id=$id");

        
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
    }
    public function getProduto2($id){
        global $pdo;

        $sql = $pdo->query("SELECT * FROM produtoss WHERE id=$id");

        
		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
    }
    public function getProdutos(){
        global $pdo;


        $sql = $pdo->query("SELECT * FROM produtoss");

        
		if($sql->rowCount() > 0) {

			$array = $sql->fetchAll();
		}

		return $array;
    }
    public function detetarProduto($id){
        global $pdo;

        $sql = $pdo->prepare("DELETE FROM  produtoss  WHERE id = $id ");
            
            $sql->execute();

			return true;
    }


}

?>