<?php require 'pages/header.php'; 
		session_destroy();

?>
<br><br><br><br><br><br>
<script type="text/javascript">
    function distribuidor (){
        window.location.href="distribuidor.php";
    }
    function revendedor (){
        window.location.href="distribuidor.php";
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
            </button>

        </div>
    </div>
</div>
