<?php
require 'pages/header-user.php';
if(empty($_SESSION['cLoginrevendedor'])) {
	?>
	<script type="text/javascript">window.location.href="login-revendedor.php";</script>
	<?php
	exit;
}
echo $_SESSION['cLogin'];
?>
<div class="menu">

<div class="container">
	<div class="espaco"></div>
	<div class="row">
		<div class="col">
			<?php
				if(@$_GET['p']=="inicio" or @$_GET['p']==""){
			?>
				<a class="btn-menu" href="index-vendas-revendedor
				.php?p=inicio">inicios</a>
			<?php 
				}else{
				?>
					<a class="" href="index-vendas-revendedor
					.php?p=inicio">inicio</a>
				<?php } ?>
			
		</div>
		<div class="col">
			<?php
				if(@$_GET['p']=="pedidos"){
			?>
			<a class="btn-menu" href="index-vendas-revendedor
			.php?p=pedidos">Pedidos</a>

			
				<?php 
				}else{
					
				?>
			<a href="index-vendas-revendedor
			.php?p=pedidos">Pedidos</a>

				<?php } ?>
		</div>
		<div class="col">
		<?php
				if(@$_GET['p']=="suporte"){
			?>
					<a class="btn-menu" href="index-vendas-revendedor
					.php?p=suporte">Suporte</a>

			
				<?php 
				}else{
					
				?>
					<a  href="index-vendas-revendedor
					.php?p=suporte">Suporte</a>


				<?php } ?>
			

		</div>
	</div>
</div>
</div>


<br>
<?php 

$menu = @$_GET['p'];


if($menu=="inicio"){
	sleep(1);

	require_once('inicio.php');
}elseif($menu=="pedidos"){
	require_once('pedidos.php');
}elseif($menu=="suporte"){
	require_once('suporte.php');
}

?>


<?php require 'pages/footer.php'; ?>
