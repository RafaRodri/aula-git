<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Git</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body>

    <div id="container" class="border border-danger w-75 mx-auto">

        ﻿<?php
        if(isset($_COOKIE['user'])) {
        ?>
            <div class="identificacao">
                <span>Olá <?= $_COOKIE['user'] ?>, seja bem-vindo.</span>
                <a href="sair.php">Sair</a>
            </div>
        <?php
        }else{
            session_start();
            $_SESSION['msg'] = "<div class='alert alert-danger'>Área restrita</div>";
            header('Location: index.php');
        }
        ?>

        <div class="row h-75 m-0 p-2 text-center">
            <div class="col-8 w-100 bg-secondary">teste</div>
            <div class="col-4 bg-warning">teste</div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>