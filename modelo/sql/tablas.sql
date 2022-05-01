DROP TABLE IF EXISTS bebes;
create table bebes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    letra char(1) not null,
    nombre varchar(30) not null UNIQUE,
    sexo varchar(9),
    origen varchar(255) not null,
    descripcion varchar(255),
    estado enum("publicado", "No publicado") not null,
    token varchar(25) DEFAULT REPLACE(UUID(), '-', '') UNIQUE,
    edit_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('a', 'ana', 'd', 'mujer', 'ana es un nombre para niña de origen hebreo que significa llena de gracia y compasión descripcion', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('a', 'alba', 'd', 'mujer', 'bonito nombre cuyas raíces no están del todo claras. en cualquier caso, hace referencia a las primeras luces del día.', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('a', 'ainhoa', 'd', 'mujer', 'viene de ainhoa, la de tierra fértil', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('a', 'alvaro', 'germano', 'hombre', 'atento', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('a', 'abigail', 'hebreo', 'hombre', 'fuente de alegria', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('a', 'alejandro', 'griego', 'hombre', 'protector de los hombres', 1);


insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('b', 'bastián', 'griego', 'hombre', 'que significa "el que es venerado". viene de sebastián', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('b', 'barrabás', 'arameo', 'hombre', 'que significa "hijo del padre"', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('b', 'beltrán', 'alemán', 'hombre', 'viene de "beraht-rabam", que signifca "cuervo ilustre"', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('b', 'belinda', 'latino', 'mujer', 'graciosa', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('b', 'beatriz', 'latino', 'mujer', 'que hace feliz', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('b', 'belen', 'hebreo', 'mujer', 'casa del pan"', 1);


insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('c', 'calisto', 'griego', 'hombre', 'significa "la más bella", descripcion', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('c', 'clara', 'latino', 'mujer', 'significa "brillo, claridad", descripcion', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('c', 'coral', 'latino', 'mujer', 'que simboliza la belleza y delicadeza de este animal de colores vistosos que habita en el fondo del mar, origen, descripcion', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('c', 'caerlos', 'germano', 'hombre', 'significa "fuerte, viril", descripcion', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('c', 'cayetano', 'latino', 'hombre', 'significa "brillo, claridad", descripcion', 1);

insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('d', 'daniel',	'hebreo', 'hombre', 'dios es juez', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('d', 'david', 'hebreo', 'hombre', 'amado', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('d', 'diego', 'hebreo', 'hombreo', 'suplantador', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('d', 'diana', 'latino', 'mujer', 'diosa de la luna', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('d', 'dora', 'griego', 'mujer', 'regalo de dios', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('d', 'dana', 'hebreo', 'mujer', 'justicia', 1);

insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('e', 'eloy', 'frances', 'hombre', 'elegido', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('e', 'emilio', 'griegoo', 'hombre', 'gracioso', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('e', 'eric', 'germmano', 'hombre', 'heroico', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('e', 'elena', '', 'mujer', "es uno de los nombres mujers más utilizados de la historia. un nombre tierno, que suena muy melodioso y que procede de origen griego. elena o helena significa \"antorcha\", \"brillante\", \"deslumbrante\" o \"resplandeciente\"", 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('e', 'emma', '', 'mujer', "nombre mujer  germánico (ermin) que significa la que es fuerte, la que consigue simboliza a una mujer con fuerza y poder. el santo de este nombre se celebra el día 2 de enero", 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('e', 'eva',	'hebreo', 'mujer', 'vida', 1);

insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('f', 'federico', 'germano', 'hombreo', 'que gobierna en paz', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('f', 'fermín',	'latino', 'hombbre', 'fuerte y firme', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('f', 'felix',	'latino', 'hombre', 'feliz', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('f', 'flora',	'latino', 'mujer', 'floiosa de las flores', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('f', 'fabiola',	'latino', 'mujer', 'cultivadora de habas', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('f', 'fatima',	'arabe', 'mujer', 'doncella, joven', 1);

insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('g', 'gabriel', 'hebreo', 'hombre', 'fuerza de dios', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('g', 'gaspar', 'persa', 'mhombre', 'tesorero', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('g', 'guillermo', 'germabo', 'hombre', 'casco de oro', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('g', 'gema', 'latino', 'mujer', 'piedra preciosa', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('g', 'gloria', 'latino', 'femenno', 'fama', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('g', 'graciela', 'latino', 'femenno', 'ageaciada', 1);

insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('h', 'héctor', 'griego', 'hombre', 'prudente defensorn', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('h', 'homero', 'griego', 'hombre', 'prenda', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('h', 'humberto', 'germano', 'hombre', 'muy brillantenombre', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('h', 'helena', 'griego', 'mujer', 'antorcha', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('h', 'heli', 'hebreoo', 'mujer', 'ge dios', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('h', 'hilda', 'germano', 'mujer', 'poderosa en la batalla', 1);


insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('i', 'isabel', 'hebreo', 'mujer', 'dios del juramento', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('i', 'isidoro', 'griego', 'hombre', 'don equitativon', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('i', 'isaac',	'hebreo', 'hombre', 'el que ríe', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('i', 'irene', 'hebreo', 'mujer', 'paz', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('i', 'iris', 'griego', 'mujer', 'arco iris', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('i', 'ivan',	'hebreo', 'hombre', 'dios es missericordioso', 1);

insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('j', 'juan', 'latino', 'hombre', 'don graciooso de dios', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('j', 'julian', 'latino', 'hombre', 'recto', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('j', 'julia', 'latino', 'mujer', 'de cabello suave', 1);

insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('k', 'katia', 'ruso', 'mujer', 'pura,inmaculada', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('k', 'kira', 'ruso', 'mujer', 'antorcha', 1);;
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('k', 'karen', 'ruso', 'mujer', 'pura,inmaculada', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('k', 'kevin', 'irlandes', 'hombre', 'bonito nacimiento', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('k', 'koldo', 'vasco', 'hombre', 'guerrero victorioso', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('k', 'karl', 'ingles', 'hombre', 'hombre valiente', 1);

insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('l', 'lucas', 'griego', 'hombre', 'luminoso', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('l', 'luis', 'germano', 'hombre', 'defensor del pueblo', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('l', 'leonardo', 'germano', 'hombre', 'fuerte como un leon', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('l', 'lucia', 'latino', 'mujer', 'luminosa', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('l', 'laura', 'latino', 'mujer', 'laurel', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('l', 'leticia', 'latino', 'mujer', 'felicidad', 1);

insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('m', 'magali', 'provenzal', 'mujer', 'perla', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('m', 'maite', 'vasco', 'mujer', 'encarnacion', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('m', 'maria', 'hebreo', 'mujer', 'señora', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('m', 'manuel',  'hebreo', 'hombre', 'dios con nosotros', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('m', 'marcos', 'hebreo', 'hombre', 'amargo', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('m', 'martin', 'latino', 'hombre', 'guerrero', 1);

insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('n', 'norma', 'latino', 'mujer', 'modelo', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('m', 'nuria', 'latino', 'mujer', 'advocacion catalana a la virgen maria', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('n', 'noa', 'hawaiano', 'mujer', 'libertad', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('n', 'nicolas', 'griego', 'hombre', 'conquistador', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('m', 'napoleon', 'griego', 'hombre', 'leon de la nyueva ciudad', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('n', 'noe', 'hebreo', 'hombre', 'descanso', 1);

insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('o', 'olivias', 'latino', 'mujer', 'viene de oliva', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('o', 'oda', 'germano', 'mujer', 'canto, himno', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('o', 'olaya', 'griego', 'mujer', 'que habla bien', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('o', 'octavio',  'latino', 'hombre', 'viene de octavius', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('o', 'omat', 'arabe', 'hombre', 'construir, edificar', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('o', 'olaf', 'escandinavo', 'hombre', 'la herencia de los antepasados', 1);

insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('p', 'paloma',  'latinoo', 'mujer', 'paloma torcaz', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('p', 'pamela', 'griego', 'mujer', 'toda miel, toda di¡ulzura', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('p', 'palmira', 'latino', 'mujer', 'aquella que proviene de la ciudad de las palmas', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('p', 'pascual',  'hlatino', 'hombre', 'relativo a la pascua', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('p', 'paulo', 'latino', 'hombre', 'Variante culta de "Pablo". Su forma original es "Paulus"', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('p', 'pacifico', 'latino', 'hombre', 'Se trata de un nombre divulgado por el beato Pacífico,', 1);

insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('q', 'querubin',  'hebreo', 'hombre', 'nombre de unos seres cewlestialez', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('q', 'quiles', 'griego', 'hombre', 'Variante de Quirico que se puede encontrar hoy como apellido', 1);
insert into bebes(letra, nombre, origen, sexo, descripcion, estado) values('q', 'quiterio', 'griego', 'hombre', "Aquella que lideró a un pueblo.", 1);


DROP TABLE IF EXISTS letras;
create table letras(
    id INT AUTO_INCREMENT PRIMARY KEY,
    letra char(1) UNIQUE not null,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

insert into letras(letra) values('a');
insert into letras(letra) values('b');
insert into letras(letra) values('c');
insert into letras(letra) values('d');
insert into letras(letra) values('e');
insert into letras(letra) values('f');
insert into letras(letra) values('g');
insert into letras(letra) values('h');
insert into letras(letra) values('i');
insert into letras(letra) values('j');
insert into letras(letra) values('k');
insert into letras(letra) values('l');
insert into letras(letra) values('m');
insert into letras(letra) values('n');
insert into letras(letra) values('o');
insert into letras(letra) values('p');
insert into letras(letra) values('q');
insert into letras(letra) values('r');
insert into letras(letra) values('s');
insert into letras(letra) values('t');
insert into letras(letra) values('u');
insert into letras(letra) values('v');
insert into letras(letra) values('w');
insert into letras(letra) values('x');
insert into letras(letra) values('y');
insert into letras(letra) values('z');


DROP TABLE IF EXISTS usuario;
create table usuario(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(15) not null,
    apellido varchar(30) not null,
    email varchar(255) not null,
    nom_usu varchar(25) UNIQUE not null,
    sexo varchar(50),
    estado enum("activo", "inactivo"),
    edit_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
insert into usuario(nombre, apellido, nom_usu, email, estado) values("David", "Bellarosa", "The_david", "admin@admin.com", 1);
insert into usuario(nombre, apellido, nom_usu, email, estado) values("Ana", "Lopez", "la_ana", "usuario@usuario.com", 1);
insert into usuario(nombre, apellido, nom_usu, email,  estado) values("John", "Escamilla", "John", "inactivo@usuario.com", 2);

DROP TABLE IF EXISTS clave;
create table clave(
    usuario_id INT PRIMARY KEY,
    pass varchar(255) not null,
    edit_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_usuario_id FOREIGN KEY  (usuario_id) REFERENCES usuario(id)
);
insert into clave(usuario_id, pass) values(1, '$2y$11$FZRQUj2iNJZyfZhEap8dT.8CfbBKQ15q2oJhbkkpiH0f8O8lqRmuG');
insert into clave(usuario_id, pass) values(2, '$2y$11$FZRQUj2iNJZyfZhEap8dT.8CfbBKQ15q2oJhbkkpiH0f8O8lqRmuG');
insert into clave(usuario_id, pass) values(3, '$2y$11$FZRQUj2iNJZyfZhEap8dT.8CfbBKQ15q2oJhbkkpiH0f8O8lqRmuG');


DROP TABLE IF EXISTS tipo_usuario;
create table tipo_usuario(
    usuario_id int PRIMARY KEY,
    slug_permiso varchar(25) not null,
    permiso varchar(25) not null,
    edit_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_usuario_tipo_id FOREIGN KEY  (usuario_id) REFERENCES usuario(id)
);
insert into tipo_usuario(usuario_id, slug_permiso, permiso) values(1, 'usu_admin', 'Administrador');
insert into tipo_usuario(usuario_id, slug_permiso, permiso) values(2, 'usu_normal', 'Usuario');
insert into tipo_usuario(usuario_id, slug_permiso, permiso) values(3, 'usu_normal', 'Usuario');


DROP TABLE IF EXISTS niveles;
create table niveles(
    id INT PRIMARY KEY AUTO_INCREMENT,
    mujer varchar(50) not null,
    hombre varchar(50) not null,
    current_level int(5) not null,
    next_level int(5),
    exp_init int not null,
    exp_fin int not null
);
insert into niveles(mujer, hombre, current_level, next_level, exp_init, exp_fin) values('Novata', 'Novato', 0, 1, 0, 9);
insert into niveles(mujer, hombre, current_level, next_level, exp_init, exp_fin) values('Normal', 'Normal', 1, 2, 10, 19);
insert into niveles(mujer, hombre, current_level, next_level, exp_init, exp_fin) values('Experimentada', 'Experimentado', 2, 3, 20, 29);
insert into niveles(mujer, hombre, current_level, next_level, exp_init, exp_fin) values('Avanzada', 'Avanzado', 3, 4, 30, 39);
insert into niveles(mujer, hombre, current_level, next_level, exp_init, exp_fin) values('Experta', 'Experto', 4, 5, 40, 69);
insert into niveles(mujer, hombre, current_level, next_level, exp_init, exp_fin) values('Diosa', 'Dios', 5, null, 70, 100);
DROP TABLE IF EXISTS nivel_usuario;
create table nivel_usuario(
    id int primary key AUTO_INCREMENT,
    nivel_id int,
    usuario_id int,
    exp_usuario int not null,
    CONSTRAINT fk_nivel_id FOREIGN KEY (nivel_id) REFERENCES niveles(id),
    CONSTRAINT fk_usuario_exp_id FOREIGN KEY (usuario_id) REFERENCES usuario(id)

);

insert into nivel_usuario(nivel_id, usuario_id, exp_usuario) values(1, 1, 0);
insert into nivel_usuario(nivel_id, usuario_id, exp_usuario) values(1, 2, 0);
insert into nivel_usuario(nivel_id, usuario_id, exp_usuario) values(1, 3, 0);



DROP TABLE IF EXISTS puntos_exp;
create table puntos_exp(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(40) not null,
    descripcion varchar(255) not null,
    give_exp int not null
);

insert into puntos_exp(nombre, descripcion, give_exp) values
(
    "Buscar 3 veces un nombre",
    "En nuestro buscador, tendrás que buscar 3 veces un nombre para adquirir la recompensa",
    5
);

insert into puntos_exp(nombre, descripcion, give_exp) values
(
    "Descubre tu Perfil",
    "Al visitar tu perfil conseguiras una recompensa",
    15
);

insert into puntos_exp(nombre, descripcion, give_exp) values
(
    "Descubre el Blog",
    "Al visitar el blog conseguiras una recompensa",
    20
);

insert into puntos_exp(nombre, descripcion, give_exp) values
(
    "Deja un comentario en un POST",
    "Al comentar un POST conseguiras una recompensa",
    20
);

insert into puntos_exp(nombre, descripcion, give_exp) values
(
    "Cambia un valor en tu Perfil",
    "Al modificar tu perfil conseguiras una recompensa",
    20
);

insert into puntos_exp(nombre, descripcion, give_exp) values
(
    "Crea un POST",
    "Al crear un POST conseguiras una recompensa",
    20
);

DROP TABLE IF EXISTS got_exp;
create table got_exp(
    id INT PRIMARY KEY AUTO_INCREMENT,
    puntos_exp_id int,
    usuario_id int,
    estado boolean not null,
    CONSTRAINT fk_puntos_exp_id FOREIGN KEY  (puntos_exp_id) REFERENCES puntos_exp(id),
    CONSTRAINT fk_usuario_exp_got_id FOREIGN KEY  (usuario_id) REFERENCES usuario(id)
);