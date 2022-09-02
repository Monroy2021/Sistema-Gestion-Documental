<?php
class fileVO{
    public $cod_carp;
    public $cod_tip_carp;
    public $nom_tip_carp;
    public $cod_reg_oper;
    public $desc_oper;
    public $des_carp; 

    public function __construct(){
    }

    //Funciones que se obtienen los valores de los atributos del objeto

    public function getCod_carp(){
        return $this->cod_carp;
    }

    public function getCod_tip_carp(){
        return $this->cod_tip_carp;
    }

    public function getNom_tip_carp(){
        return $this->nom_tip_carp;
    }

    public function getCod_reg_oper(){
        return $this->cod_reg_oper;
    }

    public function getDesc_oper(){
        return $this->desc_oper;
    }

    public function getDes_carp(){
        return $this->des_carp;
    }

  

    //Funciones para recuperar los valores de los atributos del objeto

    public function setCod_carp($cod_carp){
        $this->cod_carp = $cod_carp;
    }

    public function setCod_tip_carp($cod_tip_carp){
        $this->cod_tip_carp = $cod_tip_carp;
    }

    public function setNom_tip_carp($nom_tip_carp){
        $this->nom_tip_carp = $nom_tip_carp;
    }

    public function setCod_reg_oper($cod_reg_oper){
        $this->cod_reg_oper = $cod_reg_oper;
    }

    public function setDesc_oper($desc_oper){
        $this->desc_oper = $desc_oper;
    }

    public function setDes_carp($des_carp){
        $this->des_carp = $des_carp;
    }
    
}
?>