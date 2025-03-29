-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS mydb;
USE mydb;

-- Create leaddata table
CREATE TABLE IF NOT EXISTS leaddata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    plan_name VARCHAR(100) NOT NULL,
    message TEXT,
    created_at DATETIME NOT NULL
);

-- Create contacts table
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    created_at DATETIME NOT NULL
); 