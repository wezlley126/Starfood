<?php
    session_start();
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Cadastro.css">
    <link rel="icon" href="icone.png">
    <title>Cadastrar</title>
</head>

<body>

    <div class="create-page">
<?php
    //starta a sessão salvando o email e senha do usuário para ele não ter que fazer login toda vez que entrar no site, somente após encerrar a sessão;

    //declaração das sessões igual uma variavel como String email por exemplo;
    @$_SESSION['email'];
    @$_SESSION['senha'];

    //condição que avisa caso já exista um email igual ao que foi usado no formulario de cadastro;
    $_SESSION['conta_existente'];
    if ($_SESSION['conta_existente'] == 1) {
        ?>
        <center style="color: red;">O email já está em uso</center>
        <?php
        $_SESSION['conta_existente'] = 0;
    }else{
      echo "<br/><center>Seja bem-vindo<br/>"."</center>";
    }
?>
        <h1>Cadastre-se</h1>
        <form action="resgistro.php" method="GET">
            <label for="name"><b>Nome</b></label>
            <input type="text" name="nome" id="" placeholder="Digite seu nome..." required>

            <label for="name"><b>Sobrenome</b></label>
            <input type="text" name="sobrenome" id="" placeholder="Digite seu sobrenome..." required>

            <label for="email"><b>E-mail</b></label>
            <input type="email" name="email" id="" placeholder="Digite seu e-mail..." required>

            <label for="password"><b>Senha</b></label>
            <input type="password" name="senha" id="" placeholder="Digite sua senha..." required>

            <div>
                <label for="Gênero" id="gener"><b>Gênero</b></label>
                <br>
                <select class="select" name="sexo">
                    <option value="Masculino" class="option">Masculino</option>
                    <option value="Feminino" class="option">Feminino</option>
                    <option value="Outro" class="option">Outro</option>
                </select>
            </div>

            <label for="membro" id="Memb"><b>Membro</b></label>
            <select class="member" name="membro">
                <option value="comum" class="option2">Comum</option>
                <option value="premium" class="option2">Premium</option>
            </select>

            <p>Você deseja:</p>
            <div class="icons">
                <div>
                    <a href="logino.php"><i></i><span>Login</span></a>
                </div>
                <div id="btn">
                    <input id="btnMargin" type="submit" name="enviar" value="Cadastrar" style="margin: 0px;">
                </div>
            </div>
            <div class="icons">
        </form>
    </div>
</body>

</html>
