Create database Transporte_publico;
use Transporte_publico;

create table empleado
(
	Id int auto_increment primary key,
    Documento varchar(15) unique not null,
    Nombre varchar (30) not null,
    Apellido varchar (30) not null,
    Telefono varchar (15) not null,
    Direccion varchar (60)not null
);
create table usuario
(
	Id int auto_increment primary key,
    Usuario varchar (30) not null unique,
    Clave varchar(30),
    Cargo varchar (30),
    Empleado int unique,
    Foreign key (Empleado) References empleado(Id)
);

create table contrato
(
	Id int auto_increment primary key,
    Conductor int,
    Fecha_Inicio date,
    Fecha_Terminacion date,
    Valor_Contrato real,
    Foreign key (Conductor) References empleado(Id)
);
create table bus
(
	Id int auto_increment primary key,
    Nombre varchar (30),
    Placa varchar (7) unique,
    Modelo varchar (6),
    Conductor_asignado int unique,
    Foreign key (Conductor_asignado) references empleado(Id)
);

create table ruta
(
	Id int auto_increment primary key,
    Origen varchar (30),
    Destino varchar (30),
    Bus_asignado int,
    Foreign key (Bus_asignado) references bus (Id)
);

insert into empleado() values(null,"123456789","rr","dd","3216547894","prueba");
insert into empleado() values(null,"987654321","ss","daad","3254651020","prueba 2");
insert into empleado() values(null,"300058745","qwe","opop","3007278855","prueba 3");
insert into empleado() values(null,"300578850","saw","soso","3275468020","prueba 4");

insert into usuario() values(null,"dap","123","Conductor",1);
insert into usuario() values(null,"qwrer","321","Coordinador Administrativo",2);
insert into usuario() values(null,"swap","789","Coordinador de Rutas",3);
insert into usuario() values(null,"sasas","741","Conductor",4);

insert into contrato() values(null,1,"2000-10-15","2005-08-20",5000000);

insert into bus() values (null,"prueba","abc 123","2000","1");
insert into bus() values (2,"prueba2","dda 456","2002","4");

insert into ruta() values (null,"Guacamayas","Americas","1");
insert into ruta() values (2,"Libertadores","Centro","1");
