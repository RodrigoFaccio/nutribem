<?php
require './pages/header.php';
require 'classes/produtos.class.php';
require 'classes/usuarios.class.php';
require 'classes/pedidos.class.php';


$u = new Usuarios();
    $p = new Produtos();
	$pedido = new Pedidos();
    

if(isset($_SESSION['cLogindistribuidor'])){
    $quantcar = $_POST['quantcar'];

    $produto= $p->getProduto2($_POST['id']);
    $usuario = $u->getUsuario($_SESSION['cLogindistribuidor']);
    $valorfinal = $produto['preco_distribuidor'];
    //informações cadastro carrinho 
    $id_produto=$_POST['id'];
    $id_vendedor=$_SESSION['cLogindistribuidor'];
    $valor = $valorfinal*$quantcar;

    $quantidade = $quantcar;

    if($pedido->cadastroCarrinho($id_produto,$_SESSION['cLogindistribuidor'],$valor,$quantidade)){
        header('Location:index-vendas-distribuidor.php?p=inicio');
    }
}
if(isset($_SESSION['cLoginrevendedor'])){
    $quantcar = $_POST['quantcar'];

    $produto= $p->getProduto2($_POST['id']);
    $usuario = $u->getUsuario($_SESSION['cLoginrevendedor']);
    $valorfinal = $produto['preco_revendedor'];

    //informações cadastro carrinho 
    $id_produto=$_POST['id'];
    $id_vendedor=$_SESSION['cLogindistribuidor'];
    $valor = $valorfinal*$quantcar;
   

    $quantidade = $quantcar;
    
if($pedido->cadastroCarrinho($id_produto,$_SESSION['cLoginrevendedor'],$valor,$quantidade)){
    header('Location:index-vendas-revendedor.php?p=inicio');
}
    

}

?>
