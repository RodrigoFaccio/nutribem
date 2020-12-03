<?php
class Usuarios {

	public function getTotalUsuarios() {
		global $pdo;

		$sql = $pdo->query("SELECT COUNT(*) as c FROM usuarios");
		$row = $sql->fetch();

		return $row['c'];
	}

	public function getUsuario($id){
		global $pdo;

		$sql = $pdo->query("SELECT * FROM usuarios 	WHERE id= $id ");
		if($sql->rowCount() > 0) {

			$array = $sql->fetch();
		}

		return $array;


	}
	public function cadastrar($nome, $email, $senha,$contratante,$telefone,$cnpj,$cpf,$endereco) {
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $pdo->prepare("INSERT INTO usuarios SET contratante = :contratante, email = :email, senha = :senha,
			endereco = :endereco, nome = :nome, cpf= :cpf, cnpj = :cnpj, telefone = :telefone, adm = :adm");
			$sql->bindValue(":contratante", $contratante);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":endereco", $endereco);
			$sql->bindValue(":cpf", $cpf);
			$sql->bindValue(":cnpj", $cnpj);
			$sql->bindValue(":telefone", $telefone);
			$sql->bindValue(":adm", 0);




			
			$sql->execute();

			return true;

		} else {
			return false;
		}

	}

	public function loginDistribuidor($email, $senha) {

		
		global $pdo;
		$distribuidor ="distribuidor";

		$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha AND contratante = :contratante");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":contratante", $distribuidor);

		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$adm =$dado['a'];
			if($adm==1){
				$_SESSION['cLogin']='adm';

			}else{
				$_SESSION['cLogin']='';


			}
			

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
			$adm = (int) $dado['a'];
			$adm =$dado['a'];
			if($adm==1){
				$_SESSION['cLogin']='adm';

			}else{
				$_SESSION['cLogin']='';


			}
			
			$_SESSION['cLoginrevendedor'] = $dado['id'];

			return true;
		} else {
			return false;
		}

	}














}
?>