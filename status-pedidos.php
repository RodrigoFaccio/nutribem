<?php 
require 'pages/header-adm.php';
    require 'classes/pedidos.class.php';
    $ped = new Pedidos();

if(!empty($_GET['id_iniciar'])){
$id_iniciar=$_GET['id_iniciar'];
if($ped->statusPedido($id_iniciar,'iniciado')){
    header('Location:pedidos-dash.php');
}

}elseif(!empty($_GET['id_delete'])){
$id_delete=$_GET['id_delete'];

    if($ped->deletePedido($id_delete)){
        header('Location:pedidos-dash.php');
    }


}elseif(!empty($_GET['id_finalizar'])){
$id_finalizar=$_GET['id_finalizar'];

    if($ped->statusPedido($id_finalizar,'finalizado')){
        header('Location:pedidos-dash.php');
    }
}



?>