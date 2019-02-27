<?php
require_once'Conexao.php';

session_start();

$conn = new Conexao();


$btfLogin = filter_input(INPUT_POST,'btnLogin',FILTER_SANITIZE_STRING);
if($btfLogin){
    $login = filter_input(INPUT_POST,'login',FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);
    //$senha = password_hash($senha,PASSWORD_DEFAULT);

    try{
        $sql = "SELECT * FROM user WHERE usuario = '$login'";

        $result = $conn->conectaDB()->prepare($sql);
        $result->execute();


        if($result){
            $results = $result->fetch(PDO::FETCH_ASSOC);

            if(password_verify($senha, $results['senha'])){
                unset($_SESSION['loginErro']);
                setcookie("user",$login,time()+3600);
                header('Location: home.php');
            }else{
                $_SESSION['loginErro'] = "Usuário ou senha incorreto";
                header('Location: index.php');
            }

        }else{
            echo "no";
        }
    }catch (PDOException $e){
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
    die();

    if(!empty($login) && !empty($senha)){
        if($login == 'Rafa' && $senha == md5('123')){
            unset($_SESSION['loginErro']);
            setcookie("user",$login,time()+3600);
            header('Location: home.php');
        }else{
            $_SESSION['loginErro'] = "Usuário ou senha incorreto";
            header('Location: index.php');
        }
    }else{
        $_SESSION['loginErro'] = "Usuário ou senha inválido";
        header('Location: index.php');
    }
}
else{
    $_SESSION['loginErro'] = "Área restrita";
    header('Location: index.php');
}


?>