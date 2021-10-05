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
  <body>

      <?php

      ?>
    <div class="side">
      <div class="row">
        <div class="formulario-de-dados">
          <h1>Alterar Dados do Usuario:</h1>
         <form class="" action="alterar_dados_mysql.php" method="post">
             <input class="infor-user" type="text" name="nome" value="<?php echo $_SESSION['user'][1] ?>" required><br/>

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

             <input  type="password" name="senha" placeholder="Confirme usando sua senha" required>

             <input type="submit" name="alteração_dados_concluido" value="Alterar os dados!">
             <p>Atencao todas as informacoes anterioes do usuarios seram alteradas para sempre.<br>
                Nossa empresa nao ser reposabilizar por nada.</p>
         </form>
       </div>
      </div>
    </div>
  </body>
</html>
