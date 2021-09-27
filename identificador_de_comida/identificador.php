<?php
  /*  $_SESSION['comprar'] = isset($_GET[''])?$_GET['']:0;
    $_SESSIION['valor'] = isset($_GET['']?$_GET['']:0;
    $_SESSION['quantidade'] = isset($_GET[''])?$_GET['']:0;
    fuction  indetificando( int $_SESSION['comprar'], int $_SESSION['valor'] , int $quantidade){
      switch ($_SESSION['comprar']) {
       case 1:
          $_SESSION['comprar'] = "Pizza calabresa";
          break;
       case 2:
          $_SESSION['comprar'] =  "Pizza de Carne ";
          break;
       case 3:
          $_SESSION['comprar'] = "Pizza de Calabresa Premium";
          break;
       case 4:
          $_SESSION['comprar'] = "Pizza de Calabresa Default";
          break;
        case 5:
          $_SESSION['comprar'] = "Sushi Gunkan";
          break;
        case 6:
          $_SESSION['comprar'] = "Sushi Hossomaki Tekkamaki";
          break;
        case 7:
          $_SESSION['comprar'] = "Sushi Joe";
          break;
        case 8:
           $_SESSION['comprar'] = " Sushi Uramaki";
          break;
        case 9:
           $_SESSION['comprar'] = "Hambúrger Comum";
          break;
        case 10:
           $_SESSION['comprar'] = "Hambúrger de Frango"
          break;
        case 11:
           $_SESSION['comprar'] = "Hambúrger de MultiCheese";
          break;
        case 12:
           $_SESSION['comprar'] = "Big Hambúrger";
          break;
        case 13:
           $_SESSION['comprar'] = "Salada Comum";
          break;
        case 14:
           $_SESSION['comprar'] = "Salada de Molho Especial";
          break;
        case 15:
           $_SESSION['comprar'] = "Salada com Vinagre"
           break;
        case 16:
           $_SESSION['comprar'] ="Salada Tropical";
        default:
   $_SESSION['comprar'] = "Erro lamentou mais seu produto nao foi encontrando"
          break;
      }
      switch ($_SESSION['valor']) {
        case 1:
           $_SESSION['valor'] = 26;
          break;
        case 2:
           $_SESSION['valor'] = 28;
          break;
        case 3:
           $_SESSION['valor'] = 30;
          break;
        case 4:
           $_SESSION['valor'] = 20;
          break;
        case 5:
           $_SESSION['valor']  = 25;
          break;
        case 6:
           $_SESSION['valor'] = 22;
          break;
        case 7:
           $_SESSION['valor'] = 28;
          break;
        case 8:
           $_SESSION['valor'] = 18;
          break;
        case 9:
           $_SESSION['valor'] = 24;
          break;
        case 10:
           $_SESSION['valor'] = 21
          break;
        case 11:
           $_SESSION['valor'] = 32;
          break:
        case 12:
           $_SESSION['valor'] = 37;
          break;
        case 13:
          $_SESSION['valor'] = 23;
          break;
        case 14:
           $_SESSION['valor'] = 25;
          break;
        case 15:
           $_SESSION['valor'] = 21;
          break;
        case 16:
           $_SESSION['valor'] = 26;
          break;
        default:
            $_SESSION['valor'] =0;
          break;
      }
      $Valor = $_SESSION['valor'] * $quantidade;
      return $_SESSION['comprar'] and $_SESSION['valor'] and $Valor;
    }
    $$arrayCarStore= array(
        $Produto = $_SESSION['comprar'];
        $Valor_Produto = $_SESSION['valor'];
        $Valor_para_serpagou = $Valor;
    ); */

    //unifica todos os arrays em um só;
    $array = array_merge($_SESSION['pizza'], $_SESSION['sushi'], $_SESSION['hamb'], $_SESSION['salada']);
    $_SESSION['lista_de_pedidos'] = $array;
    //verifica se o usuario fez algum pedido e vai realizando etapas para verificar se o
    //produto existe, se existir ele é adicionado ao array $_SESSION['carrinho']
    if (isset($_GET['adicionar'])) {
      $compra = $_GET['adicionar'];
      if (isset($array[$compra])){
        $_SESSION['compra_realizada'] = true;
        $contador = 0;
        $_SESSION['compra'] = $compra;
        if (isset($_SESSION[$compra])){
          $_SESSION[$compra]['quantidade']++;
          $_SESSION[$compra]['preço'] *= $_SESSION[$compra]['quantidade'];
          header('location: ../index.php');
        }else{
          foreach ($array[$compra] as $imagem => $preço){}
          $_SESSION[$compra] = array("nome" => $compra, "quantidade" => 1, "preço" => $preço);
          header('location: ../index.php');
        }
      }else{
        $_SESSION['erro_compra'] = true;
      }
    }
    echo "<br/>";
    /*foreach ($array as $nome => $array) {
      if (isset($_SESSION[$nome])) {
        print_r($_SESSION[$nome]);
        echo "<br/>";
      }
    }*/
?>
