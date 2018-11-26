<?php
require_once "CreateDDBBModel.php";
/**
 *
 */
class ComentarioModel extends CreateDDBBModel
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

  function GetComentarios($id_comentario){
      $sentencia = $this->db->prepare( "SELECT * FROM comentario WHERE id_comentario=?");
      $sentencia->execute(array($id_comentario));
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function GetComentariosCine($id_cine){
    $sentencia = $this->db->prepare( "SELECT * FROM comentario WHERE id_cine=?");
    $sentencia->execute(array($id_cine));
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  
  function GetComentario(){
    $sentencia = $this->db->prepare( "SELECT * FROM comentario");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function InsertComentario($id, $comentario, $puntaje,$id_cine){                                  
    $sentencia = $this->db->prepare("INSERT INTO `comentario`(`id`, `comentario`, `puntaje`, `id_cine`)  VALUES (?, ?, ?, ?);");
    $sentencia->execute(array($id, $comentario, $puntaje,$id_cine));
    $lastId = $this->db->lastInsertId();
    return $this->GetComentarios($lastId);
  }

  function DeleteComentario($idComentario){
    $sentencia = $this->db->prepare( "DELETE FROM comentario WHERE id_comentario=?");
    $sentencia->execute(array($idComentario));
  }

  function GuardarEditarComentario($id, $comentario, $puntaje, $id_cine, $id_comentario){
    $sentencia = $this->db->prepare( "UPDATE `comentario` SET `id`=?,`comentario`=?,`puntaje`=?,`id_cine`=? WHERE id_comentario=?");
    $sentencia->execute(array($id, $comentario, $puntaje, $id_cine, $id_comentario));
  }

}


 ?>
