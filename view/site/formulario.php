<?php 
$titulo = "Inscrição";

require_once("./base/header.php");
//require_once("../../controller/listar_atividade.php");
require_once "../../controller_site/controller_detalhes_atividade.php";

$id = $_GET['id'];

$lista = $c->detalhesAtividade($id);

foreach($lista as $l){
    $data = explode("/",$l['data']); 
        $a = $data[2];
        $m = $data[1];
        $d = $data[0];

        switch (date("$m")) {
            case "01":    $mes = "Janeiro";     break;
            case "02":    $mes = "Fevereiro";   break;
            case "03":    $mes = "Março";       break;
            case "04":    $mes = "Abril";       break;
            case "05":    $mes = "Maio";        break;
            case "06":    $mes = "Junho";       break;
            case "07":    $mes = "Julho";       break;
            case "08":    $mes = "Agosto";      break;
            case "09":    $mes = "Setembro";    break;
            case "10":    $mes = "Outubro";     break;
            case "11":    $mes = "Novembro";    break;
            case "12":    $mes = "Dezembro";    break; 
        }

        $hora_inicio = explode(":", $l['inicio']);
            $hora = $hora_inicio[0];
            $min = $hora_inicio[1];

        $hora_fim = explode(":", $l['termino']);
            $hora2 = $hora_fim[0];
            $min2 = $hora_fim[1];
?>
<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>

<section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="../../public/images/capa.jpg">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <h3>
                        Inscrições
                    </h3>
                </div>
            </div>
        </div>

        <div class="breadcrumbs">
            <ul>
                <li><a href="/#inicio">Início</a>  |  </li>
                <li><a href="#">Inscrição</a></li>
            </ul>
        </div>
    </div>
</section>

<section class="pt100 pb100">
    <div class="container">
        <div class="section_title">
            <h3 class="title">
                 <?php echo $l['nome']; ?> 
            </h3>
        </div>

        <div class="row justify-content-center mt50">
            <div class="col-12 col-md-6">
                <p>
                    Você está na página de formulário de inscrição para a atividade <strong>"<?php echo $l['nome']; ?>"</strong> que ocorrerá em<?php echo " $d de $mes de $hora:$min às $hora2:$min2." ?>
                </p>
                <p>
                    Preencha ao lado suas informações pessoais para inscrever-se no evento. Antes de submeter o formulário, confira se todos os campos foram preenchidos corretamente. Estas informações serão utilizadas para emissão do certificado. Sua inscrição, apenas, não garante a emissão do formulário.
                </p>
                <p><strong>Observação</strong>: se a sua atividade ocorrer em dois ou mais dias, basta inscrever-se apenas uma única vez.</p>
            </div>
            <?php
                if(isset($_GET['erro'])){
                  if($_GET['erro']=='erro'){
                      echo "<script> alert('CPF ou email incorreto!'); </script>";
                  }
                } 
            ?>
            <div class="col-12 col-md-6">
                <form action="../../controller_site/controller_inscricao.php" method="POST" class="contact_form">
                    <input type="hidden" value="<?php echo $id; ?>" name="id" id="id">
                    <label for="nome">Nome</label>
                    <div class="form-group">
                        <input id="nome" name="nome" type="text" class="form-control" placeholder="Nome completo">
                    </div>
                    <label for="email">Endereço de e-mail</label>
                    <div class="form-group">
                        <input id="email" name="email" type="email" class="form-control" placeholder="Endereço de e-mail">
                    </div>
                    <label for="cpf">CPF</label>
                    <div class="form-group">
                        <input id="cpf" name="cpf" type="text" maxlength='14' class="form-control" OnKeyPress="formatar('###.###.###-##', this)" placeholder="Cadastro de Pessoa Física">
                    </div>
                    <label for="comunidade">Em relação ao CEFET, eu faço parte da comunidade:</label>
                    <div class="form-group">
                        <div class="radio">
                            <label><input type="radio" name="comunidade" value="1" checked> Interna</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="comunidade" value="2"> Externa</label>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-rounded btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php } require_once("./base/footer.php"); ?>