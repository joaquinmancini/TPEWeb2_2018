<?php


require_once "config/ConfigApp.php";
require_once "Model/CreateDDBBModel.php";
require_once "Controller/MostrarController.php";
require_once "Controller/CineController.php";
require_once "Controller/UsuarioController.php";
require_once "Controller/LoginController.php";
require_once "Controller/SecuredController.php";
require_once "View/ContactoView.php";
require_once "View/HomeView.php";
require_once "Controller/PeliculaController.php";

function parseURL($url)
{
  $urlExploded = explode('/', $url);
  $arrayReturn[ConfigApp::$ACTION] = $urlExploded[0];

  
  $arrayReturn[ConfigApp::$PARAMS] = isset($urlExploded[1]) ? array_slice($urlExploded,1) : null;
  return $arrayReturn;
}

if(isset($_GET['action'])){

    $urlData = parseURL($_GET['action']);
    $action = $urlData[ConfigApp::$ACTION]; 
    if(array_key_exists($action,ConfigApp::$ACTIONS)){
        $params = $urlData[ConfigApp::$PARAMS];
        $action = explode('#',ConfigApp::$ACTIONS[$action]); 
        $controller =  new $action[0]();
        $metodo = $action[1];
        if(isset($params) &&  $params != null){
            echo $controller->$metodo($params);
        }
        else{
            echo $controller->$metodo();
        }
    }else{
      $controller =  new CineController();
      echo $controller->Home();
    }
}
 ?>
