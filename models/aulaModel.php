<?php

require_once('dbModel.php');

class aula extends database {

    private $id;
    private $capacity;
    private $user;

    public function setAula($id) {
        $sql = "SELECT*FROM aula WHERE idAula = $id";
        $query = parent::executeQuery($sql);
        $data = $query -> fetch_array();
        $this->id = $data['idAula'];
        $this->capacity = $data['Capacidad'];
        $this->user = $data['idUsuario'];
    }

    public function validate($id){
        $sql = "SELECT idAula FROM aula WHERE idAula = '$id'";
        $query = parent::executeQuery($sql);
        $data = $query->fetch_array();

        if (!$query) {
            return false;
        }elseif(in_array($id,$data)){
            return true;
        }else{
            return false;
        }
    }

    public function getData($data) {

        $sql = "SELECT*FROM aula_user WHERE idAula = '$this->id'";
        $query = parent::executeQuery($sql);
        $array = $query->fetch_array();

        switch ($data) {
            case 'id':
                return $array['idAula'];
                break;

            case 'capacidad':
                return $array['Capacidad'];;
                break;

            case 'userNombre':
                return $array['Nombre'];;
                break;

            case 'userApellido':
                return $array['Apellido'];;
                break;

            case 'all':
                return $array;
                break;

            default:
                $advise = 'Este dato no existe';
                return $advise;
                break;
        }
    }
}


?>