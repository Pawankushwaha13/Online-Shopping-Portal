<?php
require_once 'includes/header.php';
$err = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = trim($_POST['email']);
    $pass = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $u = $stmt->fetch(PDO::FETCH_ASSOC);
    if($u && password_verify($pass, $u['password'])){
        $_SESSION['user_id'] = $u['id'];
        $_SESSION['user_name'] = $u['name'];
        header('Location: index.php'); exit;
    } else $err = "Invalid credentials.";
}
?>
<h2>Login</h2>
<?php if($err) echo "<p class='err'>".htmlspecialchars($err)."</p>"; ?>
<form method="post" class="form-auth">
  <input name="email" type="email" placeholder="Email" required>
  <input name="password" type="password" placeholder="Password" required>
  <button type="submit" class="btn">Login</button>
</form>
<?php require_once 'includes/footer.php'; ?>