DROP DATABASE IF EXISTS pacientes;
CREATE DATABASE IF NOT EXISTS pacientes;
USE pacientes;

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    contrasena VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE pacientes (
    id INT NOT NULL AUTO_INCREMENT,
    codigo VARCHAR(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    atendido TINYINT UNSIGNED,
    PRIMARY KEY (id)
);

INSERT INTO usuarios (usuario, nombre, apellidos, email, contrasena) VALUES ('jvadillo', 'Jon', 'Vadillo Romero', 'jvadillo@egibide.org', '1234');
INSERT INTO usuarios (usuario, nombre, apellidos, email, contrasena) VALUES ('jmalvido', 'Jaime', 'Malvido Durango', 'jvadillo@egibide.org', '4321');
