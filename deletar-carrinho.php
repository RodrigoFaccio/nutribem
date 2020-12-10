<?php
require './pages/header.php';
require 'classes/produtos.class.php';
require 'classes/usuarios.class.php';
require 'classes/pedidos.class.php';


$u = new Usuarios();
    $p = new Produtos();
    $pedido = new Pedidos();
    
    if($pedido->deleteCarrinho($_GET['id'])){
        header('Location:carrinho-cliente.php');
    }
    




?>
