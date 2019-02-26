<html>
<head>
    <title>Git</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body>
﻿<?php
if(isset($_COOKIE['user'])) {
    echo $_COOKIE['user'];
}else{
    header('Location: index.php');
}
?>
    <div id="container" class="border border-danger w-75 mx-auto">
        <div class="row h-75 m-0 p-2 text-center">
            <div class="col-8 w-100 bg-secondary">teste</div>
            <div class="col-4 bg-warning">teste</div>
        </div>
    </div>
</body>
</html>