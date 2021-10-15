<?php
  session_start();
  if (!isset($_SESSION['user'])) {
      header("location: sistema_contas/logino.php");
  }else{
    if (!is_array($_SESSION['user']) || count($_SESSION['user']) != 7) {
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
    <div id="form-user">
       <h1 id="titulo">Alterar dados do usuário:</h1>
      <form class="form" action="alterar_dados_mysql.php" method="post">
          <input class="infor-user" type="text" name="nome" value="<?php echo $_SESSION['user'][1] ?>" required><br/
          <input class="infor-user" type="text" name="sobrenome" value="<?php echo $_SESSION['user'][2] ?>" required><br/>

          <select class="infor-user" name="sexo">
              <option value="Masculino" class="option">Masculino</option>
              <option value="Feminino" class="option">Feminino</option>
              <option value="Outro" class="option">Outro</option>
          </select><br/>

          <select class="infor-user" name="membro">
              <option value="comum" class="option2">Comum</option>
              <option value="premium" class="option2">Premium</option>
          </select><br/>

          <input class="infor-user"  type="password" name="senha" placeholder="Confirme usando sua senha" required>

          <br/>

          <input id="button" type="submit" name="alteração_dados_concluido" value="Alterar os dados!">
          <p style="font-size: 18px;">Atenção todas as suas informações anterioes serão alteradas.</p>
      </form>
  </div>
  </body>
</html>
