<?php

define('HOME', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
define('LOGIN', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/login');
define('LOGOUT', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/logout');
define('CINES', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/cines');
define('PELICULAS', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/peliculas');
define('PELICULASCINE', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/peliculasPorCine/');


class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      ''=> 'MostrarController#MostrarHome',
      'home'=> 'MostrarController#MostrarHome',
      'contacto' =>'MostrarController#MostrarContacto',
      'cines'=> 'CineController#Cine',
      'alertBorrar'=> 'CineController#OpcionBorrarCine',
      'borrar'=> 'CineController#borrarCine',
      'borrarPelicula'=> 'PeliculaController#BorrarPelicula',
      'editar'=> 'CineController#EditarCine',
      'editarPelicula'=> 'PeliculaController#EditarPelicula',
      'guardarEditarPelicula'=> 'PeliculaController#GuardarEditarPelicula',
      'agregar'=> 'CineController#InsertCine',
      'agregarPelicula'=> 'PeliculaController#InsertPelicula',
      'peliculasPorCine' => 'PeliculaController#MostrarPeliculasPorCine',
      'peliculas' => 'PeliculaController#MostrarPeliculas',
      'pelicula' => 'PeliculaController#MostrarPelicula',
      'guardarEditar'=> 'CineController#GuardarEditarCine',
      'login'=> 'LoginController#login',
      'verificarLogin' => 'LoginController#verificarLogin',
      'registro'=> 'UsuarioController#registro',
      'insertarUsuario'=> 'UsuarioController#InsertUsuario',
      'logout'=> 'LoginController#logout',
      'mostrarPeliculaCondicion' => 'PeliculaController#MostrarPeliculaCondicion',
      'agregarImagen' => 'PeliculaController#agregarImagen',
    ];

}

 ?>
