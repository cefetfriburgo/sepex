<?php 
$titulo = "Listar eventos";
$categoria = "Eventos";
$local = "Listar eventos";
require_once("../base/header.php");
if($_SESSION['acesso'] == 'Administrador'){ 
require_once("../../../controller/listar_evento.php");?>

<div class="row">
  
</div>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i> Eventos encontrados
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ano</th>
            <th>Semestre</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ano</th>
            <th>Semestre</th>
            <th>Ações</th>
          </tr>
        </tfoot>
        <tbody>
          <?php if(isset($lista) && !empty($lista)) foreach($lista as $l){ ?>
          <tr>
            <td><?php echo $l['evento_id']; ?></td>
            <td><?php echo $l['nome_evento']; ?></td>
            <td><?php echo $l['ano']; ?></td>
            <td><?php echo $l['semestre']; ?></td>
            <td>
              <div class='btn-group' role='group'>
                <button id='btnGroupDrop1' type='button' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fa fa-cogs'></i> Escolher 
                </button>
                <div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
                  <a class='dropdown-item' href='editar.php?id=<?php echo $l['evento_id']; ?>'>Editar</a>

                  <button class='dropdown-item' id="excluir" onclick="confirmar()">Excluir</button>

                  <script>
                    function confirmar(){
                      r=confirm("Deseja realmente excluir esse evento?");

                      if(r==true){
                        $.ajax({url: "./../../../controller/excluir_evento.php?id=<?php echo $l['evento_id']; ?>", success: function(result){
                          location.href = "./listar.php";
                        }});
                      }
                    }
                  </script>
                </div>
              </div>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php } else{
  header("Location: ./../principal/index.php");
}

include_once("../base/footer.php"); ?>