-- SimpleShop_v2 database
CREATE DATABASE IF NOT EXISTS simpleshop_v2 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE simpleshop_v2;
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(150) UNIQUE,
  password VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150),
  description TEXT,
  price DECIMAL(10,2),
  image VARCHAR(255) DEFAULT 'placeholder.jpg',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO products (name,description,price,image) VALUES
('Blue T-Shirt','Comfort cotton t-shirt',299.00,'p1. jpg'),
('Sneakers','Stylish sneakers',1299.00,'p2.jpg'),
('Backpack','Durable travel backpack',899.00,'p3.jpg'),
('Smart Watch','Fitness tracking smartwatch',2499.00,'p4.jpg'),
('Wireless Earbuds','True wireless earbuds with mic',1999.00,'p5.jpg'),
('Sunglasses','Polarized sunglasses',599.00,'p6.jpg'),
('Denim Jacket','Classic denim jacket',1999.00,'p7.jpg'),
('Water Bottle','Insulated stainless steel bottle',499.00,'p8.jpg');