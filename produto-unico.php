<?php
require './pages/header.php';
require 'classes/produtos.class.php';
?>
<?php 
$id=$_GET['id'];
$p = new Produtos();
    $produtos = $p->getProduto($id);

    foreach($produtos as $produto){
    }
?>

<div class="container main">
    <div class="row">
        <div class="col ">
            <img class="img-unico" src="assets/saco_racao.jpg" alt="">
            <hr>
            <?php foreach($produtos as $produto): ?>
            <h2><?php echo $produto['nome'];?></h2>
            <div class="descricao">
                <h4>Composição </h4>
                    <h5><?php echo $produto['composicao'];?> </h5>
                    <h4>Indicação</h4>
                    <h5><?php echo $produto['indicacao'];?></h5>
                    <?php
                        if(!empty($_SESSION['cLogindistribuidor'])):
                        
                        ?>
                    <h4>R$ <?php echo $produto['preco_distribuidor']?></h4>
                        <?php endif; ?>
                        <?php
                        if(!empty($_SESSION['cLoginrevendedor'])):
                        
                        ?>
                    <h4>R$ <?php echo $produto['preco_revendedor']?></h4>
                        <?php endif; ?>
                <a href="#" data-toggle="modal" data-target="#exampleModalCenter"class="btn btn-success">Fazer pedido</a>
                <?php endforeach; ?>        
            </div>
        </div>
    </div>
</div>
<br>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php 
require './pages/footer.php';

?>