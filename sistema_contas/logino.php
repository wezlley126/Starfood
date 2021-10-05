<?php
    session_start();
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Seja Bem-vindo</title>
</head>
<body>
    <div class="login-page">
        <h1>Seja Bem-vindo!</h1>
        <?php

            //conecta ao banco de dados mysql;
            include 'connect.php';

            //starta a sessão salvando o email e senha do usuário para ele não ter que fazer login toda vez que entrar no site, somente após encerrar a sessão;

            //comando que verifica se o email e a senha estão vázios;
            if (!isset($_SESSION['user'])) {
        echo "Realize login para continuar.<br/>"."</center>";
            }
            if ($_SESSION['conta_existente'] == true) {
              ?>
              <center style="color: red;">Email ou senha incorreto</center>
              <?php
              $_SESSION['conta_existente'] = false;
            }else{
              $_SESSION['conta_existente'] = false;
            }
            if ($_SESSION['conta_criada'] == true) {
                ?>
                    <center style="color: blue;">Conta criada com sucesso</center>
                <?php
                $_SESSION['conta_criada'] = false;
            }
        ?>
        <form action="login.php" method="GET">
            <input type="email" name="email" id="" placeholder="Digite seu Email..." required="true">
            <input type="password" name="senha" id="" placeholder="Digite sua senha..." required="true">
            <p>Você deseja:</p>
            <div class="icons">
                <div>
                    <a href="Cadastro.php" id="botão_registro"><i class="Cancel"></i><span>Registrar-se</span></a>
                </div>
                <div>
                    <button id="enviar">Login</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    @$_SESSION['email'];
    @$_SESSION['senha'];
?>
