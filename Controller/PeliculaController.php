<?php
require_once  "./View/PeliculaView.php";
require_once  "./Model/PeliculaModel.php";
require_once  "./Model/CineModel.php";
require_once  "./Model/ImagenModel.php";
require_once  "SecuredController.php";

class PeliculaController extends SecuredController
{
  private $view;
  private $model;  
  private $modelCine;
  private $Titulo;
  function __construct()
  {
    parent::__construct();
    $this->view = new PeliculaView();
    $this->model = new PeliculaModel();
    $this->modelCine = new CineModel();
    $this->imagenModel = new ImagenModel();
    $this->Titulo = "Lista de Peliculas";
  }
 
  function MostrarPeliculas(){
    $Peliculas = $this->model->GetPeliculas();
    if(isset($_SESSION["User"])){        
      $User = $_SESSION["User"];
      $this->view->MostrarPeliculas($this->Titulo, $Peliculas, $User, true,null);
    }else{
      $this->view->MostrarPeliculas($this->Titulo, $Peliculas,$User='',true,null);
    }
  }
  function MostrarPelicula($param){
    $id_pelicula = $param[0];
    $Peliculas = $this->model->GetPelicula($id_pelicula);   
    $Imagenes = $this->imagenModel->getByPelicula($id_pelicula);
    if(isset($_SESSION["User"])){        
      $User = $_SESSION["User"];
      $this->view->MostrarPeliculas($this->Titulo, $Peliculas, $User, false,$Imagenes);
    }else{
      $this->view->MostrarPeliculas($this->Titulo, $Peliculas, null, false,$Imagenes);  
    }
  }
  function MostrarPeliculaCondicion(){
    $rate = $_POST["rate"];
    $Peliculas = $this->model->GetPeliculaCondicion($rate);   
    $Cant = true;
    if(isset($_SESSION["User"])){        
      $User = $_SESSION["User"];
      $this->view->MostrarPeliculasCondicion($this->Titulo, $Peliculas, $User, $Cant);
    }else{
      $this->view->MostrarPeliculasCondicion($this->Titulo, $Peliculas, null, $Cant);
    }
  }
  function MostrarPeliculasPorCine($param=0){
    $id_cine = $param[0];
    $Peliculas = $this->model->GetPeliculas();    
    $Cines = $this->modelCine->GetCines();
    if(isset($_SESSION["User"])){        
      $User = $_SESSION["User"];
      $this->view->Mostrar($this->Titulo, $Peliculas,$id_cine,$User,$Cines);
    }else{
      $this->view->Mostrar($this->Titulo, $Peliculas,$id_cine,null,$Cines);
    }
  }
  function EditarPelicula($param){
    if(isset($_SESSION["User"])){
      $User = $_SESSION["User"];
      $id_pelicula = $param[0];
      $Pelicula = $this->model->GetPelicula($id_pelicula);
      $Cines = $this->modelCine->GetCines();
      $this->view->MostrarEditarPelicula("Editar Pelicula", $Pelicula, $User, $Cines);
    }else{
      header(LOGIN);
    }
  }

  function agregarImagen(){
    $id_pelicula = $_POST["IdPelicula"];
    $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];
   
    header(PELICULAS);
    
  }

  function InsertPelicula(){
    $nombre = $_POST["nombre"];
    $director = $_POST["director"];
    $rate = $_POST["rate"];
    $horarios = $_POST["horarios"];
    $id_cine = $_POST["id_cine"];

    if(isset($_SESSION["User"])){
      $User = $_SESSION["User"];
    $this->model->InsertarPelicula($nombre,$director,$rate,$horarios,$id_cine);
    
  }else{
    header(LOGIN);
  }
    header(PELICULASCINE.$id_cine);
  }
  function GuardarEditarPelicula(){
    $id_pelicula= $_POST["id"];
    $nombre = $_POST["nombre"];
    $director = $_POST["director"];
    $rate = $_POST["rate"];
    $horarios = $_POST["horarios"];
    $id_cine = $_POST["id_cine"];
    $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];
    if(isset($_SESSION["User"])){
      $User = $_SESSION["User"];
    $this->model->GuardarEditarPelicula($nombre,$director,$rate,$horarios,$id_cine,$id_pelicula);
    $this->model->insertImagenes($id_pelicula,$rutaTempImagenes);
    header(PELICULASCINE.$id_cine);
    }else{
    header(LOGIN);
    }
    
  }
  function BorrarPelicula($param){                 
    $User = $this->chequearUser();
    if($User){
      $this->model->BorrarPelicula($param[0]);
    }else{
      header(LOGIN);
    }
    header(PELICULAS); 
  }
}
 ?>
