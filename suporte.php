<?php 
if(!empty($_SESSION['cLoginrevendedor'])){
    $id=$_SESSION['cLoginrevendedor'];
}
if(!empty($_SESSION['cLogindistribuidor'])){
    $id=$_SESSION['cLogindistribuidor'];
}



?>
<a href="https://wa.me/5598981406393">
<ul class="lista">
  <li>
  
    <div class="conteudo">
       
      <p class="titulo" style="color: green;">Suporte via WhatsApp</p>
      
    </div>
  </li>
  
  
</ul>
</a>
<a href="editar-perfil.php?id=<?php echo $id; ?>">
<ul class="lista">
  <li>
  
    <div class="conteudo">
       
      <p class="titulo" style="color:green" >Editar perfil</p>
      
    </div>
  </li>
  
  
</ul>
</a>