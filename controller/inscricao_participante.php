<?php
require dirname(__FILE__).'./../model/publico.php';

$atividade_id = $_POST['id'];

$nome_aluno = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$cpf = str_replace(".","",$cpf);
$cpf = str_replace("-","",$cpf);
$cpf = str_replace(",","",$cpf);
$comunidade = $_POST['comunidade'];
$nascimento = $_POST['data'];

    class ControllerInscricao{
        private $inscricao;
        public function __construct(){
            $this->inscricao = new Publico();
        }

        public function inscricao($atividade_id, $nome_aluno, $email, $cpf, $comunidade, $nascimento){
            $vrfcr = $this->inscricao->verificarExistencia($atividade_id, $nome_aluno, $email, $cpf);
            
            if($vrfcr == 1){
                header("location: ../view/admin/inscricao/adicionar.php?id=$atividade_id&erro=1");
            }else{
                $this->inscricao->registrarInscricao($atividade_id, $nome_aluno, $email, $cpf, $comunidade, $nascimento);
                header("location: ../view/admin/inscricao/relatorio.php?id=$atividade_id");
            }
            
        }

    }

    function validaCPF($cpf = null) {

    // Verifica se um número foi informado
    if(empty($cpf) || !isset($cpf)) {
        return false;
    }

    // Elimina possivel mascara
    $cpf = preg_replace("/[^0-9]/", "", $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
    
    // Verifica se o numero de digitos informados é igual a 11 
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se nenhuma das sequências invalidas abaixo 
    // foi digitada. Caso afirmativo, retorna falso
    else if ($cpf == '00000000000' || 
        $cpf == '11111111111' || 
        $cpf == '22222222222' || 
        $cpf == '33333333333' || 
        $cpf == '44444444444' || 
        $cpf == '55555555555' || 
        $cpf == '66666666666' || 
        $cpf == '77777777777' || 
        $cpf == '88888888888' || 
        $cpf == '99999999999') {
        return false;
     // Calcula os digitos verificadores para verificar se o
     // CPF é válido
     } else {   
        
        for ($t = 9; $t < 11; $t++) {
            
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                return false;
            }
        }

        return true;
        }
    }

    function validaEmail($email) {
        if ((var_dump(filter_var($email, FILTER_VALIDATE_EMAIL))) == 'bool(false)') 
            return false;
        else
            return true;
    }

$valida_cpf = validaCPF($cpf);
$valida_email = validaEmail($email);


if(($valida_cpf == false) || ($valida_email == false) || empty($nome_aluno) || !isset($nome_aluno)) {
    header("location: ../view/admin/inscricao/adicionar.php?id=$atividade_id&erro=2");
}else{
    $c = new ControllerInscricao();
    $c->inscricao($atividade_id, $nome_aluno, $email, $cpf, $comunidade, $nascimento);
    
     }
?>