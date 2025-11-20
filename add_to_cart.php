<?php
require_once 'config/db.php';
$product_id = intval($_POST['product_id'] ?? 0);
$qty = max(1,intval($_POST['qty'] ?? 1));
if(!$product_id){ header('Location: /SimpleShop_v2/index.php'); exit; }
if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if(isset($_SESSION['cart'][$product_id])) $_SESSION['cart'][$product_id] += $qty;
else $_SESSION['cart'][$product_id] = $qty;
header('Location: /SimpleShop_v2/cart.php');
exit;