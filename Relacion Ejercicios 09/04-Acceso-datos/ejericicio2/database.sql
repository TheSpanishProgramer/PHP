DROP DATABASE IF EXISTS empleados;
CREATE DATABASE IF NOT EXISTS empleados;
USE empleados;

CREATE TABLE empleado (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    dni VARCHAR(9) NOT NULL,
    sexo VARCHAR(20) NOT NULL,
    edad INT NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    curriculum VARCHAR(500) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    PRIMARY KEY (id)
);

INSERT INTO empleado (nombre, apellidos, email, dni, sexo, edad, fecha_nacimiento, curriculum)
    VALUES ('Ane', 'Urrutia Larrain', 'aurrutia@gmail.com', '72752343Z', 'Mujer', 27, '1992-10-06', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec varius tellus turpis, et cursus urna aliquet non. Aenean in mi mattis, bibendum est sed, accumsan metus. Ut dapibus rhoncus sem, eu condimentum turpis hendrerit dignissim. Integer accumsan mauris tellus, in fermentum ex dignissim in. Vestibulum quis fringilla sapien, at tempus.');

INSERT INTO empleado (nombre, apellidos, email, dni, sexo, edad, fecha_nacimiento, curriculum)
    VALUES ('Mikel', 'Abasolo Lerena', 'mabasolo@gmail.com', '75854342A', 'Hombre', 23, '1996-06-18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec varius tellus turpis, et cursus urna aliquet non. Aenean in mi mattis, bibendum est sed, accumsan metus. Ut dapibus rhoncus sem, eu condimentum turpis hendrerit dignissim. Integer accumsan mauris tellus, in fermentum ex dignissim in. Vestibulum quis fringilla sapien, at tempus.');

INSERT INTO empleado (nombre, apellidos, email, dni, sexo, edad, fecha_nacimiento, curriculum)
    VALUES ('Ainhoa', 'Murias Olazagoitia', 'molazagoitia@gmail.com', '73252356Z', 'Mujer', 24, '1995-02-21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec varius tellus turpis, et cursus urna aliquet non. Aenean in mi mattis, bibendum est sed, accumsan metus. Ut dapibus rhoncus sem, eu condimentum turpis hendrerit dignissim. Integer accumsan mauris tellus, in fermentum ex dignissim in. Vestibulum quis fringilla sapien, at tempus.');

INSERT INTO empleado (nombre, apellidos, email, dni, sexo, edad, fecha_nacimiento, curriculum)
    VALUES ('Aritz', 'Boroa Zabalburu', 'azabalburu@gmail.com', '76852372Z', 'Hombre', 21, '1998-11-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec varius tellus turpis, et cursus urna aliquet non. Aenean in mi mattis, bibendum est sed, accumsan metus. Ut dapibus rhoncus sem, eu condimentum turpis hendrerit dignissim. Integer accumsan mauris tellus, in fermentum ex dignissim in. Vestibulum quis fringilla sapien, at tempus.');
