<?php require 'pages/header.php'; ?>

<?php 
	require 'classes/pedidos.class.php';
	$pedidos = new Pedidos();
echo $quant = $_POST['quant'];
echo $produto = $_POST['produto'];
echo $user = $_POST['usuario'];
echo $valor = $_POST['valor'];


if($pedidos->cadastroPedido($quant,$produto,$user,$valor)) {
	if(!empty($_SESSION['clogindistribuidor'])){
	?>
	<script type="text/javascript">window.location.href="index-vendas-distribuidor.php?p=pedidos";</script>
	<?php
	}else{
	?>
	<script type="text/javascript">window.location.href="index-vendas-revendedor.php?p=pedidos";</script>
	<?php

	}
		exit;
}


?>