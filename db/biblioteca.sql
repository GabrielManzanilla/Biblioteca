Create database Biblioteca;
Use Biblioteca;

Create table Libros(
id_libro int(6) auto_increment not null primary key,
nombre_libro varchar(255) not null,
editorial varchar(255) not null,
autor varchar(255) not null,
genero varchar(255) not null,
pais_autor varchar(255) not null,
numero_paginas int(4) not null,
anio_edicion int(4) not null,
precio int not null
);



Create table Usuarios(
id_usuario int(6) auto_increment not null primary key,
nombre varchar(255) not null,
apellido_paterno varchar(255) not null,
apellido_materno varchar(255),
curp varchar(18) not null,
domicilio varchar(255) not null,
municipio varchar(255) not null,
estado varchar(255) not null,
fecha_nacimiento date not null
);

Create table Prestamos(
id_prestamo int(6) auto_increment not null primary key,
fk_id_libro int,
foreign key ( fk_id_libro) references Libros(id_libro),
fk_id_usuario int,
foreign key (fk_id_usuario) references Usuarios(id_usuario),
fecha_salida date not null,
fecha_max_devolucion date not null,
fecha_devolucion date not null
);

select*from Libros;
insert into Libros(nombre_libro, editorial, autor, genero, pais_autor, numero_paginas, anio_edicion, precio) values ('Don Quijote De La Mancha I', 'Anaya', 'Miguel de Cervantes','Caballeresco','España',517,1991,2750);
insert into Libros(nombre_libro, editorial, autor, genero, pais_autor, numero_paginas, anio_edicion, precio) values ('Don Quijote De La Mancha II', 'Anaya', 'Miguel de Cervantes','Caballeresco','España',611,1991,3125);
insert into Libros(nombre_libro, editorial, autor, genero, pais_autor, numero_paginas, anio_edicion, precio) values ('Historias de Nueva Orleands', 'Alfaguara', 'William Faulkner','Novela','Estados Unidos',186,1985,675);
insert into Libros(nombre_libro, editorial, autor, genero, pais_autor, numero_paginas, anio_edicion, precio) values ('El principito', 'Andina', 'Antoine Saint-Exupery','Aventura','Francia',120,1996,750);
insert into Libros(nombre_libro, editorial, autor, genero, pais_autor, numero_paginas, anio_edicion, precio) values ('El principe', 'S.M.', 'Maquiavelo','Politico','Italia',210,1995,1125);
insert into Libros(nombre_libro, editorial, autor, genero, pais_autor, numero_paginas, anio_edicion, precio) values ('Diplomancia', 'S.M.', 'Henry Kissinger','Politico','Alemania',825,1997,1750);
insert into Libros(nombre_libro, editorial, autor, genero, pais_autor, numero_paginas, anio_edicion, precio) values ('Los Windsor', 'Plaza & Janés', 'Kitty Kelley','Biografías','Gran Bretaña',620,1998,1130);
insert into Libros(nombre_libro, editorial, autor, genero, pais_autor, numero_paginas, anio_edicion, precio) values ('El Último Emperador', 'Caralt', 'Pu-Yi','Autobigrafías','China',353,1989,995);
insert into Libros(nombre_libro, editorial, autor, genero, pais_autor, numero_paginas, anio_edicion, precio) values ('Fortunata y Jacinta', 'Plaza & Janés', 'Pérez Galdós','Novela','España',625,1984,725);


INSERT INTO Usuarios (nombre, apellido_paterno, apellido_materno, curp, domicilio, municipio, estado, fecha_nacimiento)
VALUES 
    ('Juan', 'Pérez', 'González', 'PERJ890101HDFLNS09', 'Calle 123', 'Ciudad de México', 'Ciudad de México', '1989-01-01'),
    ('María', 'García', 'López', 'GALM900202MNLNRS03', 'Avenida 456', 'Guadalajara', 'Jalisco', '1990-02-02'),
    ('Luis', 'Martínez', 'Hernández', 'MAHL850303QRPTRS08', 'Calle 789', 'Monterrey', 'Nuevo León', '1985-03-03'),
    ('Ana', 'Rodríguez', 'Díaz', 'RODA880404TJHLNA07', 'Calle 321', 'Puebla', 'Puebla', '1988-04-04'),
    ('Pedro', 'López', 'Sánchez', 'LOSP910505GSLRDR01', 'Avenida 654', 'Tijuana', 'Baja California', '1991-05-05'),
    ('Laura', 'Hernández', 'Ramírez', 'HERL920606MPLKRR02', 'Calle 987', 'Cancún', 'Quintana Roo', '1992-06-06'),
    ('Carlos', 'González', 'Torres', 'GOTC870707TRPLRN05', 'Avenida 123', 'Mérida', 'Yucatán', '1987-07-07'),
    ('Sofía', 'Díaz', 'Vázquez', 'DIVS860808VZPLFG06', 'Calle 456', 'Acapulco', 'Guerrero', '1986-08-08'),
    ('Diego', 'Martínez', 'Gómez', 'MAGD930909GMPLJR04', 'Avenida 789', 'Veracruz', 'Veracruz', '1993-09-09'),
    ('Fernanda', 'Luna', 'Gutiérrez', 'LUGF940910GTRDFS10', 'Calle 987', 'Oaxaca', 'Oaxaca', '1994-10-10');


-- Generar 25 préstamos aleatorios con fechas de devolución específicas
INSERT INTO Prestamos (fk_id_libro, fk_id_usuario, fecha_salida, fecha_max_devolucion, fecha_devolucion)
VALUES 
    (2, 2, '2020-07-20', '2020-08-03', '2020-08-15'),
    (3, 3, '2021-09-05', '2021-09-19', '2021-10-01'),
    (4, 4, '2020-02-10', '2020-02-24', '2020-03-07'),
    (5, 5, '2022-11-12', '2022-11-26', '2022-12-08'),
    (6, 6, '2019-05-25', '2019-06-08', '2019-06-20'),
    (7, 7, '2023-01-08', '2023-01-22', '2023-02-04'),
    (8, 8, '2021-10-30', '2021-11-13', '2021-11-26'),
    (9, 9, '2020-12-17', '2020-12-31', '2021-01-12'),
    (10, 10, '2023-04-03', '2023-04-17', '2023-04-30'),
    (11, 1, '2020-08-14', '2020-08-28', '2020-09-10'),
    (12, 2, '2019-06-30', '2019-07-14', '2019-07-27'),
    (13, 3, '2022-03-19', '2022-04-02', '2022-04-15'),
    (14, 4, '2021-05-27', '2021-06-10', '2021-06-23'),
    (15, 5, '2019-10-05', '2019-10-19', '2019-11-01'),
    (16, 6, '2022-12-09', '2022-12-23', '2023-01-05'),
    (17, 7, '2020-04-22', '2020-05-06', '2020-05-19'),
    (18, 8, '2023-09-18', '2023-10-02', '2023-10-15'),
    (19, 9, '2021-02-28', '2021-03-14', '2021-03-27'),
    (20, 10, '2020-11-15', '2020-11-29', '2020-12-12'),
    (21, 1, '2019-07-03', '2019-07-17', '2019-07-30'),
    (22, 2, '2020-01-28', '2020-02-11', '2020-02-24'),
    (23, 3, '2022-05-10', '2022-05-24', '2022-06-06'),
    (24, 4, '2023-08-01', '2023-08-15', '2023-08-28'),
    (25, 5, '2021-11-30', '2021-12-14', '2021-12-27');

