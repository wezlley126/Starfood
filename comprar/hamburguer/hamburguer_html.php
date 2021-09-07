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
    <title>BigHambuguer</title>
    <link rel="stylesheet" href="../Css/tres_em_um.css">
    <link rel="icon" href="icone.png">
</head>

<body style="height: 100vh;
    background: linear-gradient(to right, #331106, #99300c);">
    <div class="pagina_de_comida" id="hamburguer">
        <h1>Faça seu pedido</h1>
        <form action="hamburguer.php" method="GET">

           <b>Rua e o número da casa</b>
            <input type="text"  id="local" name="endereco" placeholder="Digite seu Endereço..." required>

            <b>Bairro</b>
            <input type="text"  id="" name="bairro"placeholder="Digite seu Bairro..." required>

            <b>Cidade</b>
            <select class="City" name="cidade" required>
                <option value="" disabled selected hidden class="select1">Informe sua Cidade</option>
                <option value="3" class="option2">Fortaleza</option>
                <option value="1" class="option2">Horizonte</option>
                <option value="2" class="option2">Pacajus</option>
            </select>

            <div>
               <b>Quantidade</b>
                <br>
                <input type="number" placeholder="Escolha a quantidade" name="quantidade" required>
            </div>

            <p>Você deseja:</p>
            <div class="icons">
                <div>
                    <a href="../../index.php"><i class="Return"></i><span>Cancelar</span></a>
                </div>
                <div>
                   <input id="enviar"type="submit">
                </div>
            </div>
        </form>
    </div>
</body>

</html>
