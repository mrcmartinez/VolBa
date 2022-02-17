<?php

include_once 'models/personal.php';

class ConsultaModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];

        try{

            $query = $this->db->connect()->query("SELECT concat_ws(' ', apellido_paterno, apellido_materno,
                                                                    nombre) as nombreConcat,id_personal,estatus FROM personal;");

            while($row = $query->fetch()){
                $item = new Personal();
                $item->id_personal = $row['id_personal'];
                $item->estatus = $row['estatus'];
                $item->completo = $row['nombreConcat'];
                array_push($items, $item);
            }
            //  $this->view->$completo;
            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function getById($id){
        $item = new Personal();

        $query = $this->db->connect()->prepare("SELECT * FROM personal WHERE id_personal = :id_personal");
        try{
            $query->execute(['id_personal' => $id]);

            while($row = $query->fetch()){
                $item->id_personal = $row['id_personal'];
                $item->nombre = $row['nombre'];
                $item->estatus = $row['estatus'];

            }

            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE personal SET nombre = :nombre, estatus = :estatus WHERE id_personal = :id_personal");
        try{
            $query->execute([
                'id_personal'=> $item['id_personal'],
                'nombre'=> $item['nombre'],
                'estatus'=> $item['estatus']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare("DELETE FROM personal WHERE id_personal = :id");
        try{
            $query->execute([
                'id'=> $id,
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}

?>