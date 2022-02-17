<?php

class Inicio extends Controller{

    function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador Main</p>";
    }

    function render(){
        $this->view->render('inicio/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo</p>";
    }
}

?>