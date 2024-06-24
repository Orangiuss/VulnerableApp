CREATE DATABASE IF NOT EXISTS vulnerable_app;

USE vulnerable_app;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    md5_password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, md5_password) VALUES ('admin', 'f30842d5150e4cbb9c1affd546c310c7');
INSERT INTO users (username, md5_password) VALUES ('user', 'dbdf5542e5c2e73fa09d671db5208dd8');
INSERT INTO users (username, md5_password) VALUES ('"', '00000000000000000000000000000000');
INSERT INTO users (username, md5_password) VALUES ('Oh_No_My_Database', '4e7f25a06c7dde7efa0f5d7f8d1f11a9');