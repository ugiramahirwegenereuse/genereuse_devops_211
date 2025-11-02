-- ================================================
-- Database: group1_shareride_db
-- Description: Initialize database and tables for Group 1 project
-- ================================================

-- Create the database (if it doesn't exist)
CREATE DATABASE IF NOT EXISTS group1_shareride_db;
USE group1_shareride_db;

-- Drop tables if they already exist (optional)
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS rides;

-- ========================
-- Table: users
-- ========================
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample users
INSERT INTO users (name, email, password) VALUES
('Alice', 'alice@example.com', 'password123'),
('Bob', 'bob@example.com', 'password456');

-- ========================
-- Table: rides
-- ========================
CREATE TABLE rides (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    reg_number VARCHAR(20) NOT NULL,
    departure VARCHAR(100),
    destination VARCHAR(100),
    ride_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert sample rides
INSERT INTO rides (user_id, reg_number, departure, destination, ride_date) VALUES
(1, 'ABC123', 'Kigali', 'Musanze', '2025-11-05'),
(2, 'XYZ789', 'Huye', 'Kigali', '2025-11-06');

-- ================================================
-- End of init.sql
-- ================================================
