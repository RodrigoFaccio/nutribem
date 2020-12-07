<?php 
require 'pages/header.php';
if(empty($_SESSION['cLogindistribuidor']) && empty($_SESSION['cLoginrevendedor']) ) {
	?>
	<script type="text/javascript">window.location.href="/nutribem";</script>
	<?php
	exit;
}
if(!empty($_SESSION['cLogindistribuidor'])){
    $id=$_SESSION['cLogindistribuidor'];
}
if(!empty($_SESSION['cLoginrevendedor'])){
    $id=$_SESSION['cLoginrevendedor'];
}

require 'classes/usuarios.class.php';
$u = new Usuarios();

    $usuario = $u->getUsuario($id);

    
    if(isset($_POST['nome']) && !empty($_POST['endereco']) && !empty($_POST['telefone']) && !empty($_POST['categoria']) && !empty($_POST['cpf'])) {
        $nome = addslashes($_POST['nome']);
        $cpf = addslashes($_POST['cpf']);


		$endereco = addslashes($_POST['endereco']);
		$telefone = addslashes($_POST['telefone']);
        $categoria = addslashes($_POST['categoria']);
		
        
        if($u->editarUsuario($nome,$telefone,$cpf,$endereco,$categoria,$id)){
            
		
        ?>
        <?php 
        if(!empty($_SESSION['cLogindistribuidor'])){
                $id=$_SESSION['cLogindistribuidor'];
            ?>
			<div class="alert alert-success" role="alert">
			PRODUTO EDITADO COM SUCESSO!
			<script type="text/javascript">window.location.href="index-vendas-distribuidor.php?p=inicio";</script>

            </div>
        <?php } ?>
        <?php 
        if(!empty($_SESSION['cLoginrevendedor'])){
                $id=$_SESSION['cLoginrevendedor'];
            ?>
			<div class="alert alert-success" role="alert">
			PRODUTO EDITADO COM SUCESSO!
			<script type="text/javascript">window.location.href="index-vendas-revendedor.php?p=inicio";</script>

            </div>
        <?php } ?>
        
		<?php
		}
        
		
	}
	

?>
<div  class="container">
    

    
<form method="POST">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" value="<?php echo $usuario['nome'] ?>" name="nome" id="nome" class="form-control" />
		</div>
		<div class="form-group">
			<label for="uso">Endereço :</label>
			<input type="text" value="<?php echo $usuario['endereco'] ?>" name="endereco" id="uso" class="form-control" />
		</div>
        <div class="form-group">
			<label for="telefone">CPF</label>
			<input type="text" name="cpf" value="<?php echo $usuario['cpf'] ?>" id="telefone" class="form-control" />
		</div>
        <div class="form-group">
			<label for="valor">Telefone:</label>
			<input type="text" name="telefone" value="<?php echo $usuario['telefone'] ?>" id="valor" class="form-control" />
        </div>
        
        <div class="form-group">
    <label for="exampleFormControlSelect1">Tipo de vendedor :</label>
    <select class="form-control" name="categoria" id="exampleFormControlSelect1">
      <option value="revendedor">Revendedor</option>
      <option value="distribuidor">Distribuidor</option>
      

    </select>
  </div>

<div class="main">

		<input type="submit" value="Cadastrar Produto" class=" btn-padrao" />
</div>

	</form>
    </div>



<?php require 'pages/footer.php'; ?>