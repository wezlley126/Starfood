<?php
session_start();
include '../sistema_contas/connect.php';
  if (!isset($_POST['alteração_dados_concluido'])) {
    header('locarion: users.php');
  }
  $senha = md5($_POST['senha']);
  if ($senha != $_SESSION['user'][4]) {
      $_SESSION['senha_incorreta'] = true;
      header('location: users.php');
  }else{
  
  $nome = mysqli_real_escape_string($conect, $_POST['nome']);
  $sobrenome = mysqli_real_escape_string($conect, $_POST['sobrenome']);
  $email = mysqli_real_escape_string($conect, $_POST['email']);
  $sexo = mysqli_real_escape_string($conect, $_POST['sexo']);
  $membro = mysqli_real_escape_string($conect, $_POST['membro']);

  $comando_email = "SELECT email FROM contas WHERE email = '$email'";
  $email_query = mysqli_query($conect, $comando_email);
  $email_rows = mysqli_num_rows($email_query);
  if ($email_rows == 1) {
    echo "Este email $email já está em uso, tente novamente com um outro email!";
    $_SESSION['email_existe'] = true;
  }else{
        $comando = "UPDATE contas SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', sexo = '$sexo', membro = '$membro' WHERE id = ".$_SESSION['user'][0];
        $mysql_query = mysqli_query($conect, $comando);
        if ($mysql_query == true) {
         echo "Parabéns $nome, seus dados foram atualizados com sucesso";
         $comando_user = "SELECT * FROM contas WHERE email = '$email'";
        $user_query = mysqli_query($conect, $comando_user);
         $user_rows = mysqli_fetch_row($user_query);
         $_SESSION['user'] = $user_rows;
         $_SESSION['conta_alterada'] = true;
       }else{echo "Algum erro ocorreu durante a alteração dos dados, tente novamente ou aguarde alguns dias.";}
       }
      }
    header('location: users.php');
?>
