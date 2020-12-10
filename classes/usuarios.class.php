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
	public function editarUsuario($nome,$cpf,$endereco,$telefone,$categoria,$id){

		global $pdo;

        $sql = $pdo->prepare("UPDATE  usuarios SET contratante = :contratante, nome =:nome, endereco = :endereco, cpf =:cpf,telefone =:telefone WHERE id = $id ");
            $sql->bindValue(":nome", $nome);
			$sql->bindValue(":contratante", $categoria);
			$sql->bindValue(":cpf", $cpf);
			$sql->bindValue(":endereco", $endereco);
			$sql->bindValue(":telefone", $telefone);



            
          
            $sql->execute();

			return true;

	}
	public function cadastrar($nome, $email, $senha,$vendedor,$telefone,$cpf,$endereco) {
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $pdo->prepare("INSERT INTO usuarios SET contratante = :contratante, email = :email, senha = :senha,
			endereco = :endereco, nome = :nome, cpf= :cpf,  telefone = :telefone, a = :adm");
			$sql->bindValue(":contratante", $vendedor);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":endereco", $endereco);
			$sql->bindValue(":cpf", $cpf);
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

		$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha AND contratante = :contratante ");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":contratante", $distribuidor);

		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$adm =$dado['a'];
			if($adm==2){
				$_SESSION['cLogin']='adm';
				header('Location:produtos-dash.php');

			}else{
				$_SESSION['cLogin']='';


			}
			

			$_SESSION['cLogindistribuidor'] = $dado['id'];
			return $dado;
		} else {
			return false;
		}

	}
	public function loginRevendedor($email, $senha) {
		global $pdo;
		$revendedor ="revendedor";


		$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha AND contratante = :contratante ");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":contratante", $revendedor);

		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0) {
			
			$dado = $sql->fetch();
			
			$adm = (int) $dado['a'];
			$adm =$dado['a'];
			if($adm==2){
				$_SESSION['cLogin']='adm';
				header('Location:produtos-dash.php');


			}else{
				$_SESSION['cLogin']='';


			}
			
			$_SESSION['cLoginrevendedor'] = $dado['id'];

			return $dado;

		} else {
			return false;
		}

	}
	public function recuperarSenha($email)
	{
		global $pdo;


		$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email ");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$dado = $sql->fetch();

		
			

			return $dado;
		} else {
			return false;
		}

		# code...
	}
public function cadastrarSenha($senha,$rash)
{
	echo $rash;
	echo $senha;
	global $pdo;


		$sql = $pdo->prepare("UPDATE  usuarios SET senha=:senha WHERE senha = :rash ");
		$sql->bindValue(":senha", md5($senha));
		$sql->bindValue(":rash", $rash);

		$sql->execute();
		return true;

	
}
public function getUsuarios()
{
	# code...
	global $pdo;

		$sql = $pdo->query("SELECT * FROM usuarios WHERE a=0 ");
		if($sql->rowCount() > 0) {

			$array = $sql->fetchAll();
		}

		return $array;
}
public function aceitarUser($id)
{
	global $pdo;


		$sql = $pdo->prepare("UPDATE  usuarios SET a=1 WHERE id= $id ");
		

		$sql->execute();
		return true;
	# code...
}
function verificarUser($id)
{
	# code...
	global $pdo;



	$sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = $id");
	
	$sql->execute();
	$array = $sql->fetch();
	

	if($array['a']!=0){
		return true;
	}else{
		return false;
	}
}












}
?>