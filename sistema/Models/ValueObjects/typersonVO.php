<?php
class typersonVO{
    public $id_tip_pers;
    public $nom_tip_pers;
    public $des_tip_pers;

    public function __construct(){
    }

     //Funciones que se obtienen los valores de los atributos del objeto

    public function getId_tip_pers(){
        return $this->id_tip_pers;
    }

    public function getNom_tip_pers(){
        return $this->nom_tip_pers;
    }

    public function getDes_tip_pers(){
        return $this->des_tip_pers;
    }

    //Funciones para recuperar los valores de los atributos del objeto

    public function setId_tip_pers($id_tip_pers){
        $this->id_tip_pers = $id_tip_pers;
    }

    public function setNom_tip_pers($nom_tip_pers){
        $this->nom_tip_pers = $nom_tip_pers;
    }

    public function setDes_tip_pers($des_tip_pers){
        $this->des_tip_pers = $des_tip_pers;
    }

}
?>