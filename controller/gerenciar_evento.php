<?php
	require_once dirname(__FILE__)."./../model/evento.php";
	
	

	class ControllerGerenciar{
		private $evento;

		public function __construct(){
			$this->evento = new Evento();
		}

		public function gerenciar($id_novo, $id_atual){

			if($id_novo != $id_atual){
				$despublicar = $this->evento->despublicarEvento($id_atual);
				
				$publicado = $this->evento->publicarEvento($id_novo);
			}
			header("Location: ./../view/admin/evento/listar.php");
			
		}

		public function disponivel(){
			return $this->evento->eventoDisponivel();
		}

		public function atual(){
			return $this->evento->eventoAtual();
		}
		
	}
	
	$c = new ControllerGerenciar();
	
	 $lista = $c->disponivel();
	 $publicado = $c->atual();

	if(isset($_POST['id_evento_atual']) && !empty($_POST['id_evento_atual'])){
		$id_atual = $_POST['id_evento_atual'];
	}else{
		$id_atual = 0;
	}
	
	if(isset($_POST['evento']) && !empty($_POST['evento'])){		
		$id_novo =  $_POST['evento'];
		$c->gerenciar($id_novo, $id_atual);
	}



?>




					