<?php
require_once "Model/CreateDDBBModel.php";
/**
 *
 */
class CineModel extends CreateDDBBModel
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

  function GetCines(){

      $sentencia = $this->db->prepare( "SELECT * FROM cine");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function GetCine($id){

      $sentencia = $this->db->prepare( "SELECT * FROM cine WHERE id_cine=?");
      $sentencia->execute(array($id));
      return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function InsertarCine($nombre,$capacidad,$sala){                                  
    $sentencia = $this->db->prepare("INSERT INTO `cine` (`nombre`, `capacidad`, `sala`) VALUES (?, ?, ?);");
    $sentencia->execute(array($nombre,$capacidad,$sala));
  }

  function BorrarCine($idCine){
    $senten = $this->db->prepare( "DELETE FROM pelicula WHERE id_cine=?");
    $senten ->execute(array($idCine));
    $sentence = $this->db->prepare( "DELETE FROM comentario WHERE id_cine=?");
    $sentence->execute(array($idCine));
    $sentencia = $this->db->prepare( "DELETE FROM cine WHERE id_cine=?");
    $sentencia->execute(array($idCine));
  }

  function GuardarEditarCine($nombre,$capacidad,$sala,$id){
    $sentencia = $this->db->prepare( "UPDATE `cine` SET `nombre`=?,`capacidad`=?,`sala`=? WHERE id_cine=?");
    $sentencia->execute(array($nombre,$capacidad,$sala,$id));
  }
}


 ?>
