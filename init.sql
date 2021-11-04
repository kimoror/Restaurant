CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT, DELETE ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;

CREATE TABLE IF NOT EXISTS dishes (
    id INT(4) NOT NULL AUTO_INCREMENT,
    name TEXT NOT NULL,
    price  INT(6) NOT NULL,
    PRIMARY KEY(id)
);

INSERT IGNORE INTO dishes (name, price)
SELECT * FROM (SELECT 'Kurica', 1000) as tmp
WHERE NOT EXISTS (
    SELECT name FROM dishes where name = 'Kurica' and price = 1000
) LIMIT 1;

INSERT IGNORE INTO dishes (name, price)
SELECT * FROM (SELECT 'Borsh', 750) as tmp
WHERE NOT EXISTS (
    SELECT name FROM dishes where name = 'Borsh' and price = 750
) LIMIT 1;

INSERT IGNORE INTO dishes (name, price)
SELECT * FROM (SELECT 'Kompot', 400) as tmp
WHERE NOT EXISTS (
    SELECT name FROM dishes where name = 'Borsh' and price = 750
) LIMIT 1;

INSERT IGNORE INTO dishes (name, price)
SELECT * FROM (SELECT 'Shashlik iz svinini', 1200) as tmp
WHERE NOT EXISTS (
    SELECT name FROM dishes where name = 'Shashlik iz svinini' and price = 1200
) LIMIT 1;

INSERT IGNORE INTO dishes (name, price)
SELECT * FROM (SELECT 'Salat Cesar', 800) as tmp
WHERE NOT EXISTS (
    SELECT name FROM dishes where name = 'Salat Cesar' and price = 800
) LIMIT 1;

INSERT IGNORE INTO dishes (name, price)
SELECT * FROM (SELECT 'Kraboviy Salat', 1600) as tmp
WHERE NOT EXISTS (
    SELECT name FROM dishes where name = 'Kraboviy Salat' and price = 1600
) LIMIT 1;

-- INSERT INTO dishes (name, price) values
--     ('Kurica', 1000),
--     ('Borsh', 750),
--     ('Kompot', 400),
--     ('Shashlik iz svinini', 1200),
--     ('Salat Cesar', 800),
--     ('Kraboviy Salat', 1600);

CREATE TABLE IF NOT EXISTS staff (
    id INT(5) NOT NULL AUTO_INCREMENT,
    firstName TEXT NOT NULL,
    surname TEXT NOT NULL,
    post TEXT NOT NULL,
    salary INT(8) NOT NULL,
    age INT(3) NOT NULL,
    PRIMARY KEY(id)
);

INSERT IGNORE INTO staff (firstName, surname, post, salary, age)
SELECT * FROM (SELECT 'Nikolay', 'Modin', 'Director', 500000, 56) as tmp
WHERE NOT EXISTS (
    SELECT firstName FROM staff where firstName = 'Nikolay' and surname = 'Modin' and post = 'Director' and salary = 500000 and age = 56
) LIMIT 1;

INSERT IGNORE INTO staff (firstName, surname, post, salary, age)
SELECT * FROM (SELECT 'Nikita', 'Bodkin', 'Chef-povar', 150000, 47) as tmp
WHERE NOT EXISTS (
    SELECT firstName FROM staff where firstName = 'Nikita' and surname = 'Bodkin' and post = 'Chef-povar' and salary = 150000 and age = 47
) LIMIT 1;


INSERT IGNORE INTO staff (firstName, surname, post, salary, age)
SELECT * FROM (SELECT 'Irina', 'Zabolotnaya', 'Pomoshnik Povara', 90000, 29) as tmp
WHERE NOT EXISTS (
    SELECT firstName FROM staff where firstName = 'Irina' and surname = 'Zabolotnaya' and post = 'Pomoshnik Povara' and salary = 90000 and age = 29
) LIMIT 1;

INSERT IGNORE INTO staff (firstName, surname, post, salary, age)
SELECT * FROM (SELECT 'Aleksey', 'Kotanin', 'Officiant', 50000, 56) as tmp
WHERE NOT EXISTS (
    SELECT firstName FROM staff where firstName = 'Aleksey' and surname = 'Kotanin' and post = 'Officiant' and salary = 50000 and age = 56
) LIMIT 1;

INSERT IGNORE INTO staff (firstName, surname, post, salary, age)
SELECT * FROM (SELECT 'Andrey', 'Marin', 'Officiant', 50000, 22) as tmp
WHERE NOT EXISTS (
    SELECT firstName FROM staff where firstName = 'Andrey' and surname = 'Marin' and post = 'Officiant' and salary = 50000 and age = 22
) LIMIT 1;

INSERT IGNORE INTO staff (firstName, surname, post, salary, age)
SELECT * FROM (SELECT 'Haribula', 'Кadimagomedova', 'Uborshica', 45000, 34) as tmp
WHERE NOT EXISTS (
    SELECT firstName FROM staff where firstName = 'Haribula' and surname = 'Кadimagomedova' and post = 'Uborshica' and salary = 45000 and age = 34
) LIMIT 1;

-- INSERT INTO staff(firstName, surname, post, salary, age) values
--     ('Nikolay', 'Modin', 'Director', 500000, 56),
--     ('Nikita', 'Bodkin', 'Chef-povar', 150000, 47),
--     ('Irina', 'Zabolotnaya', 'Pomoshnik Povara', 90000, 29),
--     ('Aleksey',  'Kotanin', 'Officiant', 500000, 56),
--     ('Andrey', 'Marin', 'Officiant', 500000, 56),
--     ('Haribula', 'Кadimagomedova', 'Uborshica', 500000, 56);

CREATE TABLE IF NOT EXISTS person (
id int unsigned NOT NULL auto_increment,
login varchar(30) NOT NULL,
password varchar(32) NOT NULL,
privelegy int NOT NULL default 0,
PRIMARY KEY (id)
) ;

INSERT IGNORE INTO person (login, password, privelegy)
SELECT * FROM (SELECT 'user', 'qwerty', 0) AS tmp
WHERE NOT EXISTS (
    SELECT login FROM person WHERE login = 'user' AND password = 'qwerty' AND privelegy = 0
) LIMIT 1;

INSERT IGNORE INTO person (login, password, privelegy)
SELECT * FROM (SELECT 'admin', '111', 1) AS tmp
WHERE NOT EXISTS (
    SELECT login FROM person WHERE login = 'admin' AND password = '111' AND privelegy = 1
) LIMIT 1;

INSERT IGNORE INTO person (login, password, privelegy)
SELECT * FROM (SELECT 'ivan', '123', 0) AS tmp
WHERE NOT EXISTS (
    SELECT login FROM person WHERE login = 'ivan' AND password = '123' AND privelegy = 0
) LIMIT 1;