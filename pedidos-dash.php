<?php 
require 'pages/header-adm.php';
require 'classes/produtos.class.php';
require 'classes/pedidos.class.php';
require 'classes/usuarios.class.php';



if(empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="/nutribem";</script>
	<?php
	exit;
}


$p = new Produtos();
$u = new Usuarios();
$ped = new Pedidos();





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles.css">

    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome Produto</th>
      <th scope="col">Nome comprador</th>
      <th scope="col">Quantidade </th>
      <th scope="col">Valor</th>
      <th scope="col">Mais infromações </th>

    </tr>
  </thead>
  <tbody>
  <?php
      
      $pedidos = $ped->getPedidos();
  
      foreach($pedidos as $pedido):
        $produto = $p->getProduto2($pedido['produto']);
        $usuario = $u->getUsuario($pedido['id_vendedor']);


      ?>
    <tr>
      
        <td>
          <?php echo $produto['nome'] ?>
        </td>
        <td>
          <?php echo $usuario['nome'] ?>
        </td>
        <td>
          <?php echo $pedido['quantidade'] ?>
        </td>
        <td>
        R$<?php echo $pedido['valor'] ?>,00

        </td>
        <td>
        <a href="mais-info-pedido.php?id=<?php echo $pedido['id'] ?>">Mais informações</a>

        </td>
        
        
    </tr>
    <?php endforeach; ?>
    
  </tbody>
</table>

    </div>
</div>
</body>
</html>

<?php require 'pages/footer.php'; ?>
