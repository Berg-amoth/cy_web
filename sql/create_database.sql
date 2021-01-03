-- (re)Creating database
DROP DATABASE IF EXISTS cartoufles;
CREATE DATABASE cartoufles CHARACTER SET "utf8";

-- (re)Creating user
SET GLOBAL validate_password.policy = 0;
DROP USER IF EXISTS 'root'@'localhost';
CREATE USER 'root'@'localhost';
GRANT ALL PRIVILEGES ON cartoufles.* TO 'root'@'localhost';
FLUSH PRIVILEGES;

-- Selecting database
USE cartoufles;

-- (re)Creating table(s)
DROP TABLE IF EXISTS produit;

CREATE TABLE produit(
    id INT PRIMARY KEY,
    designation VARCHAR(50),
    categorie VARCHAR(50),
    stock INT DEFAULT 0,
    price DECIMAL(3,2) NOT NULL
);

-- Inserting data
INSERT INTO produit VALUES(101, "La classique", "cheap", 5, 1.45);
INSERT INTO produit VALUES(102, "La jaune", "cheap", 4, 1.49);
INSERT INTO produit VALUES(103, "La petite", "cheap", 8, 1.59);
INSERT INTO produit VALUES(104, "La douce", "cheap", 0, 1.75);
INSERT INTO produit VALUES(105, "La frite", "cheap", 87, 1.82);

INSERT INTO produit VALUES(201, "Les lisses", "best_sellers", 55, 2.44);
INSERT INTO produit VALUES(202, "La jaune", "best_sellers", 1, 2.75);
INSERT INTO produit VALUES(203, "La petite", "best_sellers", 6, 2.62);
INSERT INTO produit VALUES(204, "La douce", "best_sellers", 17, 2.26);
INSERT INTO produit VALUES(205, "La frite", "best_sellers", 7, 2.88);

INSERT INTO produit VALUES(301, "La folle", "prime", 15, 5.47);
INSERT INTO produit VALUES(302, "La pomme carotte", "prime", 34, 5.51);
INSERT INTO produit VALUES(303, "La sautee", "prime", 15, 5.35);
INSERT INTO produit VALUES(304, "La belge", "prime", 5, 5.96);
INSERT INTO produit VALUES(305, "L'ultime", "prime", 2, 5.99);
