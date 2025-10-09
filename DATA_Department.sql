/*
USE company;

CREATE TABLE Department(
                           id INT AUTO_INCREMENT PRIMARY KEY,
                           name varchar(255)
);
*/

USE company;
ALTER TABLE Department
    ADD hiring tinyint;

USE company;
ALTER TABLE Department
    ADD workmode varchar(255);
