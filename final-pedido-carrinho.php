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
    $valor = $_POST['valor'];
    $pedidos =  $_POST['pedidos'];
    $quantidade =  $_POST['quantidade'];
    if(isset($_SESSION['cLogindistribuidor'])){
		
		$usuario = $u->getUsuario($_SESSION['cLogindistribuidor']);
		
	}
	if(isset($_SESSION['cLoginrevendedor'])){
		
		$usuario = $u->getUsuario($_SESSION['cLoginrevendedor']);
		
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
            <p><b>Cpf/Cnpj: </b><?php echo $usuario['cpf'] ?></p>
			<p><b>Valor total: </b>R$<?php echo $valor ?>,00</p>
            
               <p><b>Quantidade de itens: </b><?php echo  $quantidade  ?></p>
                <a href="cadastrar-carrinho.php">Confirmar pedido</a>
            </div>
        </div>
    </div>
<?php require 'pages/footer.php'; ?>