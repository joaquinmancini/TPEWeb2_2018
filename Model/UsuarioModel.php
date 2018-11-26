<?php
/**
 *
 */
class UsuarioModel extends CreateDDBBModel
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

  function GetUsuarios(){

      $sentencia = $this->db->prepare( "select * from usuario");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function InsertarUsuario($nombre, $pass){

    $sentencia = $this->db->prepare("INSERT INTO usuario(nombre, pass) VALUES(?,?)");
    $sentencia->execute(array($nombre, $pass));
  }

  function getUsuario($param){
    $sentencia = $this->db->prepare( "select * from usuario where id=? limit 1");
    $sentencia->execute(array($param[0]));
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  function GetUser($user){
      $sentencia = $this->db->prepare( "select * from usuario where nombre=? limit 1");
      $sentencia->execute(array($user));
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }


}


 ?>
