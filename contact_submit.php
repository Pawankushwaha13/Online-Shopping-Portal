<?php
require_once 'config/db.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_SESSION['flash'] = 'Message sent. Thank you!';
}
header('Location: contact.php');
exit;