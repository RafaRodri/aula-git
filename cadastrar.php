<?php
session_start();

ob_start(); //para não ter erro de redirecionamento

$btnCadUsuario = filter_input(INPUT_POST,'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
    require_once'Conexao.php';

    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    array_pop($dados_rc);
    $erro = false;

    //retira tags html
    $dados_st = array_map('strip_tags', $dados_rc);

    //retira espaços em branco
    $dados = array_map('trim', $dados_st);


    if(in_array('',$dados)){
        $erro = true;
        $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário preencher todos os campos</div>";
    }elseif((strlen($dados['senha'])) < 6){
        $erro = true;
        $_SESSION['msg'] = "<div class='alert alert-danger'>A senha deve ter no minímo 6 caracteres</div>";
    }elseif(stristr($dados['senha'], "'")) {
        $erro = true;
        $_SESSION['msg'] = "<div class='alert alert-danger'>Caractere ( ' ) utilizado na senha é inválido</div>";
    }else{

        $conn = new Conexao();
        $conn = $conn->conectaDB();

        $sqlUser = "SELECT id FROM user WHERE usuario=:usuario";
        $stmtUser = $conn->prepare($sqlUser);
        $stmtUser->bindValue(':usuario',$dados['usuario']);
        $stmtUser->execute();

        if($stmtUser->rowCount()){
            $erro = true;
            $_SESSION['msg'] = "<div class='alert alert-danger'>Este usuário já está sendo utilizado</div>";
        }

        $sqlEmail = "SELECT id FROM user WHERE email=:email";
        $stmtEmail = $conn->prepare($sqlEmail);
        $stmtEmail->bindValue(':email',$dados['email']);
        $stmtEmail->execute();

        if($stmtEmail->rowCount()){
            $erro = true;
            $_SESSION['msg'] = "<div class='alert alert-danger'>Este e-mail já está cadastrado</div>";
        }

    }

    if(!$erro){

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
            $_SESSION['msgCad'] = "<div class='alert alert-success'>Cadastro realizado com sucesso</div>";
            header('Location: index.php');
        }
        else{
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar usuário</div>";
            echo "cadastro NAO realizado";
        }

    }
}

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
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="form-signin col-8 col-md-5">
            <h2>Cadastro</h2>

            <form action="cadastrar.php" method="post">
                <fieldset>
                    <!--<label for="cNome">Nome:</label>-->
                    <input class="form-control" type="text" name="nome" id="cNome" placeholder="Nome"><br>
                    <!--<label for="cEmail">Email:</label>-->
                    <input class="form-control" type="text" name="email" id="cEmail" placeholder="E-mail"><br>
                </fieldset>

                <fieldset>
                    <!--<label for="cUsuario">Usuário:</label>-->
                    <input class="form-control" type="text" name="usuario" id="cUsuario" placeholder="Usuário"><br>
                    <!--<label for="cSenha">Senha:</label>-->
                    <input class="form-control" type="password" name="senha" id="cSenha" placeholder="Senha"><br>
                </fieldset>

                <fieldset class="buttons">
                    <input class="btn btn-success btn-block" type="submit" name="btnCadUsuario" value="Cadastrar">
                </fieldset>

            </form>
        </div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>