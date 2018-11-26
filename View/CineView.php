<?php
require('libs/Smarty.class.php');

class CineView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function Mostrar($Titulo, $Cines, $Pelicula, $User){
    $smarty= new Smarty();
    $this->Smarty->assign('Titulo',$Titulo); // El 'Titulo' del assign puede ser cualquier valor
    $this->Smarty->assign('Cines',$Cines);
    $this->Smarty->assign('Peliculas', $Pelicula);
    $this->Smarty->assign('User', $User);
    $this->Smarty->display('templates/cine.tpl');

  }

  function MostrarEditarCine($Titulo,$Cine, $User){
    $this->Smarty->assign('Titulo',$Titulo); 
    $this->Smarty->assign('Cine',$Cine);
    $this->Smarty->assign('User', $User); 

    //$smarty->debugging = true;
    $this->Smarty->display('templates/MostrarEditarCine.tpl');
  }
  function MostrarEliminarCine($Titulo,$Cine,$User){
    $smarty= new Smarty();
    $this->Smarty->assign('Titulo',$Titulo); // El 'Titulo' del assign puede ser cualquier valor
    $this->Smarty->assign('Cine',$Cine);
    $this->Smarty->assign('User', $User); 
    $this->Smarty->display('templates/eliminarCine.tpl');

  }

}

 ?>
