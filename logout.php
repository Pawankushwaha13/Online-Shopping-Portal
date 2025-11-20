<?php
require_once 'config/db.php';
session_destroy();
header('Location: /SimpleShop_v2/index.php');
exit;