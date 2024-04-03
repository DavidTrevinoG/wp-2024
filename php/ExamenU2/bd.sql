use examenu2;

create table if not exists libros(
    id_libro int primary key auto_increment,
    nombre varchar(50),
    id_editorial int,
    hojas int,
    tema varchar(50),
    autor varchar(50)
);

create table if not exists editoriales(
    id_editorial int primary key auto_increment,
    nombre varchar(50)
);

alter table libros add constraint fk_editorial foreign key(id_editorial) references editoriales(id_editorial);