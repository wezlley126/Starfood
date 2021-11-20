<?php
    //arquivo responsavél por conectar todas as outras páginas do site ao banco de dados mysql através de quatro parametros
    //parametro 1:local onde o site fica no caso como estou usando o xampp fica em localhost, também pode colocar um endereço de ip como 127.0.0.1;
    //parametro 2:nome de usuário que vem por padrão root a menos que tenha sido mudado pelo dev;
    //parametro 3:senha de usuário que vem por padrão vazia(null) ou root;
    //parametro 4:nome do DB(data base ou base de dados), local onde se encontram os dados armazenados;
    //or die é o que deve ser escrito na tela caso o site não encontre a base de dados, exibindo uma mensagem de erro;
    $conect = mysqli_connect('127.0.0.1:3306', 'root', 'lelo2004', 'starfood_conta') or die("oh shit here we go again");
?>
