CREATE DATABASE IF NOT EXISTS patel_construction CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE patel_construction;

CREATE TABLE IF NOT EXISTS admins (
 id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 email VARCHAR(190) NOT NULL UNIQUE,
 password_hash VARCHAR(255) NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS enquiries (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(120) NOT NULL,
 phone VARCHAR(30) NOT NULL,
 email VARCHAR(190) NOT NULL,
 service VARCHAR(100) DEFAULT NULL,
 message TEXT NOT NULL,
 status ENUM('new','contacted','in_progress','closed') NOT NULL DEFAULT 'new',
 ip_address VARCHAR(45) DEFAULT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 INDEX(status), INDEX(created_at), INDEX(email)
);

INSERT INTO admins (name,email,password_hash) VALUES
('Super Admin','admin@patelconstruction.local','$2y$12$xPQkH04U3paOrIhKSnijTejeCgwFrXJtNsnDj6ipJPLvImoZuxwry');
