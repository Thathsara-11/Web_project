-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS cazper_sports_club;

-- Use the database
USE cazper_sports_club;

-- Create members table
CREATE TABLE IF NOT EXISTS members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    dob DATE NOT NULL,
    membership_plan VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    health_info TEXT,
    registration_date DATETIME NOT NULL,
    status ENUM('active', 'inactive', 'pending') DEFAULT 'pending'
);

-- Create an index on email for faster lookups
CREATE INDEX idx_email ON members(email);