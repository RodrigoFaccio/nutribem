<?php
session_start();
require_once('config.php');
require 'classes/produtos.class.php';
require 'pages/header-adm.php';

if(empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="/nutribem";</script>
	<?php
	exit;
}


?>

<div class="container">
	<h2 style="text-align: center;">Cadastro de Produtos</h2>
	<?php
	require 'classes/usuarios.class.php';
	$p = new Produtos();
	if(isset($_POST['nome']) && !empty($_POST['uso']) && !empty($_POST['composicao']) && !empty($_POST['valor_revendedor']) && !empty($_POST['valor_distribuidor']) && !empty($_POST['categoria'])) {
        $nome = addslashes($_POST['nome']);
		$uso = addslashes($_POST['uso']);
		$composicao = addslashes($_POST['composicao']);
        $valor_revendedor = addslashes($_POST['valor_revendedor']);
		$valor_distribuidor = addslashes($_POST['valor_distribuidor']);
        
		$categoria = addslashes($_POST['categoria']);
        
        if($p->cadastroProdutos($nome,$uso,$composicao,$valor_distribuidor,$valor_revendedor,$categoria)){
            
		
		?>
			<div class="alert alert-success" role="alert">
			PRODUTO CADASTRADO COM SUCESSO!
			</div>
		<?php
		}
        
		
	}
	?>
	<form method="POST">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome" class="form-control" />
		</div>
		<div class="form-group">
			<label for="uso">Indicações de uso :</label>
			<input type="text" name="uso" id="uso" class="form-control" />
		</div>
        <div class="form-group">
			<label for="composicao">Composição química :</label>
			<input type="text" name="composicao" id="composicao" class="form-control" />
		</div>
        <div class="form-group">
			<label for="valor">Valor revendedor:</label>
			<input type="text" name="valor_revendedor" id="valor" class="form-control" />
        </div>
        <div class="form-group">
			<label for="valor">Valor distribuidor  :</label>
			<input type="text" name="valor_distribuidor" id="valor" class="form-control" />
		</div>
        <div class="form-group">
    <label for="exampleFormControlSelect1">Categoria</label>
    <select class="form-control" name="categoria" id="exampleFormControlSelect1">
	  <option value="bovino mineirais">Bovinos mineirais</option>
      <option value="bovino proteico">Bovinos proteico-energético</option>
	  
      <option value="suino">Suinos</option>
      <option value="aves">Aves</option>
      <option value="equino">Equinos</option>
      <option value="farelos">Farelos</option>
      <option value="graos">Grãos</option>

    </select>
  </div>

<div class="main">

		<input type="submit" value="Cadastrar Produto" class=" btn-padrao" />
</div>

	</form>

</div>
<?php require 'pages/footer.php'; ?>
