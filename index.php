<?php
    //starta a sessão;
    session_start();
    $_SESSION['conta_existente'] = false;
    $_SESSION['conta_criada'] = false;

    //conecta ao banco de dados mysql;
    include("sistema_contas/connect.php");

    $_SESSION['email'];
    $_SESSION['senha'];

    //verifica se a sessão foi iniciada ou está vazia, se estiver vázia ele nega o acesso e redireciona para a página de login;
    if (empty($_SESSION['email']) || empty($_SESSION['senha'])) {
        header("location: sistema_contas/logino.php");
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
</head>
<body>
    <nav id='menu' >
        <ul>
        <li><img src='Comidas/logo.png'></li>
        <?php
            echo "Você está logado com o e-mail de:".$_SESSION['email'];
        ?>
        <li><a href='home.php'>Home</a></li>
        <li><a href='sistema_contas/Sair.php'>Sair</a></li>
        <li><a href='extras.php' rel='next'>Extra</a></li>
        </ul>
    </nav>
    <section id='cardapio'>
    <div id='Catalogo'>
    <h2> Cardápio</h2>
    </div>
    <section class ='Produtos'>
  <section class='Titulos'>
      <h1>Pizzas</h1>
  </section>
            <section class='Comidas'>
                <section class='comida'>
                    <img src='Comidas/Calabresa comum.png'>
                    <p>Pizza de calabresa comum
                       <br/>Preço: R$ 26
                       <br><a href='comprar/pizza/pizza_html.php' class='botaodecomprar'>Comprar</a></p>
                </section>
                <section class='comida'>
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
                </section>
    <section class='titulos'>
        <h1>Comidas japonesas</h1>
    </section>
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
        <section class='titulos'>
            <h1>Hambúgueres</h1>
        </section>
        <section class='Comidas'>
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
            <section class='titulos'>
                <h1>Comidas veganas</h1>
            </section>
            <section class='Comidas'>
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
</body>
</html>"
