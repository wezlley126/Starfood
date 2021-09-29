<?php
  session_start();
  if (!isset($_SESSION['user'])) {
      header("location: ../sistema_contas/logino.php");
  }else{
    if (!is_array($_SESSION['user']) || count($_SESSION['user']) != 7) {
      header("location: ../sistema_contas/logino.php");
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
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
  <h1>starfood</h1>
  <p>O seu site de comida que vai alem <b>estrelas</b> por voce</p>
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

  ?>
</div>
<div class="row">
  <div class="side">
    <h2>Sobre mim:</h2>
    <h5>Minha foto de perfil:</h5>
    <div id="img-usuario"></div>
    <h3>Dados do Usuario:</h3>
    <p>Aqui voce poder tanto visualizar alguns de seus dados como tambem alterar cada um deles: </p>
    <div class="fakeimg" style="height:60px;">Email: <?php echo $_SESSION['user'][3]; ?></div><br>
    <div class="fakeimg" style="height:60px;">Nome: <?php echo $_SESSION['user'][1]." ".$_SESSION['user'][2]; ?></div><br>
    <div class="fakeimg" style="height:60px;">Sexo: <?php echo $_SESSION['user'][5]; ?> <br/> Conta: <?php echo $_SESSION['user'][6]; ?></div>
    <form class="" action="alterar_dados.php" method="post">
        <div id="alterar_dados"><input type="submit" name="alterar_dados" value="Desejo alterar meus dados!" id="alterar_dados_button"></div>
    </form>
  </div>
  <div class="main">
    <h5><?php echo date('d/m/Y H:i')?></h5>
    <h2>Noticia:</h2>
    <h5><?php echo date('d/m/Y H:i')?></h5>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>Atualizacoes</p>
    <p>Vejam as mais novas noticias do site Starfood sobre seu cartalogo de comida entre outras novidades:</p>

  </div>
</div>
<div class="row">
  <div class="side">
<div class="anucio-de-vip">
   <img id="imagem-vip" src="https://static.thenounproject.com/png/1565418-200.png" alt="imagem do vip">
   <h1 style="color: gold;">Sejam um  vip agora:</h1>
   <p>O nosso usuario vip tem diversos vantagens em nosso site sejam desconto para nosso produtos alem de possuir o acessou a armazer de produtos reservados. </p>
   <form class="" action="index.html" method="post">
       <input id="Vipao" type="submit" name="" value="VIP">
   </form>
</div>
</div>
</div>
<div class="footer">
  <h2>Todos os direitos do site sao reservados para Starfood &copy;</h2>
  <p>todos os responsaveis pelo site @Daniel,@Maria Eduarda, @Wesley, @Diego, @Kleisson, @Lucas, @Guilherme.</p>
</div>

</body>
</html>
