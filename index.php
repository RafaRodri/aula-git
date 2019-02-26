<html>
	<head>
		<title>Git</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
    <?php
        //echo "Olá Mundo !!!";
    ?>
        <form action="index.php" method="post">
            <fieldset>
                <label for="cLogin">Login:</label>
                <input type="text" name="cLogin" id="cLogin">
            </fieldset>

            <fieldset>
                <label for="cSenha">Senha:</label>
                <input type="text" name="cSenha" id="cSenha">
            </fieldset>

            <fieldset>
            <input type="submit" name="Enviar" value="Enviar">
            </fieldset>
        </form>
	</body>
</html>