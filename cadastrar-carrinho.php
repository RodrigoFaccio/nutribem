<?php
require 'pages/header.php';
require 'classes/pedidos.class.php';
$pedidos = new Pedidos();
if(!empty($_SESSION['cLoginrevendedor'])){


$pedidoscar = $pedidos->getCarrinho($_SESSION['cLoginrevendedor']);
foreach($pedidoscar as $p){
    if($pedidos->cadastroPedido($p['quantidade'],$p['id_produto'],$_SESSION['cLoginrevendedor'],$p['valor'])){
        $pedidos->deleteCarrinho($p['id']);

    }
    

}
header('Location:index-vendas-revendedor.php?p=pedidos');
}
if(!empty($_SESSION['cLogindistribuidor'])){


    $pedidoscar = $pedidos->getCarrinho($_SESSION['cLogindistribuidor']);
    foreach($pedidoscar as $p){
        if($pedidos->cadastroPedido($p['quantidade'],$p['id_produto'],$_SESSION['cLogindistribuidor'],$p['valor'])){
            $pedidos->deleteCarrinho($p['id']);
    
        }
        
    
    }
    header('Location:index-vendas-distribuidor.php?p=pedidos');
    }

?>