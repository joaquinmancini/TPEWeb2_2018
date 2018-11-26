<?php

require_once  "./View/LoginView.php";
require_once  "./Model/UsuarioModel.php";
require_once  "SecuredController.php";

class LoginController extends SecuredController
{
  private $view;
  private $model;
  private $Titulo;

  function __construct()
  {
    parent::__construct();

    $this->view = new LoginView();
    $this->model = new UsuarioModel();
    $this->Titulo = "Login";
  }

  function login(){
    if(isset($_SESSION["User"])){        
      $User = $_SESSION["User"];
      $this->view->mostrarLogin($User);
    }else{
      $this->view->mostrarLogin(null);
    }

  }

  function verificarLogin(){
    if (isset($_POST["usuarioId"])&&isset($_POST["passwordId"])) {
      $user = $_POST["usuarioId"];
      $pass = $_POST["passwordId"];
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
    

}

 ?>
