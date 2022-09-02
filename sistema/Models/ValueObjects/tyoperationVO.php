<?php
class tyoperationVO{
    public $cod_tip_oper;
    public $nom_tip_oper;
    public $des_tip_oper;

    public function __construct(){
    }

     //Funciones que se obtienen los valores de los atributos del objeto

    public function getCod_tip_oper(){
        return $this->cod_tip_oper;
    }

    public function getNom_tip_oper(){
        return $this->nom_tip_oper;
    }

    public function getDes_tip_oper(){
        return $this->des_tip_oper;
    }

    //Funciones para recuperar los valores de los atributos del objeto

    public function setCod_tip_oper($cod_tip_oper){
        $this->cod_tip_oper = $cod_tip_oper;
    }

    public function setNom_tip_oper($nom_tip_oper){
        $this->nom_tip_oper = $nom_tip_oper;
    }

    public function setDes_tip_oper($des_tip_oper){
        $this->des_tip_oper = $des_tip_oper;
    }

}
?>