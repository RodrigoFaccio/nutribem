<?php 
require 'pages/header-adm.php';
if(empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="/nutribem";</script>
	<?php
	exit;
}


require 'classes/produtos.class.php';
$p = new Produtos();


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
      <th scope="col">Nome</th>
      <th scope="col">Valor Distribuidor</th>
      <th scope="col">Valor Revendedor</th>
      <th scope="col">Editar</th>
      <th scope="col">Deletar</th>

    </tr>
  </thead>
  <tbody>
  <?php
      
      $produtos = $p->getProdutos();
  
      foreach($produtos as $produto):
      ?>
    <tr>
      
        <td>
          <?php echo $produto['nome'] ?>
        </td>
        <td>
          <?php echo $produto['preco_distribuidor'] ?>
        </td>
        <td>
          <?php echo $produto['preco_revendedor'] ?>
        </td>
        <td>
          <a href="editar-produto.php?id=<?php echo $produto['id'] ?>" class="btn btn-warning"><img src="https://img.icons8.com/material-sharp/24/000000/edit.png"/></a>
        </td>
        <td>
          <a href="deletar-produto.php?id=<?php echo $produto['id'] ?>"class="btn btn-danger">X</a>
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


