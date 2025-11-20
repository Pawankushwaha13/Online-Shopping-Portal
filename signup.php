<?php
require_once 'includes/header.php';
$errors = [];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pass = $_POST['password'];
    if(!$name || !$email || !$pass) $errors[] = "All fields required.";
    if(empty($errors)){
        $h = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
        try {
            $stmt->execute([$name,$email,$h]);
            echo "<p class='success'>Signup successful. <a href='login.php'>Login</a></p>";
            require_once 'includes/footer.php';
            exit;
        } catch(Exception $e){
            $errors[] = "Email already registered.";
        }
    }
}
?>
<h2>Signup</h2>
<?php foreach($errors as $e) echo "<p class='err'>".htmlspecialchars($e)."</p>"; ?>
<form method="post" class="form-auth">
  <input name="name" placeholder="Name" required>
  <input name="email" type="email" placeholder="Email" required>
  <input name="password" type="password" placeholder="Password" required>
  <button type="submit" class="btn">Signup</button>
</form>
<?php require_once 'includes/footer.php'; ?>