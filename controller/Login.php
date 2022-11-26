<?php
    include("../db/conexao.php"); //conexão com banco
    if(in_array('logar',explode('/', $_SERVER["REQUEST_URI"]))) logar(); //funcao de logar

    /*
     * lista usuarios e confere se o login e senha esta correto
     */
    function logar(){
        $login = $_POST;
        $usuarios = mysqli_fetch_all(mysqli_query(conectar(), "select login,senha from usuarios"));

        foreach ($usuarios AS $user){
            if(
                $user[0] == $login['login'] &&
                $user[1] == $login['senha']
            ){
                echo 1;
                exit();
            }
        }
        echo 0;
    }