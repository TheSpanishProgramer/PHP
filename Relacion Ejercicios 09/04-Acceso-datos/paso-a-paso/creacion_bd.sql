
DROP DATABASE   IF     EXISTS alumnos;
CREATE DATABASE IF NOT EXISTS alumnos;
USE alumnos;

CREATE TABLE `alumno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `email` text NOT NULL,
  `edad` int NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO alumno (nombre, apellidos, email, edad) 
    VALUES ('Ane','Lauzurika', 'ane@gmail.com',22);
INSERT INTO alumno (nombre, apellidos, email, edad) 
    VALUES ('Mikel','Aranzeta', 'mikel@gmail.com',25);
INSERT INTO alumno (nombre, apellidos, email, edad) 
    VALUES ('Ainhoa','Loiu', 'ainhoa@gmail.com',21);
INSERT INTO alumno (nombre, apellidos, email, edad) 
    VALUES ('Maite','Urrutia', 'maite@gmail.com',28);
INSERT INTO alumno (nombre, apellidos, email, edad) 
    VALUES ('Igor','Ugarte', 'igor@gmail.com',20);