<?php
    //starta a sessão;
    session_start();

    //conecta ao banco de dados mysql;
    include("sistema_contas/connect.php");

    $_SESSION['email'];
    $_SESSION['senha'];

    //verifica se a sessão foi iniciada ou está vazia, se estiver vázia ele nega o acesso e redireciona para a página de login;
    if (empty($_SESSION['email']) || empty($_SESSION['senha'])) {
        header("location: sistema_contas/logino.php");
    }
    //fecha a conexão
    $close = mysqli_close($conect);
?>
<!DOCTYPE html>
<html>

<head>
    <title> extras </title>
    <link rel="stylesheet" type="text/css" href="extras.css">
    <meta charset="utf-8">
</head>
<link rel="icon" href="icone.png">
<title>Extras</title>

<body>

    <nav id="menu">
        <ul>
            <li><img src="Comidas/logo.png"></li>
            <?php
                echo "Você está logado com o e-mail de:".$_SESSION['email'];
            ?>
            <li><a href="index.php">Home</a></li>
            <li><a href='sistema_contas/Sair.php'>Sair</a></li>
            <li><a href="extras.php" rel="next">Extra</a></li>
        </ul>
    </nav>
    <div class="Extras">
        <h1>Extras</h1>
        <h3>Área reservada aos participantes desse trabalho</h3>
        <h3>Turma: Informática - 2° ano</h3>
    </div>
    <section>
        <section class="titulos">
            <h1>Front End</h1>
        </section>
        <section class="Pessoas">
            <section class="Pessoa">
                <img src="Extras/Kleison.jpg">
                <p>
                    <h7>Kleison</h7> </br>
                    Responsavel pela página inicial completa, do html ao css, como: a estrutura, os menus, local onde os
                    objetos ficariam, a proporção nas telas, as cores, e animações.</br>
                    Contribuiu nos extras e também auxiliou e revisou as outras páginas.
                </p>
            </section>
            <section class="Pessoa">
                <img src="Extras/Daniel.jpg">
                <p>
                    <h7>Daniel</h7></br>
                    Responsável pelas ideias de cores, imagens e preços. Também desenvolveu as páginas de Login, criação
                    de conta e de compras em linguagens HTML 5 e CSS3.
                </p>
            </section>
            <section class="Pessoa">
                <img src="Extras/Eduarda.jpg">
                <p>
                    <h7>Eduarda</h7></br>
                    Fez a parte inicial dos extras onde houveram modificações feitas pelos demais integrantes da equipe.
                </p>
            </section>
            <section class="Pessoa">
                <img src="Extras/Guilherme.jpg">
                <p>
                    <h7>Guilherme</h7></br>
                    Área de Front-End, Desenvolveu a estrutura do menu junto com o design da logo, também dando
                    concepções nos "Extras"
                </p>
            </section>
            <section class="Pessoa">
                <img src="Extras/Diego.jpg">
                <p>
                    <h7>Diego</h7></br>
                    Responsavel pela Edição e Dimensionamento das imagens
                </p>
            </section>
        </section>

        <section class="titulos">
            <h1>Back-End</h1>
        </section>
        <section class="Pessoas">
            <section class="Pessoa">
                <img src="Extras/Lucas.jpg">
                <p>
                    <h7>Lucas</h7></br>
                    da equipe de Back-End Responsável pela Criação dos Scripts em PHP do Projeto, Também contribuiu nas
                    outras paginas.
                </p>
            </section>
            <section class="Pessoa">
                <img src="Extras/weslley.jpg">
                <p>
                    <h7>Weslley</h7></br>
                    Criou o registro e ajudou no login, implementou o php, contribuiu no css e trabalhou com os demais
                    para correção de erros e bugs.
                </p>
            </section>
        </section>
        <section class="Pessoas">
            <section class="Vaga">
                <img src="devicon.png">
                <p>
                    <h7>Vaga aberta</h7></br>
                    A qualquer pessoa interessdo(a) por back-end, estamos recrutando para ser o 8° membro do grupo Starfood
                </p>
                <p>
                    <h7>Preferências</h7><br>
                    Conhecimento em PHP, Saiba trabalhar em equipe, tenha responsabilidade,
                    esteja aberto a criticas, e tenha conhecimentos básicos de desenvolvimento web com HTML5 e estilização com CSS3 ou onisciência
                </p>
            </section>
        </section>
    </section>

</body>

</html>
