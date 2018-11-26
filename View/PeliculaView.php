<?php

class PeliculaView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function Mostrar($Titulo, $Pelicula, $id_cine, $User,$Cines){
    $this->Smarty->assign('Titulo',$Titulo); // El 'Titulo' del assign puede ser cualquier valor
    $this->Smarty->assign('Peliculas', $Pelicula);
    $this->Smarty->assign('id_cine', $id_cine);
    $this->Smarty->assign('Cines',$Cines);
    $this->Smarty->assign('User', $User);
    $this->Smarty->display('templates/pelicula.tpl');
  }
  function MostrarPeliculas($Titulo, $Pelicula,$User,$Cant,$Imagenes){
    $this->Smarty->assign('Titulo',$Titulo); // El 'Titulo' del assign puede ser cualquier valor
    $this->Smarty->assign('Peliculas', $Pelicula);
    $this->Smarty->assign('User', $User);
    $this->Smarty->assign('Cant', $Cant);
    $this->Smarty->assign('Imagenes', $Imagenes);
    $this->Smarty->display('templates/peliculas.tpl');
  }

  function MostrarPeliculasCondicion($Titulo, $Pelicula, $User, $Cant){
    $this->Smarty->assign('Titulo',$Titulo); // El 'Titulo' del assign puede ser cualquier valor
    $this->Smarty->assign('Peliculas', $Pelicula);
    $this->Smarty->assign('User', $User);
    $this->Smarty->assign('Cant', $Cant);
    $this->Smarty->assign('Imagenes', null);
    $this->Smarty->display('templates/peliculas.tpl');
  }
  

  function MostrarEditarPelicula($Titulo,$Pelicula, $User,$Cines){
    $this->Smarty->assign('Titulo',$Titulo);
    $this->Smarty->assign('Pelicula',$Pelicula);
    $this->Smarty->assign('Cines',$Cines);
    $this->Smarty->assign('User', $User);

    $this->Smarty->display('templates/MostrarEditarPelicula.tpl');
  }

}

 ?>
