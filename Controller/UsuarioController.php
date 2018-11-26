<?php
require_once  "./View/UsuarioView.php";
require_once  "./Model/UsuarioModel.php";
require_once  "SecuredController.php";

class UsuarioController extends SecuredController
{
  private $view;
  private $model;
  private $Titulo;

  function __construct()
  {
    parent::__construct();
    
    $this->view = new UsuarioView();
    $this->model = new UsuarioModel();
  }

  function registro(){
    if(isset($_SESSION["User"])){        
      $User = $_SESSION["User"];
      $this->view->mostrarRegistro($User);
    }else{
      $this->view->mostrarRegistro(null);
    }
  }

  function InsertUsuario(){
    if (isset($_POST["nombre"])&&isset($_POST["pass"])) { 
      $nombre = $_POST["nombre"];
      $pass = $_POST["pass"];
      $hash = password_hash($pass, PASSWORD_DEFAULT);
  
      $dbUser = $this->model->getUser($nombre);
      if(empty($dbUser)){
        $this->model->InsertarUsuario($nombre,$hash);
        $_SESSION["User"] = $nombre;
        $this->verificarLogin($nombre, $pass);
        header(HOME);
      }else{
        $this->view->mostrarRegistro(null);
      }    
    }        
  }

  function verificarLogin($user, $pass){
    $dbUser = $this->model->getUser($user);

    if(isset($dbUser)&&isset($dbUser[0])){
      if (password_verify($pass, $dbUser[0]["pass"])){
        session_start();
        $_SESSION["User"] = $dbUser[0]["id"];
        $_SESSION["admin"] = $dbUser[0]["admin"];
        echo $_SESSION["admin"];
        header(HOME);
      }else{
        $this->view->mostrarLogin('Contraseña incorrecta');
      }
    }else{
      //No existe el usario
      $this->view->mostrarLogin("No existe el usario");
    }
}
}

 ?>
