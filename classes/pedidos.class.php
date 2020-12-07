<?php

class Pedidos {
public function cadastroPedido($quant,$produto,$user,$valor,$obs){
    global $pdo;

    $sql = $pdo->prepare("INSERT INTO pedidos SET produto = :id_produto, id_vendedor = :id_vendedor,quantidade = :quantidade, valor = :valor, estado=:estado , obs=:obs");

        $sql->bindValue(":id_produto", $produto);
        $sql->bindValue(":obs", $obs);

        $sql->bindValue(":id_vendedor", $user);
        $sql->bindValue(":quantidade", $quant);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":estado", 'não iniciado');



        
        $sql->execute();

        return true;
}
public function statusPedido($id,$status){
    global $pdo;

    $sql = $pdo->prepare("UPDATE pedidos SET estado = :estado WHERE id=$id");

        $sql->bindValue(":estado", $status);



        
        $sql->execute();

        return true;

}
public function deletePedido($id){
    global $pdo;

    $sql = $pdo->prepare("DELETE FROM pedidos WHERE id=$id");

        



        
        $sql->execute();

        return true;
    # code...
}
public function getPedidoInfo($id){
    # code...

    global $pdo;

    $sql = $pdo->query("SELECT * FROM pedidos WHERE id=$id");

    
    if($sql->rowCount() > 0) {
        $array = $sql->fetch();
    }

    return $array;
}
public function getPedido($id){
   
        global $pdo;

        $sql = $pdo->query("SELECT * FROM pedidos WHERE id_vendedor=$id");

        
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
    
} 
public function getPedidos(){
   
    global $pdo;

    $sql = $pdo->query("SELECT * FROM pedidos ");

    
    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll();
    }

    return $array;

}

}

?>