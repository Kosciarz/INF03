CREATE TABLE uzytkownicy (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    login VARCHAR(50), 
    haslo VARCHAR(50)
)


INSERT INTO uzytkownicy (uzytkownicy.login, uzytkownicy.haslo)
VALUES ('Grzegorz', 'g')


SELECT uzytkownicy.login
FROM uzytkownicy


SELECT uzytkownicy.id, uzytkownicy.login
FROM uzytkownicy
WHERE uzytkownicy.haslo LIKE '4%'