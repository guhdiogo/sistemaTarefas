<?php

class Login
{
    public function logar(){
        echo !empty($_POST) ? 1 : 0;
    }
}