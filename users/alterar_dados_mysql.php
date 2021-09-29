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
  $sexo = mysqli_real_escape_string($conect, $_POST['sexo']);
  $membro = mysqli_real_escape_string($conect, $_POST['membro']);

        $comando = "UPDATE contas SET nome = '$nome', sobrenome = '$sobrenome', sexo = '$sexo', membro = '$membro' WHERE id = ".$_SESSION['user'][0];
        $mysql_query = mysqli_query($conect, $comando);
        if ($mysql_query == true) {
         echo "Parabéns $nome, seus dados foram atualizados com sucesso";
         $comando_user = "SELECT * FROM contas WHERE id = ".$_SESSION['user'][0];
         $user_query = mysqli_query($conect, $comando_user);
         $user_rows = mysqli_fetch_row($user_query);
         $_SESSION['user'] = $user_rows;
         $_SESSION['conta_alterada'] = true;
       }else{echo "Algum erro ocorreu durante a alteração dos dados, tente novamente ou aguarde alguns dias.";}
       }
    header('location: users.php');
?>
