<?php
class catpropertyVO{
    public $id_cat_prop;
    public $nom_cat_prop;
    public $desc_cat_prop;
    
    public function __construct(){
    }

    //Funciones que se obtienen los valores de los atributos del objeto

    public function getId_cat_prop(){
        return $this->id_cat_prop;
    }

    public function getNom_cat_prop(){
        return $this->nom_cat_prop;
    }

    public function getDes_cat_prop(){
        return $this->desc_cat_prop;
    }

    //Funciones para recuperar los valores de los atributos del objeto

    public function setId_cat_prop($id_cat_prop){
        $this->id_cat_prop = $id_cat_prop;
    }

    public function setNom_cat_prop($nom_cat_prop){
        $this->nom_cat_prop = $nom_cat_prop;
    }

    public function setDes_cat_prop($desc_cat_prop){
        $this->desc_cat_prop = $desc_cat_prop;
    }
}

?>