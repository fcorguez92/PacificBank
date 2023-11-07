drop database if exists bank;
create database bank;
use bank;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    contraseña VARCHAR(255) NOT NULL,
    saldo DECIMAL(10, 2) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserción de usuarios de muestra
INSERT INTO usuarios (nombre, contraseña, saldo) VALUES ('usuario1', 'contraseña1', 1500.00);
INSERT INTO usuarios (nombre, contraseña, saldo) VALUES ('usuario2', 'contraseña2', 2000.00);
INSERT INTO usuarios (nombre, contraseña, saldo) VALUES ('usuario3', 'contraseña3', 3000.00);
INSERT INTO usuarios (nombre, contraseña, saldo) VALUES ('usuario4', 'contraseña4', 2500.00);
INSERT INTO usuarios (nombre, contraseña, saldo) VALUES ('usuario5', 'contraseña5', 1800.00);
