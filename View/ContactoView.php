<?php

class ContactoView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function Mostrar($User=''){
    $this->Smarty->assign('Titulo',"Contacto");
    $this->Smarty->assign('User',$User);
    
    $this->Smarty->display('templates/contacto.tpl');
  }

}

 ?>