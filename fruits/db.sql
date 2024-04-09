/*CREATE DATABASE fruits_janis_bramanis;
USE fruits_janis_bramanis;
*/
DROP TABLE fruits_janis_bramanis;
CREATE TABLE fruits (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(50) NOT NULL,
	calories INT NOT NULL fruits
);

SELECT * FROM fruits;

INSERT INTO fruits
(title, calories)
VALUES
(Apple, 55),
(Banana, 101);