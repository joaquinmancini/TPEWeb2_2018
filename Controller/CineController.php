<?php

require_once  "./View/CineView.php";
require_once  "./Model/CineModel.php";
require_once  "./Model/PeliculaModel.php";
require_once  "SecuredController.php";

class CineController extends SecuredController
{
  private $view;
  private $model;
  private $Titulo;

  function __construct()
  {
    parent::__construct();
    $this->view = new CineView();
    $this->model = new CineModel();
    $this->modelPelicula = new PeliculaModel();
    $this->Titulo = "Lista de Cine";
  }

  function Cine(){
      $Cines = $this->model->GetCines();
      $Pelicula = $this->modelPelicula->GetPeliculas();             
        $User = $this->chequearUser();
        $this->view->Mostrar($this->Titulo, $Cines, $Pelicula, $User);
      
  }

  function EditarCine($param){                 
    $User = $this->chequearUser();
    if($User){
      $id_cine = $param[0];
      $Cine = $this->model->GetCine($id_cine);
      $this->view->MostrarEditarCine("Editar Cine",$Cine, $User);
    }else{
      header(LOGIN);
    }
  }
  
  function InsertCine(){
    if (isset($_POST["nombre"], $_POST["capacidad"], $_POST["sala"])) {
      # code...
    }
    $nombre = $_POST["nombre"];
    $capacidad = $_POST["capacidad"];
    $sala = $_POST["sala"];
    if(isset($_SESSION["User"])){
      $User = $_SESSION["User"];
      $this->model->InsertarCine($nombre,$capacidad,$sala);
    }else{
      header(LOGIN);
    }
   

    header(CINES);
  }

  function GuardarEditarCine(){
    $id_cine = $_POST["id"];
    $nombre = $_POST["nombre"];
    $capacidad = $_POST["capacidad"];
    $sala = $_POST["sala"];
    if(isset($_SESSION["User"])){
      $User = $_SESSION["User"];
    $this->model->GuardarEditarCine($nombre,$capacidad,$sala,$id_cine);
  }else{
    header(LOGIN);
  }
    header(CINES);
  }

  function BorrarCine($param){
    if(isset($_SESSION["User"])){
      $User = $_SESSION["User"];
     $this->model->BorrarCine($param[0]);
  }else{
    header(LOGIN);
  }
    header(CINES);
  }

  function OpcionBorrarCine($param){
    if(isset($_SESSION["User"])){
      $User = $_SESSION["User"];
      $id_cine = $param[0];
      $Cine = $this->model->GetCine($id_cine);
    $this->view->MostrarEliminarCine("Eliminar Cine",$Cine, $User);
  }else{
    header(LOGIN);
  }
  }
}

 ?>
