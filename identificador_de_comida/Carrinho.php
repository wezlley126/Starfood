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
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Carrinho de compras</title>
    <link rel="stylesheet" href="Carrinho.css">
  </head>
  <body>
    <div class="bkg" align="center">
      <form class="bkg" action="index.html" method="post">
        <?php
          foreach ($_SESSION['lista_de_pedidos'] as $nome => $array) {
            if (isset($_SESSION[$nome])) {
              //print_r($_SESSION[$nome]);
              echo $_SESSION[$nome]['nome'].", quantidade: ".$_SESSION[$nome]['quantidade'].", preço: ".$_SESSION[$nome]['preço']*$_SESSION[$nome]['quantidade'];
              echo "<br/>";
            }
          }
        ?>
      </form>
    </div>
  </body>
</html>
