create database if not exists tramitesSARTET;

use tramitesSARTET;



create table if not exists ejecutivo (
    id int auto_increment primary key,
    nombre varchar(50) not null,
    apellido varchar(50) not null,
    rfc varchar(50) not null,
    fecha_nacimiento date not null,
    telefono int not null,
    email varchar(50) not null,
    direccion varchar(50) not null,
    localidad varchar(50) not null,
    provincia varchar(50) not null,
    codigo_postal int not null
);

create table if not exists modulo(
    id int auto_increment primary key,
    nombre varchar(50) not null,
    descripcion varchar(50) not null,
    fecha date not null,
    ejecutivo int not null,
    foreign key (ejecutivo) references ejecutivo(id)
);

create table if not exists tramites(
    id int auto_increment primary key,
    nombre varchar(50) not null,
    descripcion varchar(50) not null,
    fecha date not null,
    modulo int not null,
    foreign key (modulo) references modulo(id)
    foreign key (ejecutivo) references usuarios(id)
);

create table if not exists requisitos(
    id int auto_increment primary key,
    nombre varchar(50) not null,
    descripcion varchar(50) not null,
    fecha date not null,
    tipo varchar(50) not null,
    ejecutivo int not null, 
    tramites_id int not null,  
    foreign key (tramites_id) references tramites(id),
    foreign key (ejecutivo) references ejecutivo(id)
);

create table if not exists afiliados(
    id int auto_increment primary key,
    nombre varchar(50) not null,
    apellido varchar(50) not null,
    rfc varchar(50) not null,
    fecha_nacimiento date not null,
    telefono int not null,
    email varchar(50) not null,
    direccion varchar(50) not null,
    localidad varchar(50) not null,
    provincia varchar(50) not null,
    codigo_postal int not null
);

create table if not exists tramites_afiliados(
    id int auto_increment primary key,
    afiliado int not null,
    tramite int not null,
    fecha_realizo date not null,
    fecha_entrega date not null,
    pdf bytea not null,
    modulo int not null,
    estado varchar(50) not null,
    observaciones varchar(50) not null,
    pdf_completado bytea not null,
    foreign key (modulo) references modulo(id),
    foreign key (afiliado) references afiliados(id),
    foreign key (tramite) references tramites(id)
);






