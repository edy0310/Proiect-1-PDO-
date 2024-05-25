CREATE DATABASE IF NOT EXISTS flowers2;
USE flowers2;

CREATE TABLE IF NOT EXISTS flori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nume VARCHAR(30) NOT NULL,
    culoare VARCHAR(30) NOT NULL,
    marime VARCHAR(30) NOT NULL,
    pret INT NOT NULL
);

CREATE TABLE IF NOT EXISTS flower_update (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nume VARCHAR(30) NOT NULL,
    status VARCHAR(30) NOT NULL,
    edtime TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);