<?php require 'pages/header.php'; ?>
<div class="container">
	<h1>Cadastre-se</h1>
	<?php
	require 'classes/usuarios.class.php';
	$u = new Usuarios();
	if(!empty($_POST['vendedor']) && !empty($_POST['nome'])&&!empty($_POST['telefone']) && !empty($_POST['cpf']) && !empty($_POST['cnpj']) && !empty($_POST['endereco'])) {
		$nome = addslashes($_POST['nome']);
		$endereco = addslashes($_POST['endereco']);

		$vendedor = addslashes($_POST['vendedor']);
		$email = addslashes($_POST['email']);
		$telefone = addslashes($_POST['telefone']);
		$cpf = addslashes($_POST['cpf']);
		$cnpj = addslashes($_POST['cnpj']);
		$senha = $_POST['senha'];



		

		if(!empty($nome) && !empty($email) && !empty($senha)) {
			if($u->cadastrar($nome, $email, $senha,$vendedor,$telefone,$cnpj,$cpf,$endereco)) {
				?>
				<div style="color:green">
				
					<strong>Parabéns!</strong> Cadastrado com sucesso. <a href="index.php" class="alert-link">Faça o login agora</a>
				</div>
				<?php
			} else {
				?>
				<div class="alert alert-warning">
					Este usuário já existe! <a href="login.php" class="alert-link">Faça o login agora</a>
				</div>
				<?php
			}
		} else {
			?>
			<div class="alert alert-warning">
				Preencha todos os campos!
			</div>
			<?php
		}

	}
	?>
	
	<form method="POST">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome" class="form-control" />
		</div>
		<div class="form-group">
			<label for="tel">Telefone:</label>
			<input type="text" name="telefone" id="tel" onkeypress="$(this).mask('(00) 0000-00000');" class="form-control" />
		</div>
		<div class="form-group">
			<label for="cpf">CPF:</label>
			<input type="cpf" onkeypress="$(this).mask('000.000.000-00');" name="cpf" id="cpf" class="form-control" />
		</div>
		<div class="form-group">
			<label for="Cnpj">Cnpj:</label>
			<input type="text" name="cnpj" onkeypress="$(this).mask('000.000.000-00');" id="Cnpj" class="form-control" />
		</div>
		<div class="form-group">
			<label for="endereco">Endereço:</label>
			<input type="text" name="endereco" id="endereco" class="form-control" />
		</div>
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" class="form-control" />
		</div>
		<div class="form-group">
			<label for="senha">Senha:</label>
			<input type="password" name="senha" id="senha" class="form-control" />
		</div>
		<div class="form-group">
			<label for="vendedor">Tipo de vendedor :</label>
			<select class="custom-select" name="vendedor">
				<option value="distribuidor">Distribuidor</option>
				<option value="revendedor">Revendedor</option>
			</select>
		</div>
		
		<input type="submit" value="Cadastrar" class="btn btn-success" />
	</form>

</div>
<?php require 'pages/footer.php'; ?>