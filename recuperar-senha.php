<?php require 'pages/header.php'; ?>
<?php
define("sitedir", "http://localhost/nutribem/", TRUE);
require 'classes/usuarios.class.php'; 
$u = new Usuarios();
if(isset($_POST['email'])) {
    $email = addslashes($_POST['email']);


   if ($u->recuperarSenha($email)) {
       # code...
       $dados = $u->recuperarSenha($email);
       $rash = $dados['senha'];


       $subject = "RECUPERAR SENHA";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		$message = "<html><head>";
		$message .= "
			<h2>Você solicitou uma nova senha?</h2>
			<hr>
			<h3>Se sim, aqui está o link para você recuperar a sua senha:</h3>
			<p>Para recuperar sua senha, acesse este link: <a href='http://nutribemzd.com.br/mudar-senha.php?rash={$rash}'>Recuperar senha</a></p>
			<hr>
			<h5>Não foi você quem solicitou? Se não ignore este email, porém alguém tentou alterar seus dados.</h5>
			<hr>
			Atenciosamente, Tutoriais e Informática.
		";

		$message .="</head></html>";

		if(mail($destinatario, $subject, $message, $headers)){
			echo "<div class='alert alert-success'>Os dados foram enviados para o seu email. Acesse para recuperar.</div>";
		}else{
			echo "<div class='alert alert-danger'>Erro ao enviar</div>".$sql->error;
		}
   }
   

        
}

?>
<div class="container">
    <div class="row">
        <div class="col">
        <form method="POST">
		<div class="form-group">
			<label for="email">E-mail cadastrado:</label>
			<input type="email" name="email" id="email" value="" class="form-control" />
        </div>
        <a href="mudar-senha.php?rash="<?php echo $rash ?> >Recuperar</a>
		

		<div class="main">

		<input type="submit" value="Fazer Login" class=" btn-padrao" />
</div>
	</form>
        </div>
    </div>
</div>
