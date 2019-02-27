<?php
session_start();
?>
<html>
	<head>
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
        </form>
    <div>
        <?php
        if(isset($_SESSION['loginErro'])){
            echo $_SESSION['loginErro'];
            unset($_SESSION['loginErro']);
        }
        ?>
    </div>
	</body>
</html>