<?php

class HomeView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function Mostrar($User=''){
    $this->Smarty->assign('Titulo',"Inicio");
    $this->Smarty->assign('User',$User);
    $this->Smarty->display('templates/home.tpl');
  }

}

 ?>