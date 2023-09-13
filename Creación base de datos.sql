CREATE DATABASE cafeteria
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Spanish_Colombia.1252'
    LC_CTYPE = 'Spanish_Colombia.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;

USE cafeteria;

CREATE TABLE Productos (
	ID serial primary key,
	Nombre varchar(50) not null unique,
	Precio integer not null,
	Peso integer not null,
	Categoría varchar(50) not null,
	Stock integer not null,
	Fecha_creación date not null 
);

CREATE TABLE Ventas (
	ID_VENTA serial primary key,
	ID_Producto integer not null,
	Cantidad_vendida integer not null
);

ALTER TABLE ventas
ADD CONSTRAINT id_producto
FOREIGN KEY(id_producto)
REFERENCES productos(id);


INSERT INTO productos (nombre,peso,precio,categoria,stock,fecha_creacion) VALUES ('GALLETAS',20,1500,'MEKATOS',10, NOW());
INSERT INTO productos (nombre,peso,precio,categoria,stock,fecha_creacion) VALUES ('PAPITA',20,2000,'MEKATOS',10, NOW());
INSERT INTO productos (nombre,peso,precio,categoria,stock,fecha_creacion) VALUES ('CAFE PERICO',20,700,'CAFE',30, NOW());
INSERT INTO productos (nombre,peso,precio,categoria,stock,fecha_creacion) VALUES ('PAN',20,3000,'PANADERIA',15, NOW());
INSERT INTO productos (nombre,peso,precio,categoria,stock,fecha_creacion) VALUES ('BUÑUELOS',20,1000,'COMIDAS RAPIDAS',20, NOW());
INSERT INTO productos (nombre,peso,precio,categoria,stock,fecha_creacion) VALUES ('EMPANADAS',20,1500,'COMIDAS RAPIDAS',1, NOW());
INSERT INTO productos (nombre,peso,precio,categoria,stock,fecha_creacion) VALUES ('PASTEL DE POLLO',20,2000,'COMIDAS RAPIDAS',2, NOW());