<?php
//conexão com o bannco
include("../db/conexao.php");

//Funcões
if(in_array('listarUsuarios',explode('/', $_SERVER["REQUEST_URI"]))) listarUsuarios();
if(in_array('salvarUsuario',explode('/', $_SERVER["REQUEST_URI"]))) salvarUsuario();
if(in_array('excluirUsuario',explode('/', $_SERVER["REQUEST_URI"]))) excluirUsuario();

//Lista todos os usuários
function listarUsuarios(){
    $usuarios = mysqli_fetch_all(mysqli_query(conectar(), "select idUsuarios,nome,login,senha from usuarios"));
    $arrayUser = [];
    foreach ($usuarios AS $user){
        $arrayUser[] = array(
            'id'    => $user[0],
            'nome'  => $user[1],
            'login' => $user[2],
            'senha' => $user[3]
        );
    }
    echo json_encode($arrayUser);
}

//Salva/edita usuário
function salvarUsuario(){
    $usuario = $_POST;
    $usuario['login']  = addslashes($usuario['login']);
    $usuario['senha']  = addslashes($usuario['senha']);
    $usuario['nome']   = addslashes($usuario['nome']);

    if(!empty($usuario['idUsuario'])){
        mysqli_query(conectar(), "UPDATE usuarios SET login = '{$usuario['login']}', senha = '{$usuario['senha']}', nome = '{$usuario['nome']}' WHERE idUsuarios = {$usuario['idUsuario']}");
        echo $usuario['idUsuario'];
    } else {
        mysqli_query(conectar(), "INSERT INTO usuarios (login, senha, nome) VALUES ('{$usuario['login']}', '{$usuario['senha']}', '{$usuario['nome']}')");
        echo mysqli_fetch_array(mysqli_query(conectar(), "SELECT idUsuarios from usuarios order by idUsuarios desc limit 1"))[0];
    }
}

//Exclui usuário
function excluirUsuario(){
    $idUsuario = $_POST['idUsuario'];
    echo mysqli_query(conectar(), "DELETE FROM usuarios WHERE idUsuarios = {$idUsuario}");
}