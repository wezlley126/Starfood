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
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Carrinho de compras</title>
    <link rel="stylesheet" href="Carrinho.css">
  </head>
  <body>
    <div id="compras">
      <?php
        if (isset($_SESSION['carrinho_not_null'])) {
      ?>
      <div id="titulo_carrinho">Lista de pedidos realizados.</div>
      <table id="tabela_compras" align="center">
        <thead>
            <td>Nome</td>
            <td>Quantidade</td>
            <td>Valor</td>
        </thead>
        <?php
        $total = 0;
        //exibe todos os produtos comprados verificando se eles existem;
          foreach ($_SESSION['lista_de_pedidos'] as $nome => $array) {
            if (isset($_SESSION[$nome])) {
              $total += $_SESSION[$nome]['preço']*$_SESSION[$nome]['quantidade'];
              //escreve todos os produtos em uma tabela de compras.
              ?>
              <tr>
                <td><?php echo $_SESSION[$nome]['nome'] ?></td>
                <td><?php echo $_SESSION[$nome]['quantidade'] ?></td>
                <td><?php echo "R$".$_SESSION[$nome]['preço']*$_SESSION[$nome]['quantidade'].",00" ?></td>
              </tr>
              <?php
            }
          }
          ?>
            <tr>
                <td colspan="2"><b>Total: </b></td>
                <td><?php echo "R$".$total.",00"; ?></td>
            </tr>

            </table>

          <?php
            ?>
            <a href=""><div id="chorro"><button type="button" name="button" id="button">Confirmar a compra</button><br/><img width="200px" src="beyblade.gif"><img width="265px" src="gato_giratorio.gif"><video style="margin: 0%;" height="150px;" width="250px" src="Esquilo_girando.mp4" autoplay></div><a>
            <?php
              }else{
                ?>
                <div id="produto_nulo">Nenhum produto foi adicionado ao carrinho no momento.</div>
                <?php
              }
            ?>
    </div>
  </body>
</html>
