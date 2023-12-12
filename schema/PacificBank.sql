-- Crear la base de datos
DROP DATABASE IF EXISTS pacificbank;
CREATE DATABASE pacificbank;
USE pacificbank;

-- Crear la tabla Usuarios con ID AUTO_INCREMENT
CREATE TABLE Usuarios (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(255) NOT NULL,
    Pass VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    UserType ENUM('Normal', 'Administrador') DEFAULT 'Normal',
    ImagenPerfil VARCHAR(255),
    Moneda VARCHAR(3) DEFAULT 'EUR'
);

-- Crear la tabla Cuentas con ID AUTO_INCREMENT
CREATE TABLE Cuentas (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    UsuarioID INT,
    IBAN VARChAR(30) NOT NULL,
    Saldo DECIMAL(10,2) DEFAULT 0.00,
    FOREIGN KEY (UsuarioID) REFERENCES Usuarios(ID)
);

-- Crear la tabla Prestamos con ID AUTO_INCREMENT
CREATE TABLE Prestamos (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    UsuarioID INT,
    Monto DECIMAL(10,2) NOT NULL,
    TasaInteres DECIMAL(5,2) NOT NULL,
    CuotasTotales INT NOT NULL,
    CuotasRestantes INT NOT NULL,
    Motivo VARCHAR(255),
    FOREIGN KEY (UsuarioID) REFERENCES Usuarios(ID)
);

-- Crear la tabla Transacciones con ID AUTO_INCREMENT
CREATE TABLE Transacciones (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    UsuarioRemitenteID INT,
    UsuarioDestinatarioID INT,
    Monto DECIMAL(10,2) NOT NULL,
    FechaTransaccion DATE NOT NULL,
    FOREIGN KEY (UsuarioRemitenteID) REFERENCES Usuarios(ID),
    FOREIGN KEY (UsuarioDestinatarioID) REFERENCES Usuarios(ID)
);

-- Insertar Usuarios sin ID y ajustar valores
INSERT INTO Usuarios (Username, Pass, Email, UserType)
VALUES
    ('admin', 'Admin1234','admin@admin.admin' , 'Administrador'),
	('usuario1', '6985','aa@bb.com' , 'Normal'),
    ('usuario2', 'antinomia','bb@aa.com' , 'Normal'),
    ('usuario3', 'zonya','cc@dd.com' , 'Normal'),
    ('usuario4', 'tlaxalteco','dd@cc.com' , 'Normal');

-- Insertar Cuentas asociadas a los Usuarios sin ID
INSERT INTO Cuentas (UsuarioID, IBAN, Saldo)
VALUES
    (1, 'ES1234567890123456789012', 10000.00),
    (2, 'ES2345678901234567890123', 5000.00),
    (3, 'ES3456789012345678901234', 7000.00),
    (4, 'ES4567890123456789012345', 3000.00),
    (5, 'ES5678901234567890123456', 9000.00);

-- Insertar Préstamos asociados a los Usuarios sin ID
INSERT INTO Prestamos (UsuarioID, Monto, TasaInteres, CuotasTotales, Motivo, CuotasRestantes)
VALUES
    (2, 2000.00, 0.05, 12, 'Motivo1', 12),
    (3, 5000.00, 0.08, 24, 'Motivo2', 24),
    (4, 1000.00, 0.03, 6, 'Motivo3', 6),
    (5, 3000.00, 0.06, 18, 'Motivo4', 18),
    (2, 1500.00, 0.07, 10, 'Motivo5', 10);

-- Insertar Transacciones entre Usuarios sin ID
INSERT INTO Transacciones (UsuarioRemitenteID, UsuarioDestinatarioID, Monto, FechaTransaccion)
VALUES
    (2, 3, 500.00, '2023-01-01'),
    (4, 5, 1000.00, '2023-02-15'),
    (1, 2, 200.00, '2023-03-10'),
    (3, 5, 700.00, '2023-04-05'),
    (2, 4, 300.00, '2023-05-20');
