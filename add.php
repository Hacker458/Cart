<?php session_start();
require_once 'cart.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Корзина</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container offset-4">
    <form action="add.php" method="POST">
        <h1>Добавить в корзину</h1>
        <label for="cart">Выберите товар</label>
        <select class="form-control" id="cart" name="cart">
            <?php
            foreach ($products as $product => $value) {
                echo "<option value='$product'>" . $value['name'] . " | Цена: " . $value['price'] . " грн</option>";
            }
            ?>
        </select><br>
        <label for="count">Количество</label>
        <input type="number" id="count" name="count">
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
    <a class="btn btn-dark" href="list.php">К списку</a>
    <a class="btn btn-primary" href="index.php">На главную</a>
</div>

<?php if (isset($_POST['cart']) && isset($_POST['count'])) Cart(); ?>
</body>
</html>


