
<?php 
require 'pages/header.php';
require 'classes/pedidos.class.php';
require 'classes/produtos.class.php';

$ped=new Pedidos();
$pro=new Produtos();


 if(!empty($_SESSION['cLogindistribuidor'])){
     $id=$_SESSION['cLogindistribuidor'];
 }
 if(!empty($_SESSION['cLoginrevendedor'])){
    $id=$_SESSION['cLoginrevendedor'];
}
$pedidos = $ped->getCarrinho($id);
?>

<h1>Meus pedidos</h1>
<div class="container">
    <div class="row">
        <div class="col">

   <?php foreach($pedidos as $pedido): 
        $produto = $pro->getProduto2($pedido['id_produto']);
        $valorcarrinho = $valorcarrinho+$pedido['valor'];
        $quantidade = $quantidade+$pedido['quantidade'];
        $imagens = $pro->getImage($produto['id']);
        foreach($imagens as $img){
          $img =  $img['url'];
        }
    ?>         
<a href="#" style="color:green; ">
<ul class="lista">
  <li>
  <div class="foto">
  <img src="assets/images/produtos/<?php echo $img ?>">

    </div>
    <div class="conteudo">
        
      <span class="preco">R$ <?php echo $pedido['valor']?>,00</span>


       
      
      <p class="titulo" ><?php echo $produto['nome']?></p>
      <a href="deletar-carrinho.php?id=<?php echo $pedido['id'] ?>">Excluir</a>


      
    </div>
  </li>
  
  
</ul>
</a>

        <?php endforeach; ?>
        </div>
    </div>
</div>
<h3>Valor:R$<?php echo $valorcarrinho ?>,00</h3>

<form action="final-pedido-carrinho.php" method="POST">
	<input type="checkbox" name="valor" hidden checked value="<?php echo $valorcarrinho ?>" id="">
	<input type="checkbox" name="pedidos" hidden checked value="<?php echo $pedidos ?>" id="">
	<input type="checkbox" name="quantidade" hidden checked value="<?php echo $quantidade ?>" id="">


<button class="btn-padrao">Realizar pedido</button> 
</form>




<?php require 'pages/footer.php'; ?>
