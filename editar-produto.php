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
        $fotos = $_FILES['fotos'];
		$categoria = addslashes($_POST['categoria']);
        
        if($p->editarProduto($nome,$uso,$composicao,$valor_distribuidor,$valor_revendedor,$categoria,$id)){
            $p->addImage($fotos,$id);
		
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
    

    
<form method="POST"  enctype="multipart/form-data">

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
			<input type="text" placeholder="EX:30" name="valor_revendedor" value="<?php echo $produto['preco_revendedor'] ?>" id="valor" class="form-control" />
        </div>
        <div class="form-group">
			<label for="valor">Valor distribuidor  :</label>
			<input type="text" placeholder="EX:30" name="valor_distribuidor" id="valor" value="<?php echo $produto['preco_distribuidor'] ?>" class="form-control" />
		</div>
        <div class="form-group">
    <label for="exampleFormControlselected1">Categoria</label>
    <select class="form-control" name="categoria" id="exampleFormControlselected1">

	<?php 
	if($produto['categoria']=='bovino mineirais'){
		$bovinom='selected';

	}elseif($produto['categoria']=='bovino proteico'){
		$bovinop='selected';

	}elseif($produto['categoria']=='suino'){
		$suino='selected';

	}elseif($produto['categoria']=='aves'){
		$aves='selected';

	}elseif($produto['categoria']=='equino'){
		$equino='selected';

	}elseif($produto['categoria']=='farelos'){
		$farelos='selected';

	}
	elseif($produto['categoria']=='graos'){
		$graos='selected';

	}
	echo $bovinom;
	
	?>
	  <option <?php echo $bovinom ?>  selecteded value="bovino mineirais">Bovinos mineirais</option>
      <option <?php echo $bovinop ?> value="bovino proteico">Bovinos proteico-energético</option>
	  
      <option <?php echo $suino ?> value="suino">Suinos</option>
      <option <?php echo $aves ?> value="aves">Aves</option>
      <option <?php echo $equino ?> value="equino">Equinos</option>
      <option <?php echo $farelos ?> value="farelos">Farelos</option>
      <option <?php echo $graos ?>value="graos">Grãos</option>

    </select>
  </div>

<div class="main">
<div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file" name="fotos[]" multiple>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload one or more files">
      </div>
    </div>
	

		<input type="submit" value="Cadastrar Produto" class=" btn-padrao" />
</div>

	</form>
    </div>



<?php require 'pages/footer.php'; ?>