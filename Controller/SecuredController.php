<?php

class SecuredController
{

  function __construct(){
    session_start();
    if(isset($_SESSION["User"])){
      if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 200)) {
        $this->logout(); 
        // destruye la sesión, y vuelve al login
      }
        $_SESSION['LAST_ACTIVITY'] = time(); 
        // actualiza el último instante de actividad
    }
  }  

  function logout(){
    session_start();
    session_destroy();
    header(LOGIN);
  }

  function chequearUser(){
    if(isset($_SESSION["User"])){        
      $User = $_SESSION["User"];
    }else{
      $User ='';
    }
    return $User;
  }

}

 ?>
