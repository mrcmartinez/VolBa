<?php

class Consulta extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->personal = [];
        
        //echo "<p>Nuevo controlador Main</p>";
    }

    function render(){
        $personal = $this->model->get();
        $this->view->personal = $personal;
        $this->view->render('consulta/index');
    }

    function verPersonal($param = null){
        $idPersonal = $param[0];
        $personal = $this->model->getById($idPersonal);

        session_start();
        $_SESSION['id_verPersonal'] = $personal->matricula;
        $this->view->personal = $personal;
        $this->view->mensaje = "";
        $this->view->render('consulta/detalle');
    }

    function actualizarPersonal(){
        session_start();
        $matricula = $_SESSION['id_verPersonal'];
        $nombre    = $_POST['nombre'];
        $apellido  = $_POST['apellido'];

        unset($_SESSION['id_verPersonal']);

        if($this->model->update(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido] )){
            // actualizar Personal exito
            $personal = new Personal();
            $personal->matricula = $matricula;
            $personal->nombre = $nombre;
            $personal->apellido = $apellido;
            
            $this->view->personal = $personal;
            $this->view->mensaje = "Personal actualizado correctamente";
        }else{
            // mensaje de error
            $this->view->mensaje = "No se pudo actualizar el Persoanl";
        }
        $this->view->render('consulta/detalle');
    }

    function eliminarPersonal($param = null){
        $matricula = $param[0];

        if($this->model->delete($matricula)){
            //$this->view->mensaje = "Personal eliminado correctamente";
            $mensaje = "Personal eliminado correctamente";
        }else{
            // mensaje de error
            //$this->view->mensaje = "No se pudo eliminar el Personal";
            $mensaje = "No se pudo eliminar el personal";
        }
        //$this->render();
        
        echo $mensaje;
    }
}

?>