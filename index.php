<?php require_once 'Auth.php';
$auth = new Auth(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container offset-lg-4">
    <?php
    if (isset($_REQUEST['action']) && $_REQUEST['action'] == "logout") {
        $auth->Logut();
    } else {
        $auth->Login();
    }
    if (!isset($_SESSION['valid_user'])) { ?>
        <form action="/" method="POST">
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" class="form-control" id="login" name="userid">
            </div>
            <div class="form-group">
                <label for="pass">Пароль</label>
                <input type="password" class="form-control" id="pass" name="password">
            </div>
            <button type="submit" class="btn btn-success">Войти</button>
        </form>
    <?php } else if (isset($_SESSION['valid_user']) && !isset($_SESSION['lang'])) {
        require_once 'language.php';
    } else { ?>
        <a class="btn btn-warning" href="add.php">Корзина</a>
        <a class="btn btn-danger" href="index.php?action=logout">Выход</a><br>
    <?php } ?>
    <a class="btn btn-primary" href="secret.php">Секретная страница</a>
</div>
</body>
</html>

