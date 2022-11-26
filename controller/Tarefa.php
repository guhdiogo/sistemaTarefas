<?php
//conexão com banco
include("../db/conexao.php");

//funcoes
if(in_array('listarTarefas',explode('/', $_SERVER["REQUEST_URI"]))) listarTarefas();
if(in_array('salvarTarefa',explode('/', $_SERVER["REQUEST_URI"]))) salvarTarefa();
if(in_array('excluirTarefa',explode('/', $_SERVER["REQUEST_URI"]))) excluirTarefa();

//Lista todas as tarefas
function listarTarefas(){
    $tarefas = mysqli_fetch_all(mysqli_query(conectar(), "select idTarefas,nome,descricao from tarefas"));
    $arrayTarefas = [];
    foreach ($tarefas AS $task){
        $arrayTarefas[] = array(
            'id'        => $task[0],
            'nome'      => $task[1],
            'descricao' => $task[2]
        );
    }
    echo json_encode($arrayTarefas);
}

//Salva e altera as tarefas
function salvarTarefa(){
    $tarefa = $_POST;
    if(!empty($tarefa['idTarefas'])){
        mysqli_query(conectar(), "UPDATE tarefas SET nome = '{$tarefa['nome']}', descricao = '{$tarefa['descricao']}' WHERE idTarefas = {$tarefa['idTarefas']}");
        echo $tarefa['idTarefas'];
    } else {
        mysqli_query(conectar(), "INSERT INTO tarefas (nome, descricao) VALUES ('{$tarefa['nome']}', '{$tarefa['descricao']}')");
        echo mysqli_fetch_array(mysqli_query(conectar(), "SELECT idTarefas from tarefas order by idTarefas desc limit 1"))[0];
    }
}

//Exclui as tarefas
function excluirTarefa(){
    $idTarefas = $_POST['idTarefas'];
    echo mysqli_query(conectar(), "DELETE FROM tarefas WHERE idTarefas = {$idTarefas}");
}