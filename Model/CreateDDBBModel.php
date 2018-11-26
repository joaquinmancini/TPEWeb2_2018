<?php
class CreateDDBBModel
{
 protected $pdo;
 
 public function __construct()
 {
 $this->pdo = new PDO('mysql:host=localhost;', "root", "");
 }
 //creamos la base de datos y las tablas que necesitemos
 public function my_db()
 {
        //creamos la base de datos si no existe
 $crear_db = $this->pdo->prepare('CREATE DATABASE IF NOT EXISTS db_cine COLLATE utf8_spanish_ci');   
 $crear_db->execute();
 
 //decimos que queremos usar la tabla que acabamos de crear
 if($crear_db):
 $use_db = $this->pdo->prepare('USE db_cine');   
 $use_db->execute();
 endif;
 
 //si se ha creado la base de datos y estamos en uso de ella creamos las tablas
 if($use_db):
 //creamos la tabla usuarios
 $crear_tb_cine = $this->pdo->prepare('
 CREATE TABLE IF NOT EXISTS cine (
    id_cine int(11) NOT NULL AUTO_INCREMENT,
    nombre text COLLATE utf8_spanish_ci NOT NULL,
    capacidad int(11) NOT NULL,
    sala int(10) NOT NULL,
 PRIMARY KEY (id_cine)
     )'); 
 $crear_tb_cine->execute();

 $crear_cine = $this->pdo->prepare('
 INSERT INTO `cine`(`id_cine`, `nombre`, `capacidad`, `sala`) VALUES (1,"Cinemacenter",300, 2)
 '); 
 $crear_cine->execute();

 $crear_tb_pelicula = $this->pdo->prepare('
 CREATE TABLE IF NOT EXISTS pelicula (
    id_pelicula int(11) NOT NULL AUTO_INCREMENT,
    nombre text COLLATE utf8_spanish_ci NOT NULL,
    director text COLLATE utf8_spanish_ci NOT NULL,
    rate double(3,1) NOT NULL,
    horarios time NOT NULL,
    id_cine int(11) NOT NULL,
 PRIMARY KEY (id_pelicula),
 FOREIGN KEY (id_cine) REFERENCES cine(id_cine)
     )'); 
 $crear_tb_pelicula->execute();

 $crear_pelicula = $this->pdo->prepare('
 INSERT INTO `pelicula`(`id_pelicula`, `nombre`, `director`, `rate`, `horarios`, `id_cine`) VALUES (1,"Bohemian Rhapsody","Bryan Singer",10,22:40:00,1)
 '); 
 $crear_pelicula->execute();

 $crear_tb_usuario = $this->pdo->prepare('
 CREATE TABLE IF NOT EXISTS usuario (
    id int(11) NOT NULL AUTO_INCREMENT,
    nombre varchar(100) COLLATE utf8_spanish_ci NOT NULL,
    pass varchar(100) COLLATE utf8_spanish_ci NOT NULL,
    admin tinyint(1) NOT NULL,
 PRIMARY KEY (id)
     )'); 
 $crear_tb_usuario->execute();

 $crear_user = $this->pdo->prepare('
 INSERT INTO `usuario`(`id`, `nombre`, `pass`, `admin`) VALUES (1,"admin","$2y$10$cZhmBEfbQ/OPpeeOmqE05OmqL6c47N7zjXI9LyESZFxAKThkrskIO", 1)
 '); 
 $crear_user->execute();

 $crear_tb_comentario = $this->pdo->prepare('
 CREATE TABLE IF NOT EXISTS comentario (
    id_comentario int(11) NOT NULL AUTO_INCREMENT,
    id int(11) NOT NULL,
    comentario varchar(256) COLLATE utf8_spanish_ci NOT NULL,
    puntaje double(3,1) NOT NULL,
    id_cine int(11) NOT NULL,
 PRIMARY KEY (id_comentario),
 FOREIGN KEY (id) REFERENCES usuario(id),
 FOREIGN KEY (id_cine) REFERENCES cine(id_cine)
     )'); 
 $crear_tb_comentario->execute();
 
 

 endif;
 
 }
}
//ejecutamos la función my_db para crear nuestra bd y las tablas
$db = new CreateDDBBModel();
$db->my_db();
?>