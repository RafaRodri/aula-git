<?php
session_start();

ob_start(); //para não ter erro de redirecionamento

$btnCadUsuario = filter_input(INPUT_POST,'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
    require_once'Conexao.php';

    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

    array_pop($dados);

    $dados['senha'] = password_hash($dados['senha'],PASSWORD_DEFAULT);


    $sql = "INSERT INTO user (nome,usuario,email,senha) VALUES (
            :nome,
            :usuario,
            :email,
            :senha)";

    $conn = new Conexao();
    $conn = $conn->conectaDB();
    $stmt = $conn->prepare($sql);

    foreach($dados as $key => $value){
        $stmt->bindValue(':'.$key, $value);
        //echo "$ stmt->bindValue(':'.$key, $value)<br/><br/>";
    }

    $fetch = $stmt->execute();
    //$lastID = $conn->lastInsertId();

    if($stmt->rowCount() > 0){
        $_SESSION['msg'] = "cadastro realizado com sucesso";
        header('Location: index.php');
    }else{
        $_SESSION['msg'] = "cadastro NAO realizado";
        echo "cadastro NAO realizado";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <title>Git</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>

    <h2>Cadastro</h2>
    <form action="cadastrar.php" method="post">
        <fieldset>
            <label for="cNome">Nome:</label>
            <input type="text" name="nome" id="cNome">
            <label for="cEmail">Email:</label>
            <input type="text" name="email" id="cEmail">
        </fieldset>

        <fieldset>
            <label for="cUsuario">Usuário:</label>
            <input type="text" name="usuario" id="cUsuario">
            <label for="cSenha">Senha:</label>
            <input type="password" name="senha" id="cSenha">
        </fieldset>

        <fieldset>
            <input type="submit" name="btnCadUsuario" value="Cadastrar">
        </fieldset>

    </form>

</body>
</html>