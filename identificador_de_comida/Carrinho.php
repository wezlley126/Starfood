<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Carrinho de compras</title>
    <link rel="stylesheet" href="Carrinho.css">
  </head>
  <body>
    <div class="bkg">
      <form class="" action="index.html" method="post">
        <?php
          session_start();
          foreach ($_SESSION['lista_de_pedidos'] as $nome => $array) {
            if (isset($_SESSION[$nome])) {
              //print_r($_SESSION[$nome]);
              echo $_SESSION[$nome]['nome'].", quantidade: ".$_SESSION[$nome]['quantidade'].", preço: ".$_SESSION[$nome]['preço'];
              echo "<br/>";
            }
          }
        ?>
      </form>
    </div>

  </body>
</html>
