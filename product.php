<?php
require_once 'includes/header.php';
$id = intval($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$p = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$p){ echo "<p>Product not found.</p>"; require_once 'includes/footer.php'; exit; }
?>
<div class="product-page">
  <img src="/SimpleShop_v2/images/<?php echo htmlspecialchars($p['image']); ?>" alt="" class="product-page-img">
  <div class="product-page-info">
    <h1><?php echo htmlspecialchars($p['name']); ?></h1>
    <p class="muted">₹ <?php echo number_format($p['price'],2); ?></p>
    <p><?php echo nl2br(htmlspecialchars($p['description'])); ?></p>
    <form action="/SimpleShop_v2/add_to_cart.php" method="post" class="product-buy">
      <input type="hidden" name="product_id" value="<?php echo $p['id']; ?>">
      <input type="number" name="qty" value="1" min="1" class="qty">
      <button class="btn" type="submit">Add to Cart</button>
    </form>
  </div>
</div>
<?php require_once 'includes/footer.php'; ?>