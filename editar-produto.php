<?php 
require 'pages/header.php';
if(empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="/nutribem";</script>
	<?php
	exit;
}

require 'classes/produtos.class.php';
$p = new Produtos();

$id=$_GET['id'];
    $produtos = $p->getProduto($id);

    foreach($produtos as $produto){
    }
    if(isset($_POST['nome']) && !empty($_POST['uso']) && !empty($_POST['composicao']) && !empty($_POST['valor_revendedor']) && !empty($_POST['valor_distribuidor']) && !empty($_POST['categoria'])) {
        $nome = addslashes($_POST['nome']);
		$uso = addslashes($_POST['uso']);
		$composicao = addslashes($_POST['composicao']);
        $valor_revendedor = addslashes($_POST['valor_revendedor']);
		$valor_distribuidor = addslashes($_POST['valor_distribuidor']);
        
		$categoria = addslashes($_POST['categoria']);
        
        if($p->editarProduto($nome,$uso,$composicao,$valor_distribuidor,$valor_revendedor,$categoria,$id)){
            
		
		?>
			<div class="alert alert-success" role="alert">
			PRODUTO EDITADO COM SUCESSO!
			<script type="text/javascript">window.location.href="produtos-dash.php";</script>

			</div>
		<?php
		}
        
		
	}
	

?>
<div  class="container">
    

    
<form method="POST">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" value="<?php echo $produto['nome'] ?>" name="nome" id="nome" class="form-control" />
		</div>
		<div class="form-group">
			<label for="uso">Indicações de uso :</label>
			<input type="text" value="<?php echo $produto['indicacao'] ?>" name="uso" id="uso" class="form-control" />
		</div>
        <div class="form-group">
			<label for="composicao">Composição química :</label>
			<input type="text" name="composicao" value="<?php echo $produto['composicao'] ?>" id="composicao" class="form-control" />
		</div>
        <div class="form-group">
			<label for="valor">Valor revendedor:</label>
			<input type="text" name="valor_revendedor" value="<?php echo $produto['preco_revendedor'] ?>" id="valor" class="form-control" />
        </div>
        <div class="form-group">
			<label for="valor">Valor distribuidor  :</label>
			<input type="text" name="valor_distribuidor" id="valor" value="<?php echo $produto['preco_distribuidor'] ?>" class="form-control" />
		</div>
        <div class="form-group">
    <label for="exampleFormControlSelect1">Categoria</label>
    <select class="form-control" name="categoria" id="exampleFormControlSelect1">
      <option value="bovino">Bovinos</option>
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