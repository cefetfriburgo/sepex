<?php
    //header("Content-Type: application/json");
    require_once './../model/publico.php';
  

    $cpf = $_POST['cpf'];
    $nome_atividade = $_POST['atividade'];
    //echo  "<script>alert($g);<script>";

    // class CancelarInscricaoAtividade{
    //     private $cancel;

    //     public function __construct(){
    //         $this->cancel = new Publico();
    //     }

    //     public function cancelarInscricaoAtividade($cpf, $nome_atividade){            
    //         return $this->cancel->inscricaoAtividade($cpf, $nome_atividade);
            
    //     }

    // }

    // $c = new CancelarInscricaoAtividade();
    // echo $c->cancelarInscricaoAtividade($cpf, $nome_atividade);

    echo $cpf .'----------'. $nome_atividade;

?>