<?php
    require_once "./../model/evento.php";

    $id = $_POST['id'];

    class ControllerEvento{
        private $evento;

        public function __construct(){            
            $this->evento = new Evento();
        }

        /*public function listar(){
            $this->evento->listarEvento();
        }

        public function pesquisar($nome){
            if(!isset($nome)){
                header('location: ./../view/admin/evento/listar.php');
            }else{
                $this->evento->pesquisarEvento($nome);
                
            }            
        }

        public function atualizar($id, $nome, $ano, $semestre){
            if(!isset($id) || !isset($nome) || !isset($ano) || !isset($semestre)){
                header('location: ./../view/admin/evento/atualizar.php');
            }else{
                $this->evento->atualizarEvento($id, $nome, $ano, $semestre);
            }
        }

        public function adicionar( $nome, $ano, $semestre){
            if(!isset($nome) || !isset($ano) || !isset($semestre)){
                header('location: ./../view/admin/evento/adicionar.php');
            }else{
                $this->evento->adicionarEvento($nome, $ano, $semestre);
            }
        }*/

        public function excluir($id){
            if(!isset($id)){
                header('location: ./../view/admin/evento/excluir.php');
            }else{
                $this->evento->excluirEvento($id);
            }
        }
    }

    $ctrlEvento = new ControllerEvento();
    $ctrlEvento->excluir($id);

?>