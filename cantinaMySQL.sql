create database cantina;
use cantina; 			

create table Usuario(
	id_Usuario int auto_increment primary key,
	email varchar(128) not null,
	contraseña varchar (22) not null,
	nombre varchar (60) not null
);

create table cliente(
	id_cliente int primary key,	
	saldo int not null, 
    foreign key (id_cliente) references Usuario(id_Usuario)
);

create table administrador(
	id_administrador int primary key,
	foreign key (id_administrador) references Usuario(id_Usuario)
);

create table categoria(
	id_categoria int auto_increment primary key,
    fk_administrador int not null,
    nombre_categoria varchar (80) not null,
    foreign key (fk_administrador) references administrador(id_administrador)
);

create table producto (
	id_producto int auto_increment primary key,
	fk_administrador int not null,
	id_categoria int not null,
	stock int not null,
	precio_producto int not null,
	receta varchar (500),
	nombre_producto varchar (60) not null,
	foreign key (fk_administrador) references administrador(id_administrador),
	foreign key (id_categoria) references categoria(id_categoria) 
);

create table sugerencia(
	id_sugerencias int auto_increment primary key,
	fk_cliente int not null,
	texto text (1000) not null,
	fecha varchar (50) not null,
	titulo varchar (60) not null,
	foreign key (fk_cliente) references cliente(id_cliente)
);

create table encuesta(
	id_encuesta int auto_increment primary key,
	fk_cliente int not null,
	fk_administrador int not null,
    titulo varchar (100),
	fecha_enviado varchar (50) not null,
	eleccion_cliente int not null,
	foreign key (fk_cliente) references cliente(id_cliente),
	foreign key (fk_administrador) references administrador(id_administrador)
);

create table opcion_encuesta(
	fk_encuesta int not null,
    opcion int not null,
    foreign key (fk_encuesta) references encuesta(id_encuesta) 
);

create table carrito(
	id_compra int auto_increment primary key,
	fk_cliente int not null,
	fecha_hora varchar (50) not null,
	total_compra int not null,
	foreign key (fk_cliente) references cliente(id_cliente)
);

create table cliente_realiza_encuesta(
	id int auto_increment primary key,
	fk_cliente int not null,
	fk_encuesta int not null,
	eleccion int,
	fecha varchar (50) not null,
	foreign key (fk_cliente) references cliente(id_cliente),
	foreign key (fk_encuesta) references encuesta(id_encuesta)
);

create table carrito_tiene_producto(
	fk_compra int not null,
	fk_producto int not null,
	primary key (fk_compra, fk_producto),
	foreign key (fk_compra) references carrito(id_compra),
	foreign key (fk_producto) references producto(id_producto)
);
create table cliente_likes_producto(
	fk_cliente int not null,
	fk_producto int not null,
	primary key (fk_cliente, fk_producto),
	foreign key (fk_cliente) references cliente(id_cliente),
	foreign key (fk_producto) references producto(id_producto)
);
create table producto_esta_categoria(
	fk_categoria int not null,
	fk_producto int not null,
	primary key (fk_categoria, fk_producto),
	foreign key (fk_categoria) references categoria(id_categoria),
	foreign key (fk_producto) references producto(id_producto)
);
  