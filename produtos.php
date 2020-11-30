<?php 
require './pages/header.php';
require 'classes/produtos.class.php';
$categoria =(string)'bovino';

if(empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="index.php";</script>
	<?php
	exit;
}
$p = new Produtos ();



    $categoria=$_GET['c'];

    $produtos = $p->produtosDistribuidor($categoria);
    foreach($produtos as $produto){
        if($produto['categoria']==$categoria){
            
            
        
?>
<a href="produto-unico.php?id=<?php echo $produto['id']  ?>">
<ul class="lista">
  <li>
  <div class="foto">
      <img src="assets/saco_racao.jpg">
    </div>
    <div class="conteudo">
        <?php
        if(!empty($_SESSION['cLogindistribuidor'])):
        
        ?>
      <span class="preco">R$ <?php echo $produto['preco_distribuidor']?></span>
        <?php endif; ?>
        <?php
        if(!empty($_SESSION['cLoginrevendedor'])):
        
        ?>
      <span class="preco">R$ <?php echo $produto['preco_revendedor']?></span>
        <?php endif; ?>
      <p class="titulo"><?php echo $produto['nome']?></p>
      
    </div>
  </li>
  
  
</ul>
</a>


<?php
    
}
}
?>
<?php require 'pages/footer.php'; ?>
