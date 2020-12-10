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
    public function addImage($fotos,$id_product){
		global $pdo;

		if(count($fotos) > 0) {
			for($q=0;$q<count($fotos['tmp_name']);$q++) {
				$tipo = $fotos['type'][$q];
				if(in_array($tipo, array('image/jpeg', 'image/png'))) {
					$tmpname = md5(time().rand(0,9999)).'.jpg';
					move_uploaded_file($fotos['tmp_name'][$q], 'assets/images/produtos/'.$tmpname);

					list($width_orig, $height_orig) = getimagesize('assets/images/produtos/'.$tmpname);
					$ratio = $width_orig/$height_orig;

					$width = 500;
					$height = 500;

					if($width/$height > $ratio) {
						$width = $height*$ratio;
					} else {
						$height = $width/$ratio;
					}

					$img = imagecreatetruecolor($width, $height);
					if($tipo == 'image/jpeg') {
						$origi = imagecreatefromjpeg('assets/images/produtos/'.$tmpname);
					} elseif($tipo == 'image/png') {
						$origi = imagecreatefrompng('assets/images/produtos/'.$tmpname);
					}

					imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

					imagejpeg($img, 'assets/images/produtos/'.$tmpname, 80);

					$sql = $pdo->prepare("INSERT INTO product_image SET id_product = :id_product, url = :url");
					$sql->bindValue(":id_product", $id_product);
					$sql->bindValue(":url", $tmpname);
					$sql->execute();

				}
			}
		}
    }


}

?>