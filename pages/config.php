
<?php
session_start();

global $pdo;
try {
    $pdo = new PDO("mysql:dbname=nutribem;host=localhost", "rodrigo", "rodrigo");
    echo "foi";
} catch(PDOException $e) {
	echo "FALHOU: ".$e->getMessage();
	exit;
}
?>