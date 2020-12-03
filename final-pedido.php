<?php require 'pages/header.php'; ?>
<div class="container">
	<h1>Finalizar pedido</h1>
	<?php
	require 'classes/usuarios.class.php';
	require 'classes/produtos.class.php';
	require 'classes/pedidos.class.php';



	$u = new Usuarios();
	$p = new Produtos();
	$pedidos = new Pedidos();

	if(isset($_SESSION['cLogindistribuidor'])){
		$quant = $_POST['quant'];
		$produto= $p->getProduto2($_POST['id']);
		$usuario = $u->getUsuario($_SESSION['cLogindistribuidor']);
		$valorfinal = $produto['preco_distribuidor'];
	}
	if(isset($_SESSION['cLoginrevendedor'])){
		$quant = $_POST['quant'];
		$produto= $p->getProduto2($_POST['id']);
		$usuario = $u->getUsuario($_SESSION['cLoginrevendedor']);
		$valorfinal = $produto['preco_revendedor'];
	}

	
	


	
	
	?>
	<div class="container">
    <div class="row">
        <div class="col">
            <h3>Finalizar pedido</h3>
            <h5>Confirmar informações </h5>
            <hr>
            <p><b>Nome Comprador</b><?php echo $usuario['nome'] ?></p>
            <hr>

            <p><b>Telefone:</b><?php echo $usuario['telefone'] ?></p>
            <hr>
            <p><b>Endereço:</b><?php echo $usuario['endereco'] ?></p>
            <hr>
			<p><b>Cpf/Cnpj:</b><?php echo $usuario['cpf'] ?></p>
			<hr>
            <p> <b> Produto:</b><?php echo $produto['nome'] ?> </p><hr>
			
            <p><b>Quantidade:</b><?php echo $quant ?></p><hr>
            <p><b>Valor total:</b>R$<?php echo $valor = $quant*$valorfinal ?>,00</p><hr>
            
            

            
        </div>
    </div>
</div>

	<p><?php ?></p>
	
	<form method="POST" action="cadastro-pedido.php">
	<input type="checkbox" name="quant" hidden checked value="<?php echo $quant ?>" id="">
	<input type="checkbox" name="produto" hidden checked value="<?php echo $produto['id'] ?>" id="">
	<input type="checkbox" name="usuario" hidden checked value="<?php echo $usuario['id'] ?>" id="">
	<input type="checkbox" name="valor" hidden checked value="<?php echo $valor ?>" id="">



	<div class="form-group">
			<label for="nome">Observação:</label>
			<input type="text" name="nome" id="nome" class="form-control" />
		</div>
		
		
		<input type="submit" value="Finalizar" class="btn-padrao" />
	</form>

</div>
<?php require 'pages/footer.php'; ?>