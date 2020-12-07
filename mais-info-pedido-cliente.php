<?php require 'pages/header-adm.php'; 
$id_produto = $_GET['id'];
if(empty($_SESSION['cLogindistribuidor']) && empty($_SESSION['cLoginrevendedor']) ) {
	?>
	<script type="text/javascript">window.location.href="/nutribem";</script>
	<?php
	exit;
}

?>
<div class="container">
	<?php
	require 'classes/usuarios.class.php';
	require 'classes/produtos.class.php';
	require 'classes/pedidos.class.php';



	$u = new Usuarios();
	$p = new Produtos();
    $ped= new Pedidos();

    $pedidos = $ped->getPedidoInfo($id_produto);
    $usuario = $u->getUsuario($pedidos['id_vendedor']);
    $produto = $p->getProduto2($pedidos['produto']);

    

	

	
	


	
	
	?>
	<div class="container">
    <div class="row">
        <div class="col">
            <h1>Pedido</h1>
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
			
            <p><b>Quantidade:</b><?php echo $pedidos['quantidade'] ?></p><hr>
            <p><b>Valor total:</b>R$<?php echo $pedidos['valor'] ?>,00</p><hr>
            <h4 style="color: green;"><?php echo $pedidos['estado'] ?></h4>

            <?php ?>
            
            <br><br>
            
            

            
        </div>
    </div>
</div>

	
<?php require 'pages/footer.php'; ?>