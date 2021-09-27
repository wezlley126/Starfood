<?php
  session_start();
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
  <body>

      <?php

      ?>

    <form class="" action="alterar_dados_mysql.php" method="post">
        <input type="text" name="nome" value="<?php echo $_SESSION['user'][1] ?>" required><br/>

        <input type="text" name="sobrenome" value="<?php echo $_SESSION['user'][2] ?>" required><br/>

        <input type="email" name="email" value="<?php echo $_SESSION['user'][3] ?>" required><br/>

        <select class="select" name="sexo">
            <option value="Masculino" class="option">Masculino</option>
            <option value="Feminino" class="option">Feminino</option>
            <option value="Outro" class="option">Outro</option>
        </select><br/>

        <select class="member" name="membro">
            <option value="comum" class="option2">Comum</option>
            <option value="premium" class="option2">Premium</option>
        </select><br/>

        <input type="password" name="senha" placeholder="Confirme usando sua senha" required>

        <input type="submit" name="alteração_dados_concluido" value="Alterar os dados!">

    </form>
    <?php
      print_r($_SESSION['user']);
    ?>
  </body>
</html>
