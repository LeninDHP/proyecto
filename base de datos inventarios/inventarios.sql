CREATE DATABASE inventarios
USE inventarios




CREATE TABLE cargo(
id_cargo CHAR(5) PRIMARY KEY,
cargo VARCHAR(30),
sueldo decimal(10,2)
)


CREATE TABLE bodega(
id_bodega CHAR(5) PRIMARY KEY,
nombre_bodega VARCHAR(30),
direccion_bodega VARCHAR(50),
telefono_bodega VARCHAR(30)
)

CREATE TABLE producto(
id_producto CHAR(5) PRIMARY KEY,
nombre_producto VARCHAR(30),
cantidad DEC(8,2),
precio_unitario decimal(10,2),
id_bodega CHAR(5),
FOREIGN KEY(id_bodega) REFERENCES bodega (id_bodega)
)

CREATE TABLE empleado(
id_empleado CHAR(5) PRIMARY KEY,
usuario VARCHAR(30),
contrasena varchar(30),
verificar varchar(30),
correo_empleado VARCHAR(30),
nombre_empleado VARCHAR(30),
apellido_empleado VARCHAR(30),
direccion varchar(50),
telefono varchar(30),
fecha_ingreso DATE,
fecha_salida DATE,
activo_e VARCHAR(30),
id_cargo CHAR(5),
id_bodega CHAR(5),
FOREIGN KEY(id_cargo) REFERENCES cargo (id_cargo),
FOREIGN KEY(id_bodega) REFERENCES bodega (id_bodega)
)


CREATE TABLE cliente(
id_cliente CHAR(5) PRIMARY KEY,
ruc_cliente VARCHAR(30),
nom_cliente VARCHAR(30),
ape_cliente VARCHAR(30),
dir_cliente VARCHAR(30),
telefono_cliente VARCHAR(30)
)

CREATE TABLE facturas(
id_factura CHAR(5) PRIMARY KEY,
fecha_fac DATE,
valor_fac decimal (10,2),
id_cliente CHAR(5),
FOREIGN KEY(id_cliente) REFERENCES cliente (id_cliente)
)



CREATE TABLE detalle(
id_detalle int PRIMARY KEY IDENTITY(1,1),
cantidad DEC(8,2),
tipo_det VARCHAR(10),
id_producto CHAR(5),
id_bodega CHAR(5),
id_empleado CHAR(5),
id_factura CHAR(5),
FOREIGN KEY(id_producto) REFERENCES producto (id_producto),
FOREIGN KEY(id_bodega) REFERENCES bodega (id_bodega),
FOREIGN KEY(id_empleado) REFERENCES empleado (id_empleado),
FOREIGN KEY(id_factura) REFERENCES facturas (id_factura)
)

select*from producto
select*from empleado
select*from bodega
select*from cliente
select*from facturas
select*from cargo
select*from detalle


INSERT INTO cargo VALUES('CAR01','Gerente','1000');
INSERT INTO cargo VALUES('CAR02','Bodeguero','600');
INSERT INTO cargo VALUES('CAR03','Vendedor','400');

INSERT INTO bodega VALUES('BOD01','Sucursal Norte','Calderon, Calle Carapungo N55','022824556');
INSERT INTO bodega VALUES('BOD02','Sucursal Centro','Amazonas y Roca N41','022824447');
INSERT INTO bodega VALUES('BOD03','Sucursal Sur','Solanda, Leonidas Carrion N33','02287745478');

select * from empleado 

INSERT INTO empleado VALUES('EMP01','manu2015','manu1357','manu1357','manu@hotmail.com', 'Manuel', 'Ortega', 'Carcdelen', '092134124','09/07/2015', '', 'Vigente', 'CAR01', 'BOD02');

INSERT INTO empleado VALUES('EMP02','alex2015','alex1357','alex1357','alex@hotmail.com', 'Alex', 'Figueroa', 'Carcdelen', '098234234','09/09/2015', '', 'Vigente', 'CAR02', 'BOD02');

INSERT INTO empleado VALUES('EMP03','ligia2015','ligia1357','ligia1357','ligia@hotmail.com', 'Ligia', 'Benavides','Carcdelen', '098212312', '07/09/2015', '', 'Vigente', 'CAR03', 'BOD02');


INSERT INTO producto VALUES('PRO01','martillo electrico','50','150.50', 'BOD02');


INSERT INTO cliente VALUES('CLI01','1725442746','Hector','Zambrano', 'Calderon, Barrio Landazuri', '022854226');


INSERT INTO facturas VALUES('FAC01', '09/07/2015','62.50','CLI01');


INSERT INTO detalle VALUES('5','Salida','PRO01','BOD02','EMP03','FAC01');
INSERT INTO detalle VALUES('10','Salida','PRO01','BOD02','EMP03','FAC01');

select*from producto
select*from facturas
select*from detalle





---------------------------------------------
--triggers
------------------------------------------------
create  trigger tr_InsertarDetalle
on detalle
after insert
as
declare @cantidad decimal(8,2), 
@tipo_det varchar(10), 
@id_producto char(5),
@id_bodega char(5),
@id_empleado char(5),
@id_factura char(5)
select @cantidad = cantidad, 
@tipo_det=tipo_det, 
@id_producto=id_producto,
@id_bodega=id_bodega,
@id_empleado=id_empleado,
@id_factura=id_factura
from inserted
update producto set cantidad=cantidad-@cantidad
where id_producto=@id_producto


------------------------------------------
--MYSQL
----------------------------------------

CREATE TRIGGER tr_InsertarDetalle
ON detalle
FOR INSERT
AS
DECLARE 
@cantidad decimal(8,2), 
@tipo_det varchar(10), 
@id_producto char(5),
@id_bodega char(5),
@id_empleado char(5),
@id_factura char(5)
SELECT @cantidad = cantidad, 
@tipo_det=tipo_det, 
@id_producto=id_producto,
@id_bodega=id_bodega,
@id_empleado=id_empleado,
@id_factura=id_factura
FROM inserted
UPDATE producto set cantidad=cantidad-@cantidad
WHERE id_producto=@id_producto
GO
------------------------------------------------
-----------------------------------------------

use inventarios

--detalle de una factura

SELECT  p.nombre_producto, p.precio_unitario,d.cantidad,f.valor_fac
FROM producto p join detalle d
on p.id_producto = d.id_producto
join facturas f
on f.id_factura=d.id_factura

SELECT f.id_factura, p.nombre_producto, p.precio_unitario,d.cantidad,f.valor_fac, c.nom_cliente,c.ape_cliente, e.nombre_empleado, e.apellido_empleado
FROM producto p join detalle d
on p.id_producto = d.id_producto
join empleado e
on e.id_empleado = d.id_empleado
join facturas f
on f.id_factura=d.id_factura
join cliente c
on c.id_cliente =f.id_cliente

--------------------------------------------------------

SELECT f.id_factura, p.nombre_producto, p.precio_unitario,d.cantidad,f.valor_fac, c.nom_cliente,c.ape_cliente, e.nombre_empleado, e.apellido_empleado
FROM producto p join detalle d
on p.id_producto = d.id_producto
join facturas f
on f.id_factura=d.id_factura
join cliente c
on c.id_cliente =f.id_cliente
join empleado e
on e.id_empleado = d.id_empleado

---------------------------------------------------------------------------

select*from cliente
select*from facturas

select*from empleado
select*from bodega

SELECT  e.id_empleado, e.usuario, b.nombre_bodega,e.nombre_empleado, e.apellido_empleado,c.cargo, e.correo_empleado,e.direccion, e.telefono, e.fecha_ingreso, fecha_salida
FROM  bodega b join empleado e 
on b.id_bodega = e.id_bodega
join cargo c
on c.id_cargo=e.id_cargo

SELECT  e.id_empleado, e.usuario, b.nombre_bodega,e.nombre_empleado, e.apellido_empleado,c.cargo, e.correo_empleado,e.direccion, e.telefono, e.fecha_ingreso, fecha_salida
FROM  bodega b join empleado e 
on b.id_bodega = e.id_bodega
join cargo c
on c.id_cargo=e.id_cargo



select *from cliente
select * from bodega
select * from empleado
select*from cargo
-----------------------------------------------------
SELECT f.id_factura, c.ruc_cliente, c.nom_cliente, c.ape_cliente, c.dir_cliente, c.telefono_cliente, p.nombre_producto, p.precio_unitario,d.cantidad,f.valor_fac, b.nombre_bodega, e.nombre_empleado, e.apellido_empleado, f.fecha_fac, d.tipo_det
FROM producto p join detalle d
on p.id_producto = d.id_producto
join empleado e
on e.id_empleado = d.id_empleado
join bodega b
on e.id_bodega= b.id_bodega
join facturas f
on f.id_factura=d.id_factura
join cliente c
on c.id_cliente = f.id_cliente
WHERE e.id_empleado = 'EMP03'

---------------------------------------------------
SELECT nombre_producto FROM producto

Select TOP 1* from empleado
order by id_empleado DESC 

select*from cargo
select*from empleado

SELECT f.id_factura, c.ruc_cliente,b.direccion_bodega,b.telefono_bodega, 
                c.nom_cliente, c.ape_cliente, c.dir_cliente, c.telefono_cliente, p.nombre_producto, 
                p.precio_unitario,d.cantidad,f.valor_fac, b.nombre_bodega, e.nombre_empleado, 
                e.apellido_empleado, f.fecha_fac, d.tipo_det, e.telefono, e.usuario, e.contrasena,
                e.correo_empleado, e.fecha_ingreso, e.fecha_salida,e.activo_e, ca.cargo, ca.sueldo
                FROM producto p join detalle d
                on p.id_producto = d.id_producto
                join empleado e
                on e.id_empleado = d.id_empleado
                join bodega b
                on e.id_bodega= b.id_bodega
                join facturas f
				on f.id_factura=d.id_factura
                join cliente c
                on c.id_cliente = f.id_cliente
                join cargo ca
                on ca.id_cargo = e.id_cargo
                
                where e.id_empleado = 'EMP03'
-------------------------------------------------



SELECT b.direccion_bodega,b.telefono_bodega, e.direccion, b.nombre_bodega, e.nombre_empleado, 
                e.apellido_empleado, e.telefono, e.usuario, e.contrasena,
                e.correo_empleado, e.fecha_ingreso, e.fecha_salida,e.activo_e, ca.cargo, ca.sueldo
                FROM empleado e join bodega b
                on e.id_bodega= b.id_bodega
                join cargo ca
                on ca.id_cargo = e.id_cargo
                where e.id_empleado = 'EMP01'
                
                SELECT f.id_factura,b.id_bodega,c.id_cliente, e.id_empleado, 
                nom_cliente, ape_cliente, telefono_cliente,
                f.valor_fac, nombre_bodega, nombre_empleado, apellido_empleado, f.fecha_fac, 
                d.tipo_det
                FROM producto p join detalle d
                on p.id_producto = d.id_producto
                join empleado e
                on e.id_empleado = d.id_empleado
                join bodega b
                on e.id_bodega= b.id_bodega
                join facturas f
                on f.id_factura=d.id_factura
                join cliente c
                on c.id_cliente = f.id_cliente
                group by f.id_factura,b.id_bodega,c.id_cliente, e.id_empleado, 
                nom_cliente, ape_cliente, telefono_cliente,
                f.valor_fac, nombre_bodega, nombre_empleado, apellido_empleado, f.fecha_fac, 
                d.tipo_det
                
                
                
                SELECT f.id_factura, c.ruc_cliente,b.direccion_bodega,b.telefono_bodega, 
  c.nom_cliente, c.ape_cliente, c.dir_cliente, c.telefono_cliente, p.nombre_producto, 
  p.precio_unitario,d.cantidad,f.valor_fac, b.nombre_bodega, e.nombre_empleado, 
  e.apellido_empleado, f.fecha_fac, d.tipo_det, e.telefono
FROM producto p join detalle d
on p.id_producto = d.id_producto
join empleado e
on e.id_empleado = d.id_empleado
join bodega b
on e.id_bodega= b.id_bodega
join facturas f
on f.id_factura=d.id_factura
join cliente c
on c.id_cliente = f.id_cliente
WHERE f.id_factura = 'FAC01'


SELECT * FROM empleado ORDER BY id_empleado DESC LIMIT 1


select facturas, substring(id_factura,3)

SELECT SUBSTRing (id_factura, 4,6)as 'factura' FROM facturas