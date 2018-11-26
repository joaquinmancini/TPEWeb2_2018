<?php
require_once('Api.php');
class ApiSecuredController extends Api
{
    private $logged;
    private $admin;
    public function __construct()
    {
        parent::__construct();
        session_start();
        if(isset($_SESSION['USER'])){
            if (time() - $_SESSION['LAST_ACTIVITY'] > 1000000) {
                $this->logged = false;
                $this->admin = false;
            }
            $_SESSION['LAST_ACTIVITY'] = time();
            $this->logged = true;
            if ($_SESSION['ADMIN'] == 1)
                $this->admin = true;
            else
                $this->admin = false;
        }else{
            $this->logged = false;
            $this->admin = false;
        }
    }
    function Logueado(){
        return $this->logged;
    }
    function esAdmin(){
        return $this->admin;
    }
}