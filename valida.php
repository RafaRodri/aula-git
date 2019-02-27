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

        $stmt = $conn->conectaDB()->prepare($sql);
        $stmt->execute();


        if($stmt){
            $fetch = $stmt->fetch(PDO::FETCH_ASSOC);

            if(password_verify($senha, $fetch['senha'])){
                unset($_SESSION['msg']);

                setcookie("id",$fetch['id'],time()+3600);
                setcookie("nome",$fetch['nome'],time()+3600);
                setcookie("user",$fetch['usuario'],time()+3600);
                setcookie("email",$fetch['email'],time()+3600);
                header('Location: home.php');
            }else{
                $_SESSION['msg'] = "Usuário ou senha incorreto";
                header('Location: index.php');
            }

        }else{
            echo "no";
        }
    }catch (PDOException $e){
        echo '{"error":{"text":'.$e->getMessage().'}}';
    }
}
else{
    $_SESSION['msg'] = "Área restrita";
    header('Location: index.php');
}


?>