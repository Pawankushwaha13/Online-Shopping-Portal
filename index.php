<?php
require_once 'includes/header.php';
$stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<section class="hero">
  <img src="/SimpleShop_v2/images/banner.jpg" alt="Shop Banner" class="hero-img">
  <div class="hero-content">
    <h4>Welcome to SimpleShop</h4>
    <p>Apka Apna Shop</p>
    <a href="#menu" class="btn">Shop Now</a>
  </div>
</section>

<section id="menu" class="section">
  <h2 class="section-title">Our Products</h2>
  <div class="products-grid">
  <?php foreach($products as $p): ?>
    <div class="card">
      <img src="/SimpleShop_v2/images/<?php echo htmlspecialchars($p['image']); ?>" alt="" class="product-img">
      <div class="card-body">
        <h3><?php echo htmlspecialchars($p['name']); ?></h3>
        <p class="muted"><?php echo htmlspecialchars($p['description']); ?></p>
        <div class="price-row">
          <span class="price">₹ <?php echo number_format($p['price'],2); ?></span>
        </div>
        <div class="card-actions">
          <a href="/SimpleShop_v2/product.php?id=<?php echo $p['id']; ?>" class="btn btn-outline">View</a>
          <form action="/SimpleShop_v2/add_to_cart.php" method="post" class="inline-form">
            <input type="hidden" name="product_id" value="<?php echo $p['id']; ?>">
            <input type="number" name="qty" value="1" min="1" class="qty">
            <button class="btn" type="submit">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>