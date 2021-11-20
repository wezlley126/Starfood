<?php
  session_start();
  if (!isset($_SESSION['user'])) {
      header("location: ../sistema_contas/logino.php");
  }else{
    if (!is_array($_SESSION['user']) || count($_SESSION['user']) != 8) {
      header("location: ../sistema_contas/logino.php");
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>User</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="users.css">
</head>
<body>

<div class="navbar">
  <a href="../index.php">Home</a>
  <a href="../identificador_de_comida/Carrinho.php"><img id="carroça" src="../carroça.png"></a>
  <a href='../users/users.php'>User</a>
  <a href='../sistema_contas/Sair.php'>Sair</a>
  <a href="../extras.php">Extra</a>
</div>
<div class="header">
  <?php

    if (isset($_SESSION['conta_alterada'])) {
      echo "Parabéns, seus dados foram alterados com sucesso.";
    }unset($_SESSION['conta_alterada']);

    if (isset($_SESSION['email_existe'])) {
      echo "O email já está em uso, tente novamente com um email diferente!";
    }unset($_SESSION['email_existe']);

    if (isset($_SESSION['senha_incorreta'])) {
      echo "Senha incorreta, tente novamente!";
    }unset($_SESSION['senha_incorreta']);

    if (isset($_SESSION['formato inválido'])) {
      echo "Formato de imagem inválido!";
    }unset($_SESSION['formato inválido']);

  ?>
</div>
<div class="row">
  <div class="side">
        <div id="dados">
    <div class="alinhar-imagem">
      <img class="imagem-usuario" src="<?php echo $_SESSION['user']['7']; ?>" alt="Verifique sua rede Wi-fi">
    </div>
      <div class="fakeimg" style="height:20px;">Email: <?php echo $_SESSION['user'][3]; ?></div><br>
      <div class="fakeimg" style="height:20px;">Nome: <?php echo $_SESSION['user'][1]." ".$_SESSION['user'][2]; ?></div><br>
      <div class="fakeimg" style="height:20px;">Sexo: <?php echo $_SESSION['user'][5]; ?> <br/> Conta: <?php echo $_SESSION['user'][6]; ?></div>
      <form class="" action="alterar_dados.php" method="post">
          <div id="alterar_dados"><input type="submit" name="alterar_dados" value="Desejo alterar meus dados!" id="alterar_dados_button"></div>
      </form>
  </div>
</div>
</div>
<div class="row">
  <div class="side">
<div class="anucio-de-vip">
   <img  id= "vipicon" src="https://img.icons8.com/dusk/64/000000/vip.png"/>
   <p>Torne-se um cliente vip agora e receba descontos semanais em nossos produtos! </p>
</div>
</div>
</div>

</body>
</html>
