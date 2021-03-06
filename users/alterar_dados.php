<?php
  session_start();
  if (!isset($_SESSION['user'])) {
      header("location: sistema_contas/logino.php");
  }else{
    if (!is_array($_SESSION['user']) || count($_SESSION['user']) != 8) {
      header("location: sistema_contas/logino.php");
    }
  }
  if (!isset($_POST['alterar_dados'])){
    header('location: users.php');
  }
  include '../sistema_contas/connect.php';
?>
<!DOCTYPE html>
<html lang="pr-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mudar dados da conta</title>
    <link rel="stylesheet" href="form_dados.css">
  </head>
  <!-- lucas=adm ban weslley por trafico de lolis-->
    <div id="form-user">
      <form class="form" action="alterar_dados_mysql.php" method="post" enctype="multipart/form-data">

          <h1 id="titulo">Alterar dados do usuário:</h1>

          <div style="color: white;">Foto de perfil:<div/><input type="file" name="foto-perfil" id="foto"><br/>
          <input class="dados" type="text" name="nome" value="<?php echo $_SESSION['user'][1] ?>" required><br/>
          <input class="dados" type="text" name="sobrenome" value="<?php echo $_SESSION['user'][2] ?>" required><br/>

          <select class="dados" name="sexo">
              <option value="Masculino" class="option">Masculino</option>
              <option value="Feminino" class="option">Feminino</option>
              <option value="Outro" class="option">Outro</option>
          </select>

          <select class="dados" name="membro">
              <option value="comum" class="option2">Comum</option>
              <option value="premium" class="option2">Premium</option>
          </select><br/>

         <!-- <input type="file" name="foto-perfil"> -->

          <input class="dados"  type="password" name="senha" placeholder="Confirme usando sua senha" required><br/>

          <span>
            <a href="users.php" id="button-cancelar">Voltar</a><input id="button" type="submit" name="alteração_dados_concluido" value="Alterar os dados!"></a>
          </span>

      </form>
  </div>
  </body>
</html>
