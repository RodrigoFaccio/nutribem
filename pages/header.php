<?php require 'config.php'; ?>
<html>
<head>
	<title>NutrimBem</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<?php 
session_start() ;
if(empty($_SESSION['clogin'])){
	header('Location:');
}
?>
<div class="logo">
<img src="assets/barra.jpeg"  class="barra img-fluid" alt="">

<img style="width: 40px;  margin-top:-50px;" onclick="history.go(-1)" src="assets/seta.png" alt="">
</div>
<br>

<body>
	