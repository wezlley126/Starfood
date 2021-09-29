<?php
    //starta a sessão;
    session_start();
    $_SESSION['conta_existente'] = false;
    $_SESSION['conta_criada'] = false;

    //conecta ao banco de dados mysql;
    include("sistema_contas/connect.php");

    //verifica se a sessão foi iniciada ou está vazia, se estiver vázia ele nega o acesso e redireciona para a página de login;
    if (!isset($_SESSION['user'])) {
        header("location: ../sistema_contas/logino.php");
    }else{
      if (!is_array($_SESSION['user']) || count($_SESSION['user']) != 7) {
        header("location: ../sistema_contas/logino.php");
      }
    }

    //fecha a conexão
    mysqli_close($conect);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>StarFood</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='home.css'>
    <link rel='icon' href='icone.png'>
    <script type="text/javascript">
       source=""
    </script>
</head>
<body style="text-align: center;">
    <div class='navbar'>

        <!-- <img src='Comidas/logo.png' id="logo"> -->
        <a href="index.php">Home</a>
        <a href="identificador_de_comida/Carrinho.php"><img id="carroça" src="carroça.png" ></a>
        <a href='users/users.php'>User</a>
        <a href='sistema_contas/Sair.php'>Sair</a>
        <a href="extras.php">Extra</a>
        </ul>
    </div>
    <section id='cardapio'>
    <div id='Catalogo'>
    <h2 style="margin-top: 20px;">Cardápio</h2>
    </div>
    <?php

    $_SESSION['pizza'] = array(
      "Pizza de calabresa comum" => array("Comidas/Calabresa comum.png" => 26),
      "Pizza de carne" => array("Comidas/Pizza de carne.png" => 28),
      "Pizza calabresa premium" => array("Comidas/Calabresa premium.png" => 30),
      "Pizza calabresa default" => array("Comidas/Calabres default.png" => 20)
    );
    $_SESSION['sushi'] = array(
      "Sushi Gunkan" => array("Comidas/Sushi Gunkan.png" => 25),
      "Sushi Hossomaki Tekkamaki" => array("Comidas/Sushis/Sushi hot roll.png" => 22),
      "Sushi Joe" => array("Comidas/Sushis/Sushi Joe.png" => 28),
      "Sushi Uramaki" => array("Comidas/Sushis/Sushi Uramaki.png" => 18)
    );
    $_SESSION['hamb'] = array(
      "Hambúrguer comum" => array("Comidas/hamburguer/comida1.png" => 24),
      "Hambúrguer de Frango" => array("Comidas/hamburguer/comida2.png" => 21),
      "Hambúrguer MultiCheese" => array("Comidas/hamburguer/comida3.png" => 32),
      "Big Hambúrguer" => array("Comidas/hamburguer/comida4.png" => 37)
    );
    $_SESSION['salada'] = array(
      "Salada Comum" => array("Comidas/Veganas/Salada comum.png" => 23),
      "Salada Molho Especial" => array("Comidas/Veganas/Salada Molho Especial.png" => 25),
      "Salada com Vinagre" => array("Comidas/Veganas/Salada com vinagre.png" => 21),
      "Salada Tropical" => array("Comidas/Veganas/Salada tropical.png" => 26)
    );
    ?>
    <?php
      include 'identificador_de_comida/identificador.php';
      //echo "<br/>$compra";
    ?>
    <?php
      /*if (isset($_SESSION['compra_realizada']) and $_SESSION['compra_realizada'] == true){
        ?>
        <div style="text-align: center; font-size: 20px; color: blue;">
            <?php echo $_SESSION['compra'] ?> foi adicionado ao carrinho de compras.<br/>
            AVISO(Se você atualizar a página será considerado que foi feito o mesmo pedido novamente)
        </div>
        <?php
      }//$_SESSION['compra_realizada'] = false;
      echo "<br/>";*/
      if (!isset($_GET['adicionar'])) {
        ?>
        <div style="text-align: center; font-size: 20px; color: blue;">
            <?php
            if ($_SESSION['compra'] != null){
              echo $_SESSION['compra']." foi adicionado ao carrinho de compras.<br/>";
            }
            ?>
        </div>
        <?php
        $_SESSION['compra'] = null;
      }

      if ($_SESSION['erro_compra'] == true){
    ?>
    <div style="color: red; text-align:center; font-size: 30px;">
      Você não pode adicionar alimentos que não existem!
    </div>
  <?php
    $_SESSION['erro_compra'] = false;}
    $_SESSION['erro_compra'] = false;
  ?>
    <section class ='Produtos'>
  <section class='Titulos'>
      <h1>Pizzas</h1>
  </section>
  <section class='Comidas'>
        <?php
            foreach ($_SESSION['pizza'] as $nome => $pizza_produto) {
              foreach ($pizza_produto as $imagem => $preço) {
                ?>
                <section class='comida'>
                    <img src='<?php echo $imagem ?>'>
                    <p><?php echo $nome ?>
                       <br/>Preço: R$ <?php echo $preço ?>
                       <br><a href='?adicionar=<?php echo $nome ?>' class='botaodecomprar'>Adiconar ao carrinho</a></p>
                </section>
                <?php
              }
            }
        ?>
  </section>
              <!--  <section class='comida'>
                    <img src='Comidas/Pizza de carne.png'>
                    <p>Pizza de carne
                        <br>Preço: R$ R$28
                        <br><a href='comprar/pizza/pizza_html.php' class='botaodecomprar'>Comprar</a>
                    </p>
                </section>
                <section class='comida'>
                    <img src='Comidas/Calabresa premium.png'>
                    <p>Pizza calabresa premium <br>Preço: R$ 30
                    <br><a href='comprar/pizza/pizza_html.php' class='botaodecomprar'>Comprar</a></p>
                </section>
                <section class='comida'>
                    <img src='Comidas/Calabres default.png'>
                    <p>Pizza calabresa default
                       <br> Preço : R$ 20
                    <br><a href='comprar/pizza/pizza_html.php' class='botaodecomprar'>Comprar</a></p>
                </section> -->
    <section class='titulos'>
        <h1>Comidas japonesas</h1>
    </section>
    <section class='Comidas'>
    <?php
      foreach ($_SESSION['sushi'] as $nome => $sushi_produto) {
        foreach ($sushi_produto as $imagem => $preço) {
          ?>
          <section class='comida'>
              <img src='<?php echo $imagem ?>'>
              <p><?php echo $nome ?>
                <br/>Preço: R$ <?php echo $preço ?>
               <br><a href='?adicionar=<?php echo $nome ?>' class='botaodecomprar'>Adiconar ao carrinho</a></p>
             </section>
          <?php
        }
      }
      ?>
    </section>
    <!--
    <section class='Comidas'>
        <section class='comida'>
            <img src='Comidas/Sushi Gunkan.png'>
            <p>Sushi Gunkan
                <br> Preço : R$ 25
            <br><a href='comprar/sishu/sishu_html.php' class='botaodecomprar'>Comprar</a></p>
        </section>
        <section class='comida'>
            <img src='Comidas/Sushis/Sushi hot roll.png'>
            <p>Sushi Hossomaki Tekkamaki
                <br> Preço : R$ 22
            <br><a href='comprar/sishu/sishu_html.php' class='botaodecomprar'>Comprar</a></p>
        </section>
        <section class='comida'>
            <img src='Comidas/Sushis/Sushi Joe.png'>
            <p>Sushi Joe
                <br> Preço : R$ 28
            <br><a href='comprar/sishu/sishu_html.php' class='botaodecomprar'>Comprar</a></p>
        </section>
        <section class='comida'>
            <img src='Comidas/Sushis/Sushi Uramaki.png'>
            <p>Sushi Uramaki
                <br> Preço : R$ 18
            <br><a href='comprar/sishu/sishu_html.php' class='botaodecomprar'>Comprar</a></p>
        </section>
        </section>
      -->
        <section class='titulos'>
            <h1>Hambúgueres</h1>
        </section>
        <section class='Comidas'>
          <?php
            foreach ($_SESSION['hamb'] as $nome => $hamb_produto) {
              foreach ($hamb_produto as $imagem => $preço) {
                ?>
                <section class='comida'>
                    <img src='<?php echo $imagem ?>'>
                    <p><?php echo $nome ?>
                      <br/>Preço: R$ <?php echo $preço ?>
                     <br><a href='?adicionar=<?php echo $nome ?>' class='botaodecomprar'>Adiconar ao carrinho</a></p>
                   </section>
                <?php
              }
            }
            ?>
          </section>
          <!--
            <section class='comida'>
                <img src='Comidas/hamburguer/comida1.png'>
                <p>Hambúrguer comum
                    <br> Preço : R$ 24
                <br><a href='comprar/hamburguer/hamburguer_html.php' class='botaodecomprar'>Comprar</a></p>
            </section>
            <section class='comida'>
                <img src='Comidas/hamburguer/comida2.png'>
                <p>Hambúrguer de Frango
                    <br> Preço : R$ 21
                <br><a href='comprar/hamburguer/hamburguer_html.php' class='botaodecomprar'>Comprar</a></p>
            </section>
            <section class='comida'>
                <img src='Comidas/hamburguer/comida3.png'>
                <p>Hambúrguer MultiCheese
                    <br> Preço : R$ 32
                <br><a href='comprar/hamburguer/hamburguer_html.php' class='botaodecomprar'>Comprar</a></p>
            </section>
            <section class='comida'>
                <img src='Comidas/hamburguer/comida4.png'>
                <p>Big Hambúrguer
                    <br> Preço : R$ 37
                <br><a href='comprar/hamburguer/hamburguer_html.php' class='botaodecomprar'>Comprar</a></p>
            </section>
            </section>
          -->
            <section class='titulos'>
                <h1>Comidas veganas</h1>
            </section>
            <section class='Comidas'>
              <?php
                foreach ($_SESSION['salada'] as $nome => $salada_produto) {
                  foreach ($salada_produto as $imagem => $preço) {
                    ?>
                    <section class='comida'>
                        <img src='<?php echo $imagem ?>'>
                        <p><?php echo $nome ?>
                          <br/>Preço: R$ <?php echo $preço ?>
                         <br><a href='?adicionar=<?php echo $nome ?>' class='botaodecomprar'>Adiconar ao carrinho</a></p>
                       </section>
                    <?php
                  }
                }
                ?>
                <!--
              </section>
                <section class='comida'>
                    <img src='Comidas/Veganas/Salada comum.png'>
                    <p>Salada Comum
                        <br> Preço : R$ 23
                    <br><a href='comprar/vegana/vegana_html.php' class='botaodecomprar'>Comprar</a></p>
                </section>
                <section class='comida'>
                    <img src='Comidas/Veganas/Salada Molho Especial.png'>
                    <p>Salada Molho Especial
                        <br> Preço : R$ 25
                    <br><a href='comprar/vegana/vegana_html.php' class='botaodecomprar'>Comprar</a></p>
                </section>
                <section class='comida'>
                    <img src='Comidas/Veganas/Salada com vinagre.png'>
                    <p>Salada com Vinagre
                        <br> Preço : R$ 21
                    <br><a href='comprar/vegana/vegana_html.php' class='botaodecomprar'>Comprar</a></p>
                </section>
                <section class='comida'>
                    <img src='Comidas/Veganas/Salada tropical.png'>
                    <p>Salada Tropical
                        <br> Preço : R$ 26
                    <br><a href='comprar/vegana/vegana_html.php' class='botaodecomprar'>Comprar</a></p>
                </section>
            </section>
            </section>
    </section>
    </section>
  -->
</body>
</html>
