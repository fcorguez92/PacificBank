drop database if exists pacificbank;

create database pacificbank;

use pacificbank;

CREATE TABLE Usuarios (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(255) NOT NULL,
    Pass VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    UserType ENUM('Normal', 'Administrador') DEFAULT 'Normal'
);

CREATE TABLE CueNtas (
    ID INT PRIMARY KEY,
    UsuarioID INT,
    IBAN VARChAR(30) NOT NULL,
    SalDo DECIMAL(10,2) DEFAULT 0.00,
    FOREIGN KEY (UsuarioID) REFERENCES Usuarios(ID)
);

CREATE TABLE Prestamos (
    ID INT PRIMARY KEY,
    UsuarioID INT,
    Monto DECIMAL(10,2) NOT NULL,
    TasaInteres DECIMAL(5,2) NOT NULL,
    CuotasTotales INT NOT NULL,
    CuotasRestantes INT NOT NULL,
    FOREIGN KEY (UsuarioID) REFERENCES Usuarios(ID)
);

CREATE TABLE Transacciones (
    ID INT PRIMARY KEY,
    UsuarioRemitenteID INT,
    UsuarioDestinatarioID INT,
    Monto DECIMAL(10,2) NOT NULL,
    FechaTransaccion DATE NOT NULL,
    FOREIGN KEY (UsuarioRemitenteID) REFERENCES Usuarios(ID),
    FOREIGN KEY (UsuarioDestinatarioID) REFERENCES Usuarios(ID)
);

-- Insertar Usuarios
INSERT INTO Usuarios (Username, Pass, Email, UserType)
VALUES
    ('admin', 'Admin1234','admin@admin.admin' , 'Administrador'),
	('usuario1', '6985','aa@bb.com' , 'Normal'),
    ('usuario2', 'antinomia','bb@aa.com' , 'Normal'),
    ('usuario3', 'zonya','cc@dd.com' , 'Normal'),
    ('usuario4', 'tlaxalteco','dd@cc.com' , 'Normal');

-- Insertar Cuentas asociadas a los Usuarios
INSERT INTO Cuentas (ID, UsuarioID, IBAN, Saldo)
VALUES
    (1, 1, 'ES1234567890123456789012', 10000.00),
    (2, 2, 'ES2345678901234567890123', 5000.00),
    (3, 3, 'ES3456789012345678901234', 7000.00),
    (4, 4, 'ES4567890123456789012345', 3000.00),
    (5, 5, 'ES5678901234567890123456', 9000.00);

-- Insertar Préstamos asociados a los Usuarios
INSERT INTO Prestamos (ID, UsuarioID, Monto, TasaInteres, CuotasTotales, CuotasRestantes)
VALUES
    (1, 2, 2000.00, 0.05, 12, 12),
    (2, 3, 5000.00, 0.08, 24, 24),
    (3, 4, 1000.00, 0.03, 6, 6),
    (4, 5, 3000.00, 0.06, 18, 18),
    (5, 2, 1500.00, 0.07, 10, 10);

-- Insertar Transacciones entre Usuarios
INSERT INTO Transacciones (ID, UsuarioRemitenteID, UsuarioDestinatarioID, Monto, FechaTransaccion)
VALUES
    (1, 2, 3, 500.00, '2023-01-01'),
    (2, 4, 5, 1000.00, '2023-02-15'),
    (3, 1, 2, 200.00, '2023-03-10'),
    (4, 3, 5, 700.00, '2023-04-05'),
    (5, 2, 4, 300.00, '2023-05-20');
