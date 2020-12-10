<?php require 'pages/header.php'; ?>
<?php
define("sitedir", "http://localhost/nutribem/", TRUE);
require 'classes/usuarios.class.php'; 
$u = new Usuarios();
if(isset($_POST['senha'])) {
    $rash = $_GET['rash'];
    $senha = addslashes($_POST['senha']);


   if ($u->cadastrarSenha($senha,$rash)) {
         echo"foi";
   }
   

        
}

?>
<div class="container">
    <div class="row">
        <div class="col">
        <form method="POST">
		<div class="form-group">
			<label for="senha">Nova senha:</label>
			<input type="text" name="senha" id="senha" value="" class="form-control" />
        </div>
		

		<div class="main">

		<input type="submit" value="Cadastrar" class=" btn-padrao" />
</div>
	</form>
        </div>
    </div>
</div>
