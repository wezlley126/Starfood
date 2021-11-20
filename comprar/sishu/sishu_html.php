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
    <title>Sushi Joe</title>
    <link rel="icon" href="../../icone.png">
    <link rel="stylesheet" href="../Css/tres_em_um.css">
</head>

<body>

    <body style="height: 100vh;
    background: linear-gradient(to right, #fa2f51, #ec6161);">
        <div class="pagina_de_comida" id="sushi">
            <h1>Faça seu pedido</h1>
            <form action="sishu.php" method="GET">

                <label for="name"><b>Endereço</b></label>
                <input type="text" name="endereco" id="" placeholder="Digite seu Endereço..." required>

                <label for="email"><b>Bairro</b></label>
                <input type="text"
                name="bairro" id="" placeholder="Digite seu Bairro..." required>

                <label for="Cidade"><b>Cidade</b></label>
                <select class="City" name="cidade" required>
                    <option value="" disabled selected hidden class="select1">Informe sua Cidade</option>
                    <option value="3" class="option2">Fortaleza</option>
                    <option value="1" class="option2">Horizonte</option>
                    <option value="2" class="option2">Pacajus</option>
                </select>

                <div>
                    <label for="quantidade"><b>Quantidade</b></label>
                    <br>
                    <input type="number" name="quantidade" placeholder="Escolha a quantidade" required>
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
