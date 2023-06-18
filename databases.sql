CREATE DATABASE  alquilartemis_grupo;



CREATE TABLE empleados(
    idEmpleado INT PRIMARY KEY AUTO_INCREMENT,
    nombreEmpleado VARCHAR(200) NOT NULL,
    celularEmpleado INT(50) NOT NULL,
    direccionEmpleado VARCHAR(200) NOT NULL
);

CREATE TABLE clientes(
    idCliente INT PRIMARY KEY AUTO_INCREMENT,
    nombreCliente VARCHAR (200) NOT NULL,
    celularCliente INT (50) NOT NULL,
    obraCliente VARCHAR (200) NOT NULL
);

CREATE TABLE productos(
    idProducto INT PRIMARY KEY AUTO_INCREMENT,
    nombreProducto VARCHAR (200) NOT NULL,
    precioProducto INT (50) NOT NULL
);

CREATE TABLE salida(
    idSalida INT PRIMARY KEY AUTO_INCREMENT,
    idCliente INT,
    idEmpleado INT,
    fechaSalida VARCHAR (200) NOT NULL,
    horaSalida VARCHAR (200) NOT NULL,
    subtotalPeso INT,
    placaTransporte VARCHAR (200) NOT NULL,
    observaciones VARCHAR (200) NOT NULL,
    FOREIGN KEY (idCliente) REFERENCES clientes(idCliente),
    FOREIGN KEY (idEmpleado) REFERENCES empleados(idEmpleado)
);

CREATE TABLE salidaDetalle(
    idSalidaDetalle INT PRIMARY KEY AUTO_INCREMENT,
    idSalida INT,
    idProducto INT,
    idCliente INT,
    idEmpleado INT,
    cantidadSalida VARCHAR (200) NOT NULL,
    cantidadPropia INT,
    cantidadSubalquilada INT,
    valorUnidad INT,
    fechaStandBye VARCHAR (200) NOT NULL,
    estado VARCHAR (200) NOT NULL,
    valorTotal INT,
    FOREIGN KEY (idSalida) REFERENCES salida(idSalida),
    FOREIGN KEY (idCliente) REFERENCES clientes(idCliente),
    FOREIGN KEY (idEmpleado) REFERENCES empleados(idEmpleado),
    FOREIGN KEY (idProducto) REFERENCES productos(idProducto)
);

CREATE TABLE entrada(
    idEntrada INT PRIMARY KEY AUTO_INCREMENT,
    idSalida INT,
    idCliente INT,
    idEmpleado INT,
    fechaEntrada VARCHAR (200) NOT NULL,
    horaEntrada VARCHAR (200) NOT NULL,
    observaciones VARCHAR (200) NOT NULL,
    FOREIGN KEY (idSalida) REFERENCES salida(idSalida),
    FOREIGN KEY (idCliente) REFERENCES clientes(idCliente),
    FOREIGN KEY (idEmpleado) REFERENCES empleados(idEmpleado)
);

CREATE TABLE entradaDetalle(
    idEntradaDetalle INT PRIMARY KEY AUTO_INCREMENT,
    idEntrada INT,
    idProducto INT,
    idCliente INT,
    entradaCantidad VARCHAR (200) NOT NULL,
    entradaCantidadPropia VARCHAR (200) NOT NULL,
    entradaCantidadSubalquilada VARCHAR (200) NOT NULL,
    estado VARCHAR (200) NOT NULL,
    FOREIGN KEY (idEntrada) REFERENCES entrada(idEntrada),
    FOREIGN KEY (idProducto) REFERENCES productos(idProducto),
    FOREIGN KEY (idCliente) REFERENCES clientes(idCliente)
);

CREATE TABLE inventario(
    idInventario INT PRIMARY KEY AUTO_INCREMENT,
    idProducto INT,
    CantidadInicial INT,
    CantidadIngresos INT,
    CantidadSalidas INT,
    CantidadFinal INT,
    FechaInventario VARCHAR (200) NOT NULL,
    TipoOperacion VARCHAR (200) NOT NULL,
    FOREIGN KEY (idProducto) REFERENCES productos(idProducto)
);