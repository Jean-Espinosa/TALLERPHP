Create database Transporte_publico;
use Transporte_publico;

create table conductor
(
	Id int auto_increment primary key,
    Documento varchar(15) unique not null,
    Nombre varchar (30) not null,
    Apellido varchar (30) not null,
    Telefono varchar (15) not null,
    Direccion varchar (60)not null
);

create table contrato
(
	Id int auto_increment primary key,
    Conductor int,
    Fecha_Inicio date,
    Fecha_Terminacion date,
    Valor_Contrato real,
    Foreign key (Conductor) References conductor(Id)
);
create table bus
(
	Id int auto_increment primary key,
    Nombre varchar (30),
    Placa varchar (7) unique,
    Modelo varchar (6),
    Conductor_asignado int unique,
    Foreign key (Conductor_asignado) references conductor(Id)
);

create table ruta
(
	Id int auto_increment primary key,
    Origen varchar (30),
    Destino varchar (30),
    Bus_asignado int,
    Foreign key (Bus_asignado) references bus (Id)
);

insert into conductor() values(null,"123456789","rr","dd","3216547894","prueba");
insert into conductor() values(null,"987654321","ss","daad","3254651020","prueba 2");

insert into contrato() values(null,1,"2000-10-15","2005-08-20",5000000);

insert into bus() values (null,"prueba","abc 123","2000","1");
insert into bus() values (2,"prueba2","dda 456","2002","2");

insert into ruta() values (null,"Guacamayas","Americas","1");
insert into ruta() values (2,"Libertadores","Centro","1");
