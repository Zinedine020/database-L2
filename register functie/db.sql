CREATE DATABASE registreren;

USE registreren;

CREATE TABLE maken (
    id INT AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    wachtwoord VARCHAR(255) NOT NULL
);

select * from maken;


