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
    if($p->detetarProduto($id)){
		?>
		<div class="alert alert-success" role="alert">
			PRODUTO DELETADO COM SUCESSO!
			<script type="text/javascript">window.location.href="produtos-dash.php";</script>

			</div>
		<?php
	}

    
	

?>