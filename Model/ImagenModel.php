<?php
require_once "Model/CreateDDBBModel.php";
/**
 *
 */
class ImagenModel extends CreateDDBBModel
{
  private $db;

  function __construct()
  {
    parent::__construct();
    $this->db = $this->Connect();
  }

  function Connect(){
    return new PDO('mysql:host=localhost;'
    .'dbname=db_cine;charset=utf8'
    , 'root', '');
  }

  function insert($id_pelicula, $url){
    $sentencia = $this->db->prepare("INSERT INTO imagen(id_pelicula, url) VALUES (?,?)");
    $sentencia->execute(array($id_pelicula, $url));
  }
  function getByPelicula($id_pelicula){
    $sentencia = $this->db->prepare("SELECT * FROM imagen WHERE id_pelicula = ?");
    $sentencia->execute(array($id_pelicula));
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  
 

   function getUrl($id_imagen){
     $sentencia = $this->db->prepare("SELECT url FROM imagen WHERE id_imagen = ?");
     $sentencia->execute(array($id_img[0]));
     return $sentencia->fetch(PDO::FETCH_ASSOC);
   }
   
   function BorrarImagen($id_imagen){
     $url = $this->getUrl($id_imagen);
     unlink($url['url']);
     $sentencia = $this->db->prepare("DELETE FROM imagen WHERE id_imagen=?");
     $sentencia->execute(array($id_imagen[0]));
   }
}
 ?>