<?php
$products = array(
    2 => array('name' => 'товар 1', 'price' => 233),
    7 => array('name' => 'товар 2', 'price' => 333),
    43 => array('name' => 'товар 3', 'price' => 332),
);

function Cart($id = null)
{
    session_start();
    if($id != null)
    {
        $product = $_SESSION['items'][$id];
        $_SESSION['total'] -= $product['price'] * $product['count'];
        unset($_SESSION['items'][$id]);
        header("Location:list.php");
        return;
    }
    global $products;
    $product = $products[$_POST['cart']];
    $product['count'] = $_POST['count'];

    $_SESSION['items'][] = $product;
    $_SESSION['total'] += $product['count'] * $product['price'];
    unset($_POST);
}