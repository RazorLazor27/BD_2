CREATE TABLE calificacion (
	cali_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	cali_estrellas INT,
    cali_avg FLOAT,
    lista_id INT,
    FOREIGN KEY (lista_id) REFERENCES lista_comentarios(lista_id)
);

create table comentarios (
	comentario_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	comentario_text VARCHAR(200)
);

CREATE TABLE ingredientes (
	ingre_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	ingre_nombre VARCHAR(20) NOT NULL
);

create table lista_comentarios (
	lista_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    comentario_id INT,
    FOREIGN KEY(comentario_id) REFERENCES comentarios(comentario_id)
);

CREATE TABLE users_fav_food (
	fav_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    receta_id int,
    cali_id int,
    FOREIGN KEY(receta_id) REFERENCES recetas(receta_id),
    FOREIGN KEY(cali_id) REFERENCES calificacion(cali_id)
);

CREATE TABLE lista_ingredientes (
	lista_ing_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ingre_id int,
    FOREIGN KEY(ingre_id) REFERENCES ingredientes(ingre_id)
);

create table recetas (
	receta_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    receta_foto LONGBLOB,
    receta_nombre VARCHAR(100) NOT NULL,
    receta_instrucciones VARCHAR(1000),
    receta_tiempo float,
    receta_diabetico BOOL,
    receta_lactosa BOOL,
    receta_gluten BOOL,
    receta_vegan BOOL,
    receta_type INT NOT NULL,
    comentario_id INT,
    lista_ing_id INT,
    FOREIGN KEY (comentario_id) REFERENCES comentarios(comentario_id),
    FOREIGN KEY (lista_ing_id) REFERENCES lista_ingredientes(lista_ing_id)
);

create table Users(
	users_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    users_name varchar(255) NOT NULL,
    users_email varchar(255) NOT NULL,
    users_password varchar(255) NOT NULL,
    users_num_almuerzos INT,
    users_login_date DATE,
    users_login_hour TIME
);