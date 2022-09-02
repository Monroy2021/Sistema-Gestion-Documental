<?php
class tipropertyVO{
    public $id_tip_prop;
    public $id_cat_prop;
    public $nom_cat_prop;
    public $nom_tip_prop;
    public $desc_tip_prop;
    
    public function __construct(){
    }

    //Funciones que se obtienen los valores de los atributos del objeto

    public function getId_tip_prop(){
        return $this->id_tip_prop;
    }

    public function getId_cat_prop(){
        return $this->id_cat_prop;
    }

    public function getNom_cat_prop(){
        return $this->nom_cat_prop;
    }

    public function getNom_tip_prop(){
        return $this->nom_tip_prop;
    }

    public function getDes_tip_prop(){
        return $this->desc_tip_prop;
    }

    //Funciones para recuperar los valores de los atributos del objeto

    public function setId_tip_prop($id_tip_prop){
        $this->id_tip_prop = $id_tip_prop;
    }

    public function setId_cat_prop($id_cat_prop){
        $this->id_cat_prop = $id_cat_prop;
    }

    public function setNom_cat_prop($nom_cat_prop){
        $this->nom_cat_prop = $nom_cat_prop;
    }

    public function setNom_tip_prop($nom_tip_prop){
        $this->nom_tip_prop = $nom_tip_prop;
    }

    public function setDes_tip_prop($desc_tip_prop){
        $this->desc_tip_prop = $desc_tip_prop;
    }

}

?>