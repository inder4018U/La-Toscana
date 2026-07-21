-- Run this in phpMyAdmin on your "italian" database

-- 1. Add price and image columns to dishes table
ALTER TABLE dishes ADD price INT NOT NULL DEFAULT 0;
ALTER TABLE dishes ADD image VARCHAR(255) NOT NULL DEFAULT '';

-- 2. Create the orders table
CREATE TABLE orders (
    orderid INT AUTO_INCREMENT PRIMARY KEY,
    userid INT NOT NULL,
    username VARCHAR(100) NOT NULL,
    dishid INT NOT NULL,
    dishname VARCHAR(100) NOT NULL,
    dishcuisine VARCHAR(100) NOT NULL,
    price INT NOT NULL,
    quantity INT NOT NULL,
    total INT NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'Pending'
);
