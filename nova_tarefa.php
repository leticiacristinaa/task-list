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
	</head>

	<body>
		<nav class="navbar mt-3">
			<div class="container">
			<a class="navbar-brand" href="#">
					<img src="img/logo.png" alt=""> 
					Task List
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item active"><a href="#">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Nova tarefa</h4>
								<hr />

								<form method="post" action="tarefa-controller.php?acao=inserir">
									<div class="form-group">
										<label>Descrição da tarefa:</label>
										<input name="tarefa" type="text" class="form-control" placeholder="Exemplo: Lavar o carro">
									</div>

									<button class="btn btn-custom">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>

					<? if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1){?>
			
					<div class="mt-3 pt-2 d-flex justify-content-center success-text">
						<h5>Tarefa inserida com sucesso!</h5>
					</div>

					<?}?>

				</div>
			</div>
		</div>
	</body>
</html>