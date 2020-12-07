<?php require 'pages/header.php'; ?>

<?php 
	require 'classes/pedidos.class.php';
	$pedidos = new Pedidos();
echo $quant = $_POST['quant'];
echo $produto = $_POST['produto'];
echo $user = $_POST['usuario'];
echo $valor = $_POST['valor'];
$obs =$_POST['obs'];


if($pedidos->cadastroPedido($quant,$produto,$user,$valor,$obs)) {
	
	if(!empty($_SESSION['cLogindistribuidor'])){
		header('Location:index-vendas-distribuidor.php?p=pedidos');
	}
	if(!empty($_SESSION['cLoginrevendedor'])){
		header('Location:index-vendas-revendedor.php?p=pedidos');

	}
}
	?>
	


?>