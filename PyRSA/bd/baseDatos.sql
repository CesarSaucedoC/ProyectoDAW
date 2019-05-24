create database pyrsa;

use pyrsa;

create table ubicacion(
idUbicacion int (3) not null,
subestacion varchar (3) not null,
voltSist varchar (3),
sitio varchar (15),
constraint PK_idUbicacion  primary key (idUbicacion)
);

create table usuario(
rpe varchar (5) not null,
pwd varchar (50) not null,
nombre varchar (40) not null,
paterno varchar (15) not null,
materno varchar (15) not null,
puesto varchar (15) not null,
estado varchar (15),
correo varchar (50),
constraint PK_rpe primary key (rpe)
);

create table mantenimiento(
fecha date not null,
licencia int (4) not null,
ubicacion int (3) not null,
rim int (3) not null,
necesidad int (5),
coment varchar (1000),
anormal varchar(2),
estado varchar (20),
registro varchar (13),
constraint PK_licencia primary key (fecha, licencia),
constraint FK_ubicacionMtto foreign key (ubicacion) references ubicacion(idUbicacion)
);

create table actividad(
ordenTrabajo int (12) not null,
ubicacion int (3)not null,
fecha date,
tipoAct varchar (15) not null,
tipoMtto varchar (10) not null,
descripcion varchar (200),
constraint PK_ordenTrabajo  primary key (ordenTrabajo),
constraint FK_ubicacionAct foreign key (ubicacion) references ubicacion(idUbicacion)
);

create table necesidad(
idNecesidad int (5) not null,
ordenTrabajo int (12) not null,
tipo varchar (15),
disponible varchar (2),
fechaSolicitud date,
estado varchar (20),
comentario varchar (100),
constraint PK_necesidad primary key (idNecesidad),
constraint FK_actividadNec foreign key (ordenTrabajo) references actividad(ordenTrabajo)
);

create table inventario(
r3 int (9) not null,
ubicacion int (3) not null,
equipo varchar (50) not null,
contrasena varchar (50),
usuario varchar (50),
acceso varchar (50),
marca varchar (50),
modelo varchar (50),
nSerie varchar(30),
constraint PK_r3 primary key (r3),
constraint FK_ubicaccionInv foreign key(ubicacion) references ubicacion(idUbicacion)
);

create table mttoUsr(
rpe varchar (5) not null,
fecha date not null,
licencia int (4) not null,
constraint FK_rpe foreign key (rpe) references usuario(rpe),
constraint FK_fechalic_mttoUsr foreign key (fecha, licencia) references mantenimiento(fecha, licencia)
);

create table actInv(
ordenTrabajo int (12) not null,
r3 int (9) not null,
constraint FK_ordenTrabajo_actInv foreign key (ordenTrabajo) references actividad(ordenTrabajo),
constraint FK_r3_actInv foreign key (r3) references inventario(r3)
);

create table mttoAct(
fecha date not null,
licencia int (4) not null,
ordenTrabajo int (12) not null,
constraint FK_ordenTrabajo_mttoAct foreign key (ordenTrabajo) references actividad(ordenTrabajo),
constraint FK_fechalic_mttoAct foreign key (fecha, licencia) references mantenimiento(fecha, licencia)
);

create table mttoInv(
fecha date not null,
licencia int (4)not null,
r3 int (9)not null,
constraint FK_r3_mttoInv foreign key (r3) references inventario(r3),
constraint FK_fechalic_mttoInv foreign key (fecha, licencia) references mantenimiento(fecha, licencia)
);
alter table inventario add nSerie varchar(30);

delete from usuario where rpe = '9B1U3';

insert into usuario values('9B1U3',md5('9B1U3'),'Cesar','Saucedo','Cordova','Tecnico','Activo','cesar.saucedo@cfe.gob.mx');

select * from usuario;

select * from usuario where rpe = '9B1U3' and pwd='b2929ce0d75d640b50544b142e7c1919';