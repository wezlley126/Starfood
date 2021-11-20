<?php
//starta a sessão
session_start();
//inclue o arquivo de conexão com a database
include '../sistema_contas/connect.php';
//redireciona para a página de user quando os dados tiverem sido modificados
  if (!isset($_POST['alteração_dados_concluido'])) {
    header('locarion: users.php');
  }
  //verifica se a senha está correta, caso contrário os dados não são alterados e é exibida uma tela de erro ná página de user
  @$senha = md5($_POST['senha']);
  if ($senha != $_SESSION['user'][4]) {
      $_SESSION['senha_incorreta'] = true;
      header('location: users.php');
  }else{
    //sistema que verifica se a imagem de perfil é realmente uma foto
    print_r($_FILES['foto-perfil']);
    $foto_perfil = $_FILES['foto-perfil'];
    $extensões = array("jpg", "jpeg", "png", "gif");
    //realiza a limpeza do nome da foto e da extensão contra sqlinjection
    $extensão = mysqli_real_escape_string($conect, pathinfo($foto_perfil['name'], PATHINFO_EXTENSION));
    echo "<br/>$extensão<br/>";
    if (in_array($extensão, $extensões)) {
      $tmp_foto = $_FILES['foto-perfil']['tmp_name'];
      echo "<br/>$tmp_foto<br/>";
      $diretorio = "foto_perfil/";
      $nome_foto = $_SESSION['user'][0];
      echo "<br/>O nome da foto será $nome_foto<br/>";
      if (move_uploaded_file($tmp_foto, $diretorio.$nome_foto));

      //Faz a limpesa das variaveis para evitar sqlinjection
  $nome = mysqli_real_escape_string($conect, $_POST['nome']);
  $sobrenome = mysqli_real_escape_string($conect, $_POST['sobrenome']);
  $sexo = mysqli_real_escape_string($conect, $_POST['sexo']);
  $membro = mysqli_real_escape_string($conect, $_POST['membro']);
  $foto = mysqli_real_escape_string($conect, $diretorio.$nome_foto);

    //atualiza os dados da database
        $comando = "UPDATE contas SET nome = '$nome', sobrenome = '$sobrenome', sexo = '$sexo', membro = '$membro', foto_perfil = '$foto' WHERE id = ".$_SESSION['user'][0];
        $mysql_query = mysqli_query($conect, $comando);
        if ($mysql_query == true) {
         echo "<br/>Parabéns $nome, seus dados foram atualizados com sucesso";
         $comando_user = "SELECT * FROM contas WHERE id = ".$_SESSION['user'][0];
         $user_query = mysqli_query($conect, $comando_user);
         $user_rows = mysqli_fetch_row($user_query);
         $_SESSION['user'] = $user_rows;
         //criar uma flag para avisar ao usuário que os dados foram alterados com sucesso
         $_SESSION['conta_alterada'] = true;
       }else{echo "Algum erro ocorreu durante a alteração dos dados, tente novamente ou aguarde alguns dias.";}
       }
       //redireciona para página de user
    header('location: users.php');
  }
  if (!in_array($extensão, $extensões)) {
    $_SESSION['formato inválido'] = 0;
  }
?>
