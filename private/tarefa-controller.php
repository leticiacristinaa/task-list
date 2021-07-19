<?php

    require "private/tarefa-model.php";
    require "private/tarefa-service.php";
    require "private/conexao.php";

    //Se caso houver algum valor no inidice "acao" da superglobal get, a variavel "acao" recebe esse valor senão recebe o valor de uma outra variavel "acao"
    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir'){

        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->inserir();

        header('Location: nova_tarefa.php?inclusao=1');
    }
    
    else if($acao == 'recuperar'){
        
        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();
    }

    else if($acao == 'atualizar'){
        
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_POST['id']);
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);

        if($tarefaService->atualizar()) {
			
			if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
				header('location: index.php');	
			} else {
				header('location: todas_tarefas.php');
			}
		}

    }

    else if($acao == 'remover'){

        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();

        if( isset($_GET['pag']) && $_GET['pag'] == 'index'){
            header('Location: index.php');
        }
        else{
            header('Location: todas_tarefas.php');
        }
    }

    else if($acao == 'marcarRealizada'){
        
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);
        $tarefa->__set('id_status', 2);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->marcarRealizada();

        if( isset($_GET['pag']) && $_GET['pag'] == 'index'){
            header('Location: index.php');
        }
        else{
            header('Location: todas_tarefas.php');
        }

    }

    else if($acao == 'recuperarTarefaPendente'){

        $tarefa = new Tarefa();
        $tarefa->__set('id_status', 1);
        
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperarTarefaPendente();
    }
    



?>