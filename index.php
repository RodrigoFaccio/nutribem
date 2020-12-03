<?php require 'pages/header.php'; 
		session_destroy();

?>
<br><br><br><br><br><br>
<script type="text/javascript">
    function distribuidor (){
        window.location.href="login-distribuidor.php";
    }
    function revendedor (){
        window.location.href="login-revendedor.php";
    }
</script>
<div class="container ">
    <div class="row">
        <div class="col">
        <button onclick="distribuidor();" type="button" class=" botao">
                DISTRIBUIDOR
            </button>
            <button type="button" onclick="revendedor();" class=" botao">
                REVENDEDOR  
            </button><br>
            <a style="font-size: 14px; margin-left:40%; " href="cadastre-se.php"> Cadastrar</a>

        </div>
    </div>
</div>
<?php require 'pages/footer.php'; ?>
