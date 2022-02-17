<?php

class Consulta extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->personal = [];
        
        //echo "<p>Nuevo controlador Inicio</p>";
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
        $_SESSION['id_verPersonal'] = $personal->id_personal;
        $this->view->personal = $personal;
        $this->view->mensaje = "";
        $this->view->render('consulta/detalle');
    }

    function actualizarPersonal(){
        session_start();
        $id_personal = $_SESSION['id_verPersonal'];
        $nombre    = $_POST['nombre'];
        $estatus  = $_POST['estatus'];

        unset($_SESSION['id_verPersonal']);

        if($this->model->update(['id_personal' => $id_personal, 'nombre' => $nombre, 'estatus' => $estatus] )){
            // actualizar Personal exito
            $personal = new Personal();
            $personal->id_personal = $id_personal;
            $personal->nombre = $nombre;
            $personal->estatus = $estatus;
            
            $this->view->personal = $personal;
            $this->view->mensaje = "Personal actualizado correctamente";
        }else{
            // mensaje de error
            $this->view->mensaje = "No se pudo actualizar el Persoanl";
        }
        $this->view->render('consulta/detalle');
    }

    function eliminarPersonal($param = null){
        $id_personal = $param[0];

        if($this->model->delete($id_personal)){
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