<?php session_start();
include 'Auth.php' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Секретная страница</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2> Эта страница только для зарегистрированных пользователей</h2>
    <?php if (isset($_SESSION['valid_user']) && isset($_SESSION['lang'])) {
        $auth = new Auth();
        echo $auth->GetHello();
    }
    ?>
    <a href="index.php">Ha главную страницу
</div>

</body>
</html>



