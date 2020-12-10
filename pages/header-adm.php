<?php session_start(); 
require 'config.php';
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg">
  <a class="navbar-brand" href="/"><img src="assets/barra.jpeg" style="width: 60px;" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link " href="produtos-dash.php?p=">Produtos</a>
      <a class="nav-item nav-link" href="cadastro-produtos.php">Cadastrar produtos </a>
      <a class="nav-item nav-link" href="pedidos-dash.php">Pedidos </a>
      <a class="nav-item nav-link" href="solicitacoes-dash.php">Solicitações </a>

      
    </div>
  </div>
</nav>

<?php  
$menu = @$_GET['p'];

?>
<?php 



if(!empty(@$_GET['p'])){
	sleep(1);

	require_once('produtos-dash.php');
}
if($menu=="cadastro"){
	require_once('cadastro-produtos.php');

}


?>
  
</body>
</html>
