<?php 
$titulo = "Listar atividade";
$categoria = "Atividades";
$local = "Listar atividades";
require_once ("../base/header.php");
require_once("../../../controller/listar_atividade.php"); ?>

<div class="row">
  
</div>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i> Atividades encontradas
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Evento</th>
            <th>Data</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Evento</th>
            <th>Data</th>
            <th>Ações</th>
          </tr>
        </tfoot>
        <tbody>
        	<?php foreach($lista as $l){ ?>
        	<tr>
          		<td><?php echo $l['idAtividade']; ?></td>
          		<td><?php echo $l['nome_atividade']; ?></td>
          		<td><?php echo $l['tipoAtividade']; ?></td>
            	<td><?php echo $l['nome']; ?></td>
            	<td><?php echo $l['data']; ?></td>
            	<td>
            		<div class="btn-group" role="group">
            			<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> Escolher
            			</button>
            			<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            				<a class="dropdown-item" href="editar/id">Editar</a>
            				<a class="dropdown-item" href="#">Excluir</a>
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

<?php include_once("../base/footer.php"); ?>