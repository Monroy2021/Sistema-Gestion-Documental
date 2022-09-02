<?php
class propertyVO{
    public $id_prop;
    public $id_tip_prop;
    public $nom_tip_prop;
    public $dir_prop;
    public $ubi_prop;
    public $desc_prop;

    public function __construct(){
    }

     //Funciones que se obtienen los valores de los atributos del objeto

    public function getId_prop(){
        return $this->id_prop;
    }

    public function getId_tip_prop(){
        return $this->id_tip_prop;
    }

    public function getNom_tip_prop(){
        return $this->nom_tip_prop;
    }

    public function getDir_prop(){
        return $this->dir_prop;
    }

    public function getUbi_prop(){
        return $this->ubi_prop;
    }

    public function getDesc_prop(){
        return $this->desc_prop;
    }
    //Funciones para recuperar los valores de los atributos del objeto

    public function setId_prop($id_prop){
        $this->id_prop = $id_prop;
    }

    public function setId_tip_prop($id_tip_prop){
        $this->id_tip_prop = $id_tip_prop;
    }

    public function setNom_tip_prop($nom_tip_prop){
        $this->nom_tip_prop = $nom_tip_prop;
    }

    public function setDir_prop($dir_prop){
        $this->dir_prop = $dir_prop;
    }

    public function setUbi_prop($ubi_prop){
        $this->ubi_prop = $ubi_prop;
    }

    public function setDesc_prop($desc_prop){
        $this->desc_prop = $desc_prop;
    }

}
?>