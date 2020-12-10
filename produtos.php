<?php 
require './pages/header.php';
require 'classes/produtos.class.php';
$categoria =(string)'bovino';

if(empty($_SESSION['cLoginrevendedor'])&& empty($_SESSION['cLogindistribuidor']) ) {
	?>
	<script type="text/javascript">window.location.href="index.php";</script>
	<?php
	exit;
}
$p = new Produtos ();


    $categoria=$_GET['c'];
  if($categoria=='bovino'){
    ?>
    <a href="produtos.php?c=bovino proteico">
      <li>
          <ul class="lista">
           
                <p class="titulo">Protéico</p>
                
              </div>
            
            
          </ul>
          </li>

      </a>
      <a href="produtos.php?c=bovino mineirais">
          <ul class="lista">
          <li>
          <ul class="lista">
           
                <p class="titulo">Mineirais</p>
                
              </div>
            
            
          </ul>
          </li>
            
            
          </ul>
      </a>

    <?php
  }else{
    

   
            
  $produtos = $p->produtosDistribuidor($categoria);
  foreach($produtos as $produto){
      if($produto['categoria']==$categoria){

        $imagens = $p->getImage($produto['id']);
        foreach($imagens as $img){
          $img =  $img['url'];
        }
  
        
?>
<a href="produto-unico.php?id=<?php echo $produto['id']  ?>">
<ul class="lista">
  <li>
  <div class="foto">
      <img src="assets/images/produtos/<?php echo $img ?>">
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
}

?>
<?php require 'pages/footer.php'; ?>
