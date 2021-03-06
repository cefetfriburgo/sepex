<?php 
$titulo = "Acompanhar de Inscrições";
$categoria = "Inscrições";
$local = "Acompanhar Inscrições";
include_once("../base/header.php");
require_once '../../../controller/gerenciar_inscricao.php'; ?>

<div class="row">
	<div class="col-md-8">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-plus"></i> Visão Geral
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Atividade</th>
							<th scope="col">Total de Inscritos</th>
							<th scope="col">Gerenciar</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($lista as $l){ ?> 
						<tr>
							<td><?= $l['nome_atividade']; ?></td>
							<td><?= $l['total']; ?></td>
							<td><a href="./relatorio.php?id=<?= $l['atividade_id']; ?>">Acessar</a></td>
						</tr>
						<?php } ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-info"></i> Guia de ajuda
			</div>
			<div class="card-body">
				<p>Exibindo apenas as atividades do evento atualmente selecionado como publicado.</p>
			</div>
		</div>
	</div>
</div>

<?php include_once("../base/footer.php"); ?>