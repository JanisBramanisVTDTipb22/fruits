CREATE DATABASE fruits_janis_bramanis;
USE fruits_janis_bramanis;

CREATE TABLE fruits (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    calories INT NOT NULL
);

INSERT INTO fruits (title, calories)
VALUES
('Apple', 55),
('Banana', 101);