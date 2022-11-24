<?php

class Login
{
    public function logar(){
        echo !empty($_POST) ? true : false;
    }
}