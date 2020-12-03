<?php

class Pedidos {
public function cadastroPedido($quant,$produto,$user,$valor){
    global $pdo;

    $sql = $pdo->prepare("INSERT INTO pedidos SET produto = :id_produto, id_vendedor = :id_vendedor,quantidade = :quantidade, valor = :valor ");

        $sql->bindValue(":id_produto", $produto);
        $sql->bindValue(":id_vendedor", $user);
        $sql->bindValue(":quantidade", $quant);
        $sql->bindValue(":valor", $valor);


        
               $sql->execute();

        return true;
}
public function getPedido($id){
   
        global $pdo;

        $sql = $pdo->query("SELECT * FROM pedidos WHERE id_vendedor=$id");

        
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
    
} 

}

?>