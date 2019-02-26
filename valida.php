<?php

if(isset($_POST['login'])){
    $login = $_POST['login'];
}
if(isset($_POST['senha'])){
    $senha = $_POST['senha'];
}

if(!empty($login) && !empty($senha)){
    echo "Seja bem vindo, $login.";
}else{
    echo "Usuário não logado !!!";
}

?>