<html>
	<head>
		<title>Git</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
    <?php
        //echo "Olá Mundo !!!";
    ?>
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
                <input type="submit" name="entrar" value="Entrar">
                <input type="reset" name="limpar" value="Limpar">
            </fieldset>
        </form>
	</body>
</html>