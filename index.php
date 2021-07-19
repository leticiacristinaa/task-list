<?php

	$acao = 'recuperarTarefaPendente';
	require 'tarefa-controller.php'

?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Task List</title>

		<!-- Icon svg -->
		<link rel="icon" type="svg" href="img/tasks-solid.svg">

		<!-- Boostrap -->

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

		<!-- Fontawesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<!-- Css -->
		<link rel="stylesheet" href="css/style.css">

		<script>
			function editar(id, txt_tarefa){
				//criar um form de edição
				let form = document.createElement('form');
				form.action = 'index.php?pag=index&acao=atualizar'
				form.method = 'post'
				form.className = 'row'

				//criar um input para entrada do texto
				let inputTarefa = document.createElement('input')
				inputTarefa.type = 'text'
				inputTarefa.name = 'tarefa'
				inputTarefa.className = 'col-9 from-control'
				inputTarefa.value = txt_tarefa

				//criar um input hidden para guardar o id da terefa
				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				//criar um button para envio do form
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-3 btn btn-custom'
				button.innerHTML = 'Atualizar'

				//incluir inputTarefa no form
				form.appendChild(inputTarefa)

				//incluir inputId no form
				form.appendChild(inputId)

				//incluir button no form
				form.appendChild(button)

				//console.log(form)

				//selecionar a div clicada tarefa
				let tarefa = document.getElementById('tarefa_'+id)

				//limpar o texto da tefa para inclusao do form
				tarefa.innerHTML = ''

				//incluir form na pagina
				tarefa.appendChild(form)
			}

			function remover(id){
				location.href='index.php?pag=index&acao=remover&id='+id;
			}

			function marcarRealizada(id){
				location.href='index.php?pag=index&acao=marcarRealizada&id='+id;
			}
		</script>
	</head>

	<body>
		<nav class="navbar">
			<div class="container">
				<a class="navbar-brand mt-3" href="#">
					<img src="img/logo.png" alt=""> 
					Task List
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Tarefas pendentes</h4>
								<hr>

								<? foreach($tarefas as $indice => $tarefa){ ?>
									<div class="row mb-3 d-flex align-items-center tarefa">
										<!-- Acessa atributo tarefa de todos os obj tarefa -->
										<div class="col-sm-9" id="tarefa_<?= $tarefa->id?>">
											<p><i class="fas fa-circle"></i><?= $tarefa->tarefa ?></p>
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id?>)"></i>

											<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id?>, '<?= $tarefa->tarefa ?>')"></i>

											<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $tarefa->id?>)"></i>
										</div>
									</div>
								<?}?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>