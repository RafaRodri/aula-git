<?php

if(isset($_POST['login'])){
    $login = $_POST['login'];
}
if(isset($_POST['senha'])){
    $senha = $_POST['senha'];
}

if(!empty($login) && !empty($senha)){
    if($login == 'Rafa' && $senha == '123'){
        header('Location: home.php');
        setcookie("user",$login,time()+100);
        /*name is your cookie's name
        value is cookie's value
        $int is time of cookie expires*/
    }else{
        header('Location: index.php');
    }
    //echo "Seja bem vindo, $login.";
}else{
    echo "Usuário não logado !!!";
}

?>