<?php

require_once "Api.php";
require_once "./../Model/ComentarioModel.php";

class ComentarioApiController extends Api
{
  private $model;
  private $Titulo;

  function __construct(){
    
    parent::__construct();
    $this->model = new ComentarioModel();
    $this->Titulo = "Comentario";
  }

  function GetComentario($param = null){
    if(isset($param)){
      $id_comentario = $param[0];
      $data = $this->model->GetComentarios($id_comentario);
    }else{
      $data = $this->model->GetComentariosCine();
    }
    if(isset($data)){
      return $this->json_response($data, 200);
    }else{
      return $this->json_response(null, 404);
    }
  }
  function GetComentarioCine($param = null){
    if(isset($param)){
      $id_cine= $param[0];
      $data = $this->model->GetComentariosCine($id_cine);
    }else{
      $data = $this->model->GetComentariosCine();
    }
    if(isset($data)){
      return $this->json_response($data, 200);
    }else{
      return $this->json_response(null, 404);
    }
  }

  function DeleteComentario($param = null){
    if(isset($param)){
        $id_comentario = $param[0];
        $r =  $this->model->DeleteComentario($id_comentario);
        if($r == false){
          return $this->json_response($r, 300);
        }
        return $this->json_response($r, 200);
    }else{
      return  $this->json_response("No comment specified", 300);
    }
  }

  function InsertComentario($param = null){
    $objetoJson = $this->getJSONData();
    $r = $this->model->InsertComentario($objetoJson->id, $objetoJson->comentario, $objetoJson->puntaje,$objetoJson->id_cine );
    return $this->json_response($r, 200);
  }

  function UpdateComentario($param = null){
    if(isset($param)){
      $idcomentario = $param[0];
      $objetoJson = $this->getJSONData();
      $r = $this->model->GuardarEditarComentario($objetoJson->id, $objetoJson->comentario, $objetoJson->puntaje,$objetoJson->id_cine, $idcomentario);
      return $this->json_response($r, 200);

    }else{
      return  $this->json_response("No comment specified", 300);
    }
  }
  
}
 ?>
