<?php 
$id = $_GET['id'];

if(!isset($id) || $id==null){
	header('location: ./listar.php');
}
$titulo = "Editar atividade";
$categoria = "Atividades";
$local = "Editar atividade";

require_once("../base/header.php"); 
require_once("./../../../controller/editar_atividade.php");
require_once("../../../model/atividade.php"); 


$lista = $ctrlAtividade->nome($id);
$capacidade = $lista['capacidade'];
$evento_id = $lista['evento_id'];
$ida = $lista['tipo_atividade_id'];

?>
<script >

    $d = document;
    id = 1;
  

	function cadastrado(){
		let conteudo = $d.getElementById('conteudo');
        bloco = $d.getElementById('bloco');
		e = $d.getElementById('colaborador');
		nome = e.selectedOptions[0].text;
		val = e.selectedOptions[0].value;

		if(nome == 'Colaboradores já cadastrados'){}
		else{
			input = $d.createElement('input');
			input2 = $d.createElement('input');
			input3 = $d.createElement('input');

			select = $d.createElement('select');

			input.type = 'text';
			input.name = 'colaborador' + id;
			input.id = 'colaborador' + id;
			input.classList.add('form-control');
			input.disabled = 'disabled';
			input.value = nome;

			input2.type = 'hidden';
			input2.name = 'hide2';
			input2.id = 'hide2';
			input2.value = id;

			input3.type = 'hidden';
			input3.name = 'oculto'+id;
			input3.id = 'oculto'+id;
			input3.value = val;

			select.id="papel" + id;
			select.name ="papel" + id;		
			select.classList.add('form-control');

			select.innerHTML = "<option selected value='xxx'>Função para esta atividade</option><?php $a = new Atividade(); $listap = $a->listarPapel(); foreach($listap as $l){ ?><option value = <?php echo $l['papel_id']; ?> ><?php echo $l['papel']; ?></option><?php } ?>";							
			

			bloco.append('Nome do colaborador');
			bloco.append(input);
			bloco.append(input2);
			bloco.append(input3);
			bloco.append(select);
			id++;  
		}      
    }

</script>

<div class="row">
	<div class="col-md-8">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-plus"></i> Editar atividade
			</div>
			<div class="card-body">
				<form action="./../../../controller/atualizar_atividade.php" method="POST">
				<input type="hidden" value='<?php echo $id; ?>' id='id' name='id'>
					<div class="form-group">
						<label for="titulo">Título</label>
						<input type="text" class="form-control" value="<?= htmlspecialchars($lista['nome_atividade']); ?>" id="nome_atividade" name="nome_atividade" placeholder="Título da atividade" required>
					</div>
					<div class="form-group">
						<label for="descricao">Descrição</label>
						<textarea class="form-control"  id="descricao" name="descricao" rows="3"><?= htmlspecialchars($lista['descricao']); ?></textarea>
					</div>
					<div class="form-group form-row">
						<div class="col">
							<label for="data">Data</label>
							<input type="date" class="form-control" value="<?= $lista['data']; ?>" id="data" name="data">
						</div>
						<div class="col">
							<label for="hora_inicio">Hora de início</label>
							<input type="time" class="form-control" value="<?= $lista['hora_inicio']; ?>" id="hora_inicio" name="hora_inicio">
						</div>
						<div class="col">
							<label for="hora_fim">Hora de término</label>
							<input type="time" class="form-control" value="<?= $lista['hora_fim']; ?>" id="hora_fim" name="hora_fim">
						</div>
					</div>
					<div class="form-group form-row">
						<div class="col">
							<label for="local">Local</label>
							<input type="text" class="form-control" value="<?= $lista['local']; ?>" id="local" name="local" placeholder="Local da atividade" required>
						</div>
						<div class="col-md-2">
							<label for="capacidade">Capacidade</label>
							<input type="number" min="0" max="200" class="form-control" id="capacidade" name="capacidade" value='<?= $capacidade;?>'>
						</div>
					</div>
					<div class="form-group">
						<label for="evento">Evento</label>
						<select class="form-control" id="evento" name="evento" required>
							<option disabled>Evento para esta atividade</option>
							<?php 
								$c = new Atividade();
								$lista = $c->listarEvento();
								foreach($lista as $l){
									if($evento_id == $l['evento_id']){ ?>		
								<option value = "<?= $l['evento_id']; ?>" selected><?= $l['nome_evento']; ?></option>
							<?php } else{ ?>
								<option value = "<?= $l['evento_id']; ?>" ><?= $l['nome_evento']; ?></option>
							<?php } }?>
							
						</select>
					</div>
					<div class="form-group">
						<label for="tipo">Tipo de Atividade</label>
						<select class="form-control" id="tipo" name="tipo">
							<option disabled selected>Tipo para esta atividade</option>
							<?php 
								$c = new Atividade();
								$lista = $c->listarTipoAtividade();
								foreach($lista as $l){
									if($ida == $l['tipo_atividade_id']){
							 ?>
							<option value = "<?= $l['tipo_atividade_id'];?>" selected><?= $l['nome_tipo_atividade']; ?></option>
									<?php }else{ ?>				
							<option value = "<?= $l['tipo_atividade_id'];?>" ><?= $l['nome_tipo_atividade']; ?></option>
							
							<?php } } ?>
						</select>
					</div>
					<div class="form-group">	
						<?php 
							$c = new Atividade();
							$lista = $c->listarColaboradorAtividade($id);
							$lista2 = $c->listarColaborador();
							$nomes = [];
						?>
						<label for="colab">Colaboradores</label><br>
						
						<?php $i = 0; 
							foreach($lista as $l){
								if($id == $l['id_ativ']){
								array_push($nomes, $l['colaborador']);
						?>
							<input class='form-control' type="text" name="colab<?php echo $i; ?>" value="<?php echo $l['colaborador'];?>" disabled>
							<select class='form-control'>
								
								<?php $c3 = new Atividade(); $lista3 = $c3->listarPapel(); foreach($lista3 as $l3){ ?>
									<?php if($l3['papel'] == $l['papel']){ ?>
									<option selected value = <?php echo $l3['papel_id']; ?> ><?php echo $l3['papel']; ?></option>
								<?php }else{ ?>
									<option value = <?php echo $l3['papel_id']; ?> ><?php echo $l3['papel']; ?></option>
								<?php }} ?>
							</select><br>
						<?php $i++;} }  ?>
						 <input type="hidden" value="<?php echo $i; ?>" name="oculto">
						 <div class="form-group">
						<div id="conteudo"></div>
						<div id='bloco' class='form-group'>
						</div>
						<label for="colaborador">Colaboradores</label>
                        <select class="form-control" id="colaborador" >
							<option disabled selected>Colaboradores já cadastrados</option>
							<?php 
								$c = new Atividade();
								$lista = $c->listarColaborador();
								foreach($lista as $l){
							?>
							<option id='cadastrado' name=<?php echo $l['nome_colaborador']; ?> value = <?php echo $l['colaborador_id']; ?> ><?php echo $l['nome_colaborador']; ?></option>
							<?php } ?>							
						</select>
						<input class="btn btn-primary btn-block" type="button" value='Incluir' onclick='cadastrado()'>
					</div>
						
						<!-- <label for="papel">Papel</label>
						<select class="form-control" id="papel" name="papel">
						<?php
							foreach($lista as $l){
								if($id == $l['id_ativ']){
						?>
							<option disabled selected>Papel do colaborador</option>
							<option value = "<?= $l['id_papel'];?>" selected><?= $l['papel']; ?></option>
						<?php }else{ ?>				
							<option value = "<?= $l['id_papel'];?>" ><?= $l['papel']; ?></option>
						<?php } } ?>
						</select> -->
					</div>
					<div class="form-group">
						<?php 
							$c = new Atividade();
							$lista = $c->listarEtiqueta($id);
							$array = [];
							foreach ($lista as $etiq){
								$array[] = $etiq['etiqueta'];					
							}
							$palavras_chave = implode(", ", $array);
						?>
						<label for="etiqueta">Palavras-chave</label>
						<input type="text" class="form-control" value="<?= $palavras_chave;?>" id="etiqueta" name="etiqueta" placeholder="Palavras-chave da atividade">
					</div>
					<button class="btn btn-primary btn-block" type="submit">Salvar</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-info"></i> Guia de ajuda
			</div>
			<div class="card-body">
				<p>Para preencher corretamente os campos, siga as instruções</p>
				<ul>
					<li><strong>Título</strong>: escreva o nome que você deseja dar para a atividade.</li>
					<li><strong>Descrição</strong>: escreva um texto para a atividade. Este campo é opcional.</li>
					<li><strong>Data e horas</strong>: selecione a data de início, incluindo o dia, mês e ano e as horas de início e término da atividade, incluindo os minutos.</li>
					<li><strong>Evento</strong>: selecione dentre a lista o evento no qual esta atividade associada. Se você ainda não registrou o evento, faça-o <a href=../evento/adicionar.php>aqui</a>.</li>
					<li><strong>Tipo</strong>: selecione dentre a lista de opções o tipo desta atividade.</li>
					<li><strong>Palavras-chave</strong>: escreva, separado por vírgulas, as palavras-chave que correspondem a esta atividade.</li>
				</ul>
				<p>Após conferir todos os campos, clique no botão <strong>Salvar</strong>.</p>
			</div>
		</div>
	</div>
</div>
<script src='./../../../public/js/atualizar_atividade.js'></script>

<?php include_once("../base/footer.php"); ?>