<?php
require_once 'includes/header.php';
$cart = $_SESSION['cart'] ?? [];
$items = [];
$total = 0.0;
if($cart){
    $ids = array_keys($cart);
    $in = str_repeat('?,', count($ids)-1).'?';
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($in)");
    $stmt->execute($ids);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $r){
        $qty = $cart[$r['id']];
        $r['qty'] = $qty;
        $r['sub'] = $r['price'] * $qty;
        $total += $r['sub'];
        $items[] = $r;
    }
}
?>
<h2>Your Cart</h2>
<?php if(empty($items)): ?>
  <p>Cart empty.</p>
<?php else: ?>
  <table class="cart-table">
    <tr><th>Product</th><th>Qty</th><th>Price</th><th>Subtotal</th></tr>
    <?php foreach($items as $it): ?>
      <tr>
        <td><?php echo htmlspecialchars($it['name']); ?></td>
        <td><?php echo intval($it['qty']); ?></td>
        <td>₹ <?php echo number_format($it['price'],2); ?></td>
        <td>₹ <?php echo number_format($it['sub'],2); ?></td>
      </tr>
    <?php endforeach; ?>
    <tr><td colspan="3" class="total-label">Total</td><td class="total-value">₹ <?php echo number_format($total,2); ?></td></tr>
  </table>
<?php endif; ?>
<?php require_once 'includes/footer.php'; ?>