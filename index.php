<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <meta charset="UTF-8"/>
		<title>Git</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
        <form action="valida.php" method="post">
            <fieldset>
                <label for="cLogin">Email:</label>
                <input type="text" name="login" id="cLogin">
            </fieldset>

            <fieldset>
                <label for="cSenha">Senha:</label>
                <input type="password" name="senha" id="cSenha">
            </fieldset>

            <fieldset>
                <input type="submit" name="btnLogin" value="Acessar">
                <input type="reset" name="limpar" value="Limpar">
            </fieldset>

            <a href="cadastrar.php">Cadastrar conta</a>
        </form>
    <div>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
    </div>
	</body>
</html>