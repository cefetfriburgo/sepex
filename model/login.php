<?php

	class Model{
  
	    public function validaDados($email, $senha) {
			$pdo = new PDO('mysql:host=localhost;dbname=sepex;charset=utf8', 'root', '');
			//echo $email."--> 1";
			//$pos = strpos($email, 'cefet-rj.br');
			//echo $pos;
			//if($pos!= null){
				
				$array = explode('@', $email);			
				//echo "tamanho do array =". sizeof($array);
				$pass = md5($senha); //deve receber a variavel $senha com a criptografia
				$ps = $pdo->query("select senha from usuario where email='" . $email . "'");
	    	
				$p = $ps->fetch();
				
				$ver = $p['senha'];

			/* Aplica a validação ao usuário e senha passados, utilizando as regras de négocio especificas para ele. */
			
				if(substr($array[1], -11) !="cefet-rj.br"){// verifica os ultimos 11
					
					header('location:./../view/admin/login.php?erro=erro');//	return 'Digite o usuário corretamente';
					
				}else if($pass != $ver){
					
					header('location:./../view/admin/login.php?erro=erro');//return 'email ou senha incorretos';

				}else{
					session_start();
					$_SESSION['email'] = $email;
					$_SESSION['senha'] = $senha;
					
					header('location:./../view/admin/principal/index.php');	
				}
			//}else{
			//	header('location:./../view/admin/login.php');//return "digite corretamente";
			//}
				
		}
	
	}

?>