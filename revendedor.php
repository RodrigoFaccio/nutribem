<?php
require 'pages/header.php';
if(empty($_SESSION['cLoginrevendedor'])) {
	?>
	<script type="text/javascript">window.location.href="login-revendedor.php";</script>
	<?php
	exit;
}
?>
<a href="revendedor.php?p=inicio">inicios</a>
<a href="revendedor.php?p=pedidos">Pedidos</a>
<a href="revendedor.php?p=suporte">Suporte</a>
<br>
<?php 
$menu = @$_GET['p'];


if($menu=="inicio"){
	require_once('inicio.php');
}elseif($menu=="pedidos"){
	require_once('pedidos.php');
}elseif($menu=="suporte"){
	require_once('suporte.php');
}

?>


