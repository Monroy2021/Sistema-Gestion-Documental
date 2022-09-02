<?php
class typefileVO{
    public $cod_tip_carp;
    public $cod_arch;
    public $nom_arch; 
    public $num_arch;
    public $nom_tip_carp; 
    public $orden_tip_carp;
    public $desc_tip_carp;

    public function __construct(){
    }

     //Funciones que se obtienen los valores de los atributos del objeto

    public function getCod_tip_carp(){
        return $this->cod_tip_carp;
    }

    public function getCod_arch(){
        return $this->cod_arch;
    }

    public function getNom_arch(){
        return $this->nom_arch;
    } 

    public function getNum_arch(){
        return $this->num_arch;
    } 

    public function getNom_tip_carp(){
        return $this->nom_tip_carp;
    } 

    public function getOrden_tip_carp(){
        return $this->orden_tip_carp;
    } 

    public function getDesc_tip_carp(){
        return $this->desc_tip_carp;
    }

    //Funciones para recuperar los valores de los atributos del objeto

    public function setCod_tip_carp($cod_tip_carp){
        $this->cod_tip_carp = $cod_tip_carp;
    }

    public function setCod_arch($cod_arch){
        $this->cod_arch = $cod_arch;
    }

    public function setNom_arch($nom_arch){
        $this->nom_arch = $nom_arch;
    }
    
    public function setNum_arch($num_arch){
        $this->num_arch = $num_arch;
    } 

    public function setNom_tip_carp($nom_tip_carp){
        $this->nom_tip_carp = $nom_tip_carp;
    } 

    public function setOrden_tip_carp($orden_tip_carp){
        $this->orden_tip_carp = $orden_tip_carp;
    } 

    public function setDesc_tip_carp($desc_tip_carp){
        $this->desc_tip_carp = $desc_tip_carp;
    }

}
?>