<?php session_start();
require_once 'cart.php';
$id = $_GET['id'];
Cart($id);

