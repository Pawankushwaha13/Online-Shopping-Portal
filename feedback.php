<?php
session_start();
require_once 'includes/footer.php'; 

// Database Connection
$conn = getDB();

// When form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($name) && !empty($message)) {
        $conn->query("INSERT INTO feedback (name, message, created_at) VALUES ('$name', '$message', NOW())");
        $success = "Thank you! Your feedback has been submitted.";
    } else {
        $error = "Please fill all fields.";
    }
}

// Fetch all feedback
$feedbackList = $conn->query("SELECT * FROM feedback ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback - SimpleShop v2</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h1>Feedback Form</h1>

<?php if (!empty($success)) echo "<p style='color:green;'>$success</p>"; ?>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST" style="background:#fff;padding:20px;width:350px;border-radius:5px;">
    <label>Your Name</label><br>
    <input type="text" name="name" required style="width:100%;padding:8px;"><br><br>

    <label>Your Feedback</label><br>
    <textarea name="message" required style="width:100%;height:100px;padding:8px;"></textarea><br><br>

    <button type="submit" style="padding:8px 16px;">Submit</button>
</form>

<hr>
<h2>All Feedback</h2>

<ul>
<?php while ($fb = $feedbackList->fetch_assoc()): ?>
    <li style="margin-bottom:15px;">
        <strong><?php echo htmlspecialchars($fb['name']); ?></strong><br>
        <?php echo nl2br(htmlspecialchars($fb['message'])); ?><br>
        <small><?php echo $fb['created_at']; ?></small>
    </li>
<?php endwhile; ?>
</ul>

</body>
</html>
