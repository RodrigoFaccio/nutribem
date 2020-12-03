<?php require 'pages/header.php';

?>
<div class="container">
	<h1 style="text-align: center;">Login distribuidor</h1>
	<?php
	require 'classes/usuarios.class.php';
	$u = new Usuarios();
	if(isset($_POST['email']) && !empty($_POST['email'])) {
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];

		if($u->loginDistribuidor($email, $senha)) {
			?>
			<script type="text/javascript">window.location.href="index-vendas-distribuidor.php?p=inicio";</script>
			<?php
		} else {
			?>
			<div class="alert alert-danger">
				Usuário e/ou Senha errados!
			</div>
			<?php
		}
	}
	?>
	<form method="POST">
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" value="adm@gmail.com" class="form-control" />
		</div>
		<div class="form-group">
			<label for="senha">Senha:</label>
			<input type="password" name="senha" id="senha" class="form-control" />
		</div>
<div class="main">

		<input type="submit" value="Fazer Login" class=" btn-padrao" />
</div>

	</form>

</div>
<script>
	 function cadastrar(){
		 alert('oi');
        window.location.href="cadastre-se.php";
    }
</script>
<?php require 'pages/footer.php'; ?>