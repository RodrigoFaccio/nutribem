<?php
class Usuarios {

	public function getTotalUsuarios() {
		global $pdo;

		$sql = $pdo->query("SELECT COUNT(*) as c FROM usuarios");
		$row = $sql->fetch();

		return $row['c'];
	}

	public function cadastrar($nome, $email, $senha ) {
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $pdo->prepare("INSERT INTO usuarios SET contratante = :nome, email = :email, senha = :senha ");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->execute();

			return true;

		} else {
			return false;
		}

	}

	public function loginDistribuidor($email, $senha) {
		global $pdo;
		$distribuidor ="distribuidor";

		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha AND contratante = :contratante");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":contratante", $distribuidor);

		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$_SESSION['cLogindistribuidor'] = $dado['id'];
			return true;
		} else {
			return false;
		}

	}
	public function loginRevendedor($email, $senha) {
		global $pdo;
		$revendedor ="revendedor";


		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha AND contratante = :contratante");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":contratante", $revendedor);

		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			echo 1;
			$_SESSION['cLoginrevendedor'] = $dado['id'];
			return true;
		} else {
			return false;
		}

	}














}
?>