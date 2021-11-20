<?php
    //starta a sessão salvando o email e senha do usuário para ele não ter que fazer login toda vez que entrar no site, somente após encerrar a sessão;
    session_start();
    //comando que inclue o arquivo connect.php e estabelece conexão com a página
	  include 'connect.php';

    $email = mysqli_escape_string($conect, $_GET['email']);
    $senha = mysqli_escape_string($conect, $_GET['senha']);

    //variavél que armazena o comando sql;
    $senhamd5 = md5($senha);
    $comando = ("SELECT * FROM contas WHERE email = '$email' AND senha = '$senhamd5'");

    //variavel que executa o comando guardado na variavel anterior, parametros usados: variavel da conexão que se encontra em connect.php e a variavel com o comando sql;
    $query = mysqli_query($conect, $comando);

    //comando que verifica quantas contas existem com o email e a senha digitados;
    $rows = mysqli_num_rows($query);

    //se existir 1 linha com o email e senha digitados ele starta a sessão e redireciona para a página principal se ele não encontrar nada acontece;
    if ($rows==1) {
        header('location: ../index.php');
    //armazena os dados do user em um array
        $_SESSION['user'] = mysqli_fetch_row($query);
        //$_SESSION['user'] = $array;
    }else{
				$_SESSION['conta_existente'] = true;
        header("location: logino.php");
    }
    echo "<center>$rows</center>";
    //fecha a conexão;
    mysqli_close($conect);
?>
