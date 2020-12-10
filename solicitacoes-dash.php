<?php 
require 'pages/header-adm.php';

require 'classes/usuarios.class.php';
$u = new Usuarios();




if(empty($_SESSION['cLogin'])) {
	?>
	
	<?php
	exit;
}
if($_GET['id']){
    if($u->aceitarUser($_GET['id'])){
        ?>
        	<strong>Usuário aceito com sucesso </strong>

        <?php

    }
}








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
      <th scope="col">Usuario</th>
      <th scope="col">CPF</th>
      <th scope="col">E-mail</th>
      <th scope="col">Aceitar</th>

    </tr>
  </thead>
  <tbody>
  <?php
      
     $usuarios = $u->getUsuarios();
  
      foreach($usuarios as $usuario):
       


      ?>
    <tr>
      
        <td>
        <?php echo $usuario['nome'] ?>

        </td>
        <td>
          <?php echo $usuario['cpf'] ?>
        </td>
        <td>
          <?php echo $usuario['email'] ?>
        </td>
        <td>
       <a href="solicitacoes-dash.php?id=<?php echo $usuario['id'] ?>">Aceitar</a>

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
