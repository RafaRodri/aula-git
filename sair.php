<?php
session_start();

//unset($_COOKIE["user"]);
setcookie("id","",time()-1);
setcookie("nome","",time()-1);
setcookie("user","",time()-1);
setcookie("email","",time()-1);

header("Location: index.php")
?>