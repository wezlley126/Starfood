<?php
    session_start();

    include("../../sistema_contas/connect.php");

    $_SESSION['email'];
    $_SESSION['senha'];

    if (empty($_SESSION['email']) || empty($_SESSION['senha'])) {
        header("location: ../../logino.php");
    }
    $close = mysqli_close($conect);
?>
<!DOCTYPE html>
<html lang="Pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../icone.png">
  <title>Big hambúrguer</title>
  <link rel="stylesheet" href="../Css/comprar.css">
</head>
<body class="bodyhamburguer">
  <?php
  $BigHamburguer = 37;
  $cliente = isset($_GET["nome"])?$_GET["nome"]:"Seu nome não foi informado";
  $Endereco = isset($_GET["endereco"])?$_GET["endereco"]:1;
  $Bairro = isset($_GET["bairro"])?$_GET["bairro"]:1;
  $Cidade = isset($_GET["cidade"])?$_GET["cidade"]:0;
  $Quantidade = isset($_GET["quantidade"])?$_GET["quantidade"]:0;
  switch($Cidade){
      case 1:
          $Cidade = "Horizonte";
          break;
      case 2:
          $Cidade = "Pacajus";
          break;
      case 3;
          $Cidade = "Fortaleza";
          break;
      default:
         $Cidade = "Sua cidade não foi informanda";
  }
  $ValorDaComprar = $BigHamburguer * $Quantidade ;
  echo"<div class='comprar'>
     <h1 class='titulodecomprarrealizda'>Sua compra foi realizada com sucesso</h1>
       <h2>O valor a ser pago R$ é $ValorDaComprar por $Quantidade pedidos</h2>
       <p>Muito obrigado ".$_SESSION['user'][1]." ".$_SESSION['user'][2].", por sua compra na Starfood.
       Sua entrega será feita em $Cidade, na $Endereco , no bairro $Bairro.
       Sua entrega chegará em 1hr.
       Seja sempre bem-vindo(a), volte sempre!!!</p>
       <a href='../../index.php'><input type='button' value='Voltar'>
     </div>";
  ?>
</body>
</html>
