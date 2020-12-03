
<?php 
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
$pedidos = $ped->getPedido($id);
?>

<h1>Meus pedidos</h1>
<div class="container">
    <div class="row">
        <div class="col">

   <?php foreach($pedidos as $pedido): 
        $produto = $pro->getProduto2($pedido['produto']);
    ?>         
<a href="produto-unico.php?id=<?php echo $pedido['id']  ?>">
<ul class="lista">
  <li>
  <div class="foto">
      <img src="assets/saco_racao.jpg">
    </div>
    <div class="conteudo">
        
      <span class="preco">R$ <?php echo $pedido['valor']?>,00</span>
       
      
        
      <p class="titulo" ><?php echo $produto['nome']?></p>
      
    </div>
  </li>
  
  
</ul>
</a>
        <?php endforeach; ?>
        </div>
    </div>
</div>




<?php require 'pages/footer.php'; ?>
