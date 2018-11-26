<?php
require_once  "./../Model/UsuarioModel.php";
require_once  "ApiSecuredController.php";

class UsuarioSecuredApiController extends ApiSecuredController
{
  private $model;

  function __construct()
  {
    parent::__construct();
    
    $this->model = new UsuarioModel();
    $this->Titulo = "Lista de Usuario";
  }

  function getUsuario($param){    
    if(isset($param)){
        $arreglo = $this->model->getUsuario($param);
        $data = $arreglo;
      }else{
        $data = $this->model->GetUsuarios();
      }
      if(isset($data)){
        return $this->json_response($data, 200);
      }else{
        return $this->json_response(null, 404);
      }  

  }

}

 ?>
