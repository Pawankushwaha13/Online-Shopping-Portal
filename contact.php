<?php require_once 'includes/header.php'; ?>
<section class="section contact">
  <h2>Contact Us</h2>
  <div class="contact-grid">
    <div class="contact-card">
      <h3>Our Office</h3>
      <p>SimpleShop Pvt Ltd<br>123 Market Street<br>Cityname, State, 560000<br>Phone: +91 98765 43210</p>
    </div>
    <div class="contact-card">
      <h3>Send us a message</h3>
      <form method="post" action="contact_submit.php">
        <input name="name" placeholder="Your name" required>
        <input name="email" type="email" placeholder="Your email" required>
        <textarea name="message" placeholder="Your message" required></textarea>
        <button class="btn" type="submit">Send Message</button>
      </form>
    </div>
  </div>
</section>
<?php require_once 'includes/footer.php'; ?>