DROP DATABASE IF EXISTS ListaCompra;
CREATE DATABASE IF NOT EXISTS ListaCompra;
USE ListaCompra;

CREATE TABLE items (
    id INT NOT NULL AUTO_INCREMENT,
    texto VARCHAR(100) NOT NULL ,
    PRIMARY KEY (id)
)

INSERT INTO items (texto) VALUES ('Pan');
INSERT INTO items (texto) VALUES ('Leche');
INSERT INTO items (texto) VALUES ('Huevos');
INSERT INTO items (texto) VALUES ('Cereales');
INSERT INTO items (texto) VALUES ('Fruta');
