<?php
session_start();
?>
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
    <?php
    //Mensagem de erro
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    //Mensagem vinda do cadastro
    if(isset($_SESSION['msgCad'])){
        echo $_SESSION['msgCad'];
        unset($_SESSION['msgCad']);
    }
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="form-signin col-8 col-md-5">

            <form action="valida.php" method="post">
                <fieldset>
                    <!--<label for="cLogin">Email:</label>-->
                    <input class="form-control" type="text" name="login" id="cLogin" placeholder="Usuário"><br/>
                </fieldset>

                <fieldset>
                    <!--<label for="cSenha">Senha:</label>-->
                    <input class="form-control" type="password" name="senha" id="cSenha" placeholder="Senha"><br/>
                </fieldset>

                <fieldset class="buttons">
                    <input class="btn btn-success btn-block" type="submit" name="btnLogin" value="Acessar">
                    <!--<input class="btn-sm btn-success" type="reset" name="limpar" value="Limpar">-->
                </fieldset>

                <div class="text-center" style="margin-top:20px;">
                    <a class="text-dark" href="cadastrar.php">Cadastrar conta</a>
                </div>

                <div class="text-center" style="margin-top: 20px;">
                    <a href="<?php echo $loginUrl; ?>">
                        <button type="button" class="btn btn-primary">Facebook</button>
                    </a>
                </div>
            </form>

        </div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>