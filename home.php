<html>
<head>
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
            $_SESSION['loginErro'] = "Área restrita";
            header('Location: index.php');
        }
        ?>

        <div class="row h-75 m-0 p-2 text-center">
            <div class="col-8 w-100 bg-secondary">teste</div>
            <div class="col-4 bg-warning">teste</div>
        </div>
    </div>
</body>
</html>