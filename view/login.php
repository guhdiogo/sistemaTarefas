<!DOCTYPE html>
<html lang="en" ng-app="login">
<head>
    <title>Login - Sistema de Tarefas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!--===============================================================================================-->

    <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
    <script src="../js/angular.js"></script>
    <script>
        angular.module("login", []);
        angular.module("login").controller('loginController', function ($scope){
            $scope.logar = function (){
                $.ajax({
                    method: "POST",
                    url: "../controller/Login.php/logar",
                    data: {login: $scope.usuarioInput, senha: $scope.senhaInput},
                    success: function(data) {
                        alert(data);
                    }
                })
            }
        });
    </script>
</head>
<body ng-controller="loginController">
    <div class="limiter">
        <div class="container-login100" style="background-image: url('../images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form">
                        <span class="login100-form-title p-b-49">
                            Login
                        </span>
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Usuário é orbigatório!">
                        <span class="label-input100">Usuario</span>
                        <input class="input100" ng-model="usuarioInput" type="text" name="username" placeholder="Digite seu usuário">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Senha é obrigatório!">
                        <span class="label-input100">Senha</span>
                        <input class="input100" ng-model="senhaInput" type="password" name="pass" placeholder="Digite sua senha">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    <br>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" ng-click="logar()">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script href="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script href="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script href="../vendor/bootstrap/js/popper.js"></script>
<script href="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script href="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script href="../vendor/daterangepicker/moment.min.js"></script>
<script href="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script href="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="../js/main.js"></script>

</body>
</html>