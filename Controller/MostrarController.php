<?php

require_once  "./View/HomeView.php";
require_once  "./View/ContactoView.php";
require_once  "SecuredController.php";

class MostrarController extends SecuredController
{
  private $viewhome;
  private $viewcontacto;

  function __construct()
  {
    parent::__construct();
    $this->viewhome = new HomeView();    
    $this->viewcontacto = new ContactoView();
  }

  function MostrarHome(){
    if(isset($_SESSION["User"])){        
        $User = $_SESSION["User"];
        $this->viewhome->Mostrar($User);
      }else{
        $this->viewhome->Mostrar(null);
      }
  }

  function MostrarContacto(){
    if(isset($_SESSION["User"])){        
        $User = $_SESSION["User"];
        $this->viewcontacto->Mostrar($User);
      }else{
        $this->viewcontacto->Mostrar(null);
      }
  }
}
?>