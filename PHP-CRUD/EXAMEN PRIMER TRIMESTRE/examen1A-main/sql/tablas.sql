create database examen2;
create user usuexamen@'localhost' identified by "secret0";
grant all on examen2.* to usuexamen@'localhost';
use examen2;
create table usuarios(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(40) unique not null,
    pass varchar(64) not null,
    perfil enum("Admin", "Normal") default "Normal"
    );
insert into usuarios(nombre, pass, perfil) values("admin", sha2("passadmin", 256), 1);
insert into usuarios(nombre, pass) values("usuario", sha2("passusu", 256));

create table articulos(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) unique not null,
    pvp decimal(6,2) not null,
    stock INT UNSIGNED default 0,
    imagen varchar(100) default "./img/default.jpg"
);

insert into articulos(nombre, pvp, stock) values("Monitor 19", 123.45, 12);
insert into articulos(nombre, pvp, stock) values("Raton USB", 23.95, 13);
insert into articulos(nombre, pvp, stock) values("USB 512GB", 123.45, 14);
insert into articulos(nombre, pvp, stock) values("USB 8GB", 12.45, 14);
insert into articulos(nombre, pvp, stock) values("SET LAPICEROS", 13.15, 32);
insert into articulos(nombre, pvp, stock) values("Stick Wifi", 23, 62);
insert into articulos(nombre, pvp, stock) values("Funda 17", 13.4, 92);
insert into articulos(nombre, pvp, stock) values("Monitor 22", 193.65, 2);
insert into articulos(nombre, pvp, stock) values("Smart TV 52", 453.85, 92);
insert into articulos(nombre, pvp, stock) values("SSD 512GB", 123.45, 2);
-- ------------------------------------------------------------
create table articulos1(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) unique not null,
    pvp decimal(6,2) not null,
    stock INT UNSIGNED default 0,
    imagen varchar(100) default "./img/default.jpg"
);

insert into articulos1(nombre, pvp, stock) values("Monitor 19", 123.45, 12);
insert into articulos1(nombre, pvp, stock) values("Raton USB", 23.95, 13);
insert into articulos1(nombre, pvp, stock) values("USB 512GB", 123.45, 14);
insert into articulos1(nombre, pvp, stock) values("USB 8GB", 12.45, 14);
insert into articulos1(nombre, pvp, stock) values("SET LAPICEROS", 13.15, 32);
insert into articulos1(nombre, pvp, stock) values("Stick Wifi", 23, 62);
insert into articulos1(nombre, pvp, stock) values("Funda 17", 13.4, 92);
insert into articulos1(nombre, pvp, stock) values("Monitor 22", 193.65, 2);
insert into articulos1(nombre, pvp, stock) values("Smart TV 52", 453.85, 92);
insert into articulos1(nombre, pvp, stock) values("SSD 512GB", 123.45, 2);
-- ------------------------------------------------------------
create table articulos2(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) unique not null,
    pvp decimal(6,2) not null,
    stock INT UNSIGNED default 0,
    imagen varchar(100) default "./img/default.jpg"
);

insert into articulos2(nombre, pvp, stock) values("Monitor 19", 123.45, 12);
insert into articulos2(nombre, pvp, stock) values("Raton USB", 23.95, 13);
insert into articulos2(nombre, pvp, stock) values("USB 512GB", 123.45, 14);
insert into articulos2(nombre, pvp, stock) values("USB 8GB", 12.45, 14);
insert into articulos2(nombre, pvp, stock) values("SET LAPICEROS", 13.15, 32);
insert into articulos2(nombre, pvp, stock) values("Stick Wifi", 23, 62);
insert into articulos2(nombre, pvp, stock) values("Funda 17", 13.4, 92);
insert into articulos2(nombre, pvp, stock) values("Monitor 22", 193.65, 2);
insert into articulos2(nombre, pvp, stock) values("Smart TV 52", 453.85, 92);
insert into articulos2(nombre, pvp, stock) values("SSD 512GB", 123.45, 2);
-- ------------------------------------------------------------
create table articulos4(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) unique not null,
    pvp decimal(6,2) not null,
    stock INT UNSIGNED default 0,
    imagen varchar(100) default "./img/default.jpg"
);

insert into articulos4(nombre, pvp, stock) values("Monitor 19", 123.45, 12);
insert into articulos4(nombre, pvp, stock) values("Raton USB", 23.95, 13);
insert into articulos4(nombre, pvp, stock) values("USB 512GB", 123.45, 14);
insert into articulos4(nombre, pvp, stock) values("USB 8GB", 12.45, 14);
insert into articulos4(nombre, pvp, stock) values("SET LAPICEROS", 13.15, 32);
insert into articulos4(nombre, pvp, stock) values("Stick Wifi", 23, 62);
insert into articulos4(nombre, pvp, stock) values("Funda 17", 13.4, 92);
insert into articulos4(nombre, pvp, stock) values("Monitor 22", 193.65, 2);
insert into articulos4(nombre, pvp, stock) values("Smart TV 52", 453.85, 92);
insert into articulos4(nombre, pvp, stock) values("SSD 512GB", 123.45, 2);
-- -----------------------------------------------------------
create table articulos5(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) unique not null,
    pvp decimal(6,2) not null,
    stock INT UNSIGNED default 0,
    imagen varchar(100) default "./img/default.jpg"
);

insert into articulos5(nombre, pvp, stock) values("Monitor 19", 123.45, 12);
insert into articulos5(nombre, pvp, stock) values("Raton USB", 23.95, 13);
insert into articulos5(nombre, pvp, stock) values("USB 512GB", 123.45, 14);
insert into articulos5(nombre, pvp, stock) values("USB 8GB", 12.45, 14);
insert into articulos5(nombre, pvp, stock) values("SET LAPICEROS", 13.15, 32);
insert into articulos5(nombre, pvp, stock) values("Stick Wifi", 23, 62);
insert into articulos5(nombre, pvp, stock) values("Funda 17", 13.4, 92);
insert into articulos5(nombre, pvp, stock) values("Monitor 22", 193.65, 2);
insert into articulos5(nombre, pvp, stock) values("Smart TV 52", 453.85, 92);
insert into articulos5(nombre, pvp, stock) values("SSD 512GB", 123.45, 2);
-- ------------------------------------------------------------
create table articulos6(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) unique not null,
    pvp decimal(6,2) not null,
    stock INT UNSIGNED default 0,
    imagen varchar(100) default "./img/default.jpg"
);

insert into articulos6(nombre, pvp, stock) values("Monitor 19", 123.45, 12);
insert into articulos6(nombre, pvp, stock) values("Raton USB", 23.95, 13);
insert into articulos6(nombre, pvp, stock) values("USB 512GB", 123.45, 14);
insert into articulos6(nombre, pvp, stock) values("USB 8GB", 12.45, 14);
insert into articulos6(nombre, pvp, stock) values("SET LAPICEROS", 13.15, 32);
insert into articulos6(nombre, pvp, stock) values("Stick Wifi", 23, 62);
insert into articulos6(nombre, pvp, stock) values("Funda 17", 13.4, 92);
insert into articulos6(nombre, pvp, stock) values("Monitor 22", 193.65, 2);
insert into articulos6(nombre, pvp, stock) values("Smart TV 52", 453.85, 92);
insert into articulos6(nombre, pvp, stock) values("SSD 512GB", 123.45, 2);
-- ------------------------------------------------------------
create table articulos7(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) unique not null,
    pvp decimal(6,2) not null,
    stock INT UNSIGNED default 0,
    imagen varchar(100) default "./img/default.jpg"
);

insert into articulos7(nombre, pvp, stock) values("Monitor 19", 123.45, 12);
insert into articulos7(nombre, pvp, stock) values("Raton USB", 23.95, 13);
insert into articulos7(nombre, pvp, stock) values("USB 512GB", 123.45, 14);
insert into articulos7(nombre, pvp, stock) values("USB 8GB", 12.45, 14);
insert into articulos7(nombre, pvp, stock) values("SET LAPICEROS", 13.15, 32);
insert into articulos7(nombre, pvp, stock) values("Stick Wifi", 23, 62);
insert into articulos7(nombre, pvp, stock) values("Funda 17", 13.4, 92);
insert into articulos7(nombre, pvp, stock) values("Monitor 22", 193.65, 2);
insert into articulos7(nombre, pvp, stock) values("Smart TV 52", 453.85, 92);
insert into articulos7(nombre, pvp, stock) values("SSD 512GB", 123.45, 2);
-- ------------------------------------------------------------
create table articulos8(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) unique not null,
    pvp decimal(6,2) not null,
    stock INT UNSIGNED default 0,
    imagen varchar(100) default "./img/default.jpg"
);

insert into articulos8(nombre, pvp, stock) values("Monitor 19", 123.45, 12);
insert into articulos8(nombre, pvp, stock) values("Raton USB", 23.95, 13);
insert into articulos8(nombre, pvp, stock) values("USB 512GB", 123.45, 14);
insert into articulos8(nombre, pvp, stock) values("USB 8GB", 12.45, 14);
insert into articulos8(nombre, pvp, stock) values("SET LAPICEROS", 13.15, 32);
insert into articulos8(nombre, pvp, stock) values("Stick Wifi", 23, 62);
insert into articulos8(nombre, pvp, stock) values("Funda 17", 13.4, 92);
insert into articulos8(nombre, pvp, stock) values("Monitor 22", 193.65, 2);
insert into articulos8(nombre, pvp, stock) values("Smart TV 52", 453.85, 92);
insert into articulos8(nombre, pvp, stock) values("SSD 512GB", 123.45, 2);
-- ------------------------------------------------------------
create table articulos9(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) unique not null,
    pvp decimal(6,2) not null,
    stock INT UNSIGNED default 0,
    imagen varchar(100) default "./img/default.jpg"
);

insert into articulos9(nombre, pvp, stock) values("Monitor 19", 123.45, 12);
insert into articulos9(nombre, pvp, stock) values("Raton USB", 23.95, 13);
insert into articulos9(nombre, pvp, stock) values("USB 512GB", 123.45, 14);
insert into articulos9(nombre, pvp, stock) values("USB 8GB", 12.45, 14);
insert into articulos9(nombre, pvp, stock) values("SET LAPICEROS", 13.15, 32);
insert into articulos9(nombre, pvp, stock) values("Stick Wifi", 23, 62);
insert into articulos9(nombre, pvp, stock) values("Funda 17", 13.4, 92);
insert into articulos9(nombre, pvp, stock) values("Monitor 22", 193.65, 2);
insert into articulos9(nombre, pvp, stock) values("Smart TV 52", 453.85, 92);
insert into articulos9(nombre, pvp, stock) values("SSD 512GB", 123.45, 2);
-- ------------------------------------------------------------
create table articulos10(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) unique not null,
    pvp decimal(6,2) not null,
    stock INT UNSIGNED default 0,
    imagen varchar(100) default "./img/default.jpg"
);

insert into articulos10(nombre, pvp, stock) values("Monitor 19", 123.45, 12);
insert into articulos10(nombre, pvp, stock) values("Raton USB", 23.95, 13);
insert into articulos10(nombre, pvp, stock) values("USB 512GB", 123.45, 14);
insert into articulos10(nombre, pvp, stock) values("USB 8GB", 12.45, 14);
insert into articulos10(nombre, pvp, stock) values("SET LAPICEROS", 13.15, 32);
insert into articulos10(nombre, pvp, stock) values("Stick Wifi", 23, 62);
insert into articulos10(nombre, pvp, stock) values("Funda 17", 13.4, 92);
insert into articulos10(nombre, pvp, stock) values("Monitor 22", 193.65, 2);
insert into articulos10(nombre, pvp, stock) values("Smart TV 52", 453.85, 92);
insert into articulos10(nombre, pvp, stock) values("SSD 512GB", 123.45, 2);
-- ------------------------------------------------------------
create table articulos13(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) unique not null,
    pvp decimal(6,2) not null,
    stock INT UNSIGNED default 0,
    imagen varchar(100) default "./img/default.jpg"
);

insert into articulos13(nombre, pvp, stock) values("Monitor 19", 123.45, 12);
insert into articulos13(nombre, pvp, stock) values("Raton USB", 23.95, 13);
insert into articulos13(nombre, pvp, stock) values("USB 512GB", 123.45, 14);
insert into articulos13(nombre, pvp, stock) values("USB 8GB", 12.45, 14);
insert into articulos13(nombre, pvp, stock) values("SET LAPICEROS", 13.15, 32);
insert into articulos13(nombre, pvp, stock) values("Stick Wifi", 23, 62);
insert into articulos13(nombre, pvp, stock) values("Funda 17", 13.4, 92);
insert into articulos13(nombre, pvp, stock) values("Monitor 22", 193.65, 2);
insert into articulos13(nombre, pvp, stock) values("Smart TV 52", 453.85, 92);
insert into articulos13(nombre, pvp, stock) values("SSD 512GB", 123.45, 2);
-- ------------------------------------------------------------
create table articulos15(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) unique not null,
    pvp decimal(6,2) not null,
    stock INT UNSIGNED default 0,
    imagen varchar(100) default "./img/default.jpg"
);

insert into articulos15(nombre, pvp, stock) values("Monitor 19", 123.45, 12);
insert into articulos15(nombre, pvp, stock) values("Raton USB", 23.95, 13);
insert into articulos15(nombre, pvp, stock) values("USB 512GB", 123.45, 14);
insert into articulos15(nombre, pvp, stock) values("USB 8GB", 12.45, 14);
insert into articulos15(nombre, pvp, stock) values("SET LAPICEROS", 13.15, 32);
insert into articulos15(nombre, pvp, stock) values("Stick Wifi", 23, 62);
insert into articulos15(nombre, pvp, stock) values("Funda 17", 13.4, 92);
insert into articulos15(nombre, pvp, stock) values("Monitor 22", 193.65, 2);
insert into articulos15(nombre, pvp, stock) values("Smart TV 52", 453.85, 92);
insert into articulos15(nombre, pvp, stock) values("SSD 512GB", 123.45, 2);
-- ------------------------------------------------------------
create table articulos23(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) unique not null,
    pvp decimal(6,2) not null,
    stock INT UNSIGNED default 0,
    imagen varchar(100) default "./img/default.jpg"
);

insert into articulos23(nombre, pvp, stock) values("Monitor 19", 123.45, 12);
insert into articulos23(nombre, pvp, stock) values("Raton USB", 23.95, 13);
insert into articulos23(nombre, pvp, stock) values("USB 512GB", 123.45, 14);
insert into articulos23(nombre, pvp, stock) values("USB 8GB", 12.45, 14);
insert into articulos23(nombre, pvp, stock) values("SET LAPICEROS", 13.15, 32);
insert into articulos23(nombre, pvp, stock) values("Stick Wifi", 23, 62);
insert into articulos23(nombre, pvp, stock) values("Funda 17", 13.4, 92);
insert into articulos23(nombre, pvp, stock) values("Monitor 22", 193.65, 2);
insert into articulos23(nombre, pvp, stock) values("Smart TV 52", 453.85, 92);
insert into articulos23(nombre, pvp, stock) values("SSD 512GB", 123.45, 2);
