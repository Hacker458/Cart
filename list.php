<?php session_start();
require_once 'cart.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container offset-4">
    <?php
    if (isset($_SESSION['items']) && $_SESSION['total'] > 0) {
        echo "<h1>Список корзины</h1><br><table>";
        $product = $_SESSION['items'];
        echo "<tr><th>ID</th><th>Название</th><th>Цена</th><th>Кол-во</th><th>Удаление</th></tr>";
        foreach ($product as $val => $item) {
            echo "<tr><td>" . $val . "</td><td>" . $item['name'] . "</td><td>" . $item['price'] . ".грн</td><td>" . $item['count'] . "</td><td><a class='btn btn-danger' href='/delete.php?id=" . $val . "'>Удалить</td></tr>";
        }
        echo "</table>"; ?>

        <button class="btn btn-info">Сумма <span class="badge badge-light"><?php echo $_SESSION['total']; ?></span></button>
        <?php
    } else {
        echo "<h1>Корзина пуста</h1>";
    }
    ?>
    <a class="btn btn-warning" href="add.php">К корзине</a>
    <a class="btn btn-primary" href="index.php">На главную</a>
</div>
</body>
</html>
