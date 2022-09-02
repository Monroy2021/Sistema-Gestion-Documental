<?php
class archiveVO{
    public $cod_arch;
    public $nom_arch;
    public $num_arch; 
    public $tip_arch; 
    public $desc_arch;

    public function __construct(){
    }

     //Funciones que se obtienen los valores de los atributos del objeto

    public function getCod_arch(){
        return $this->cod_arch;
    }

    public function getNom_arch (){
        return $this->nom_arch;
    }

    public function getNum_arch(){
        return $this->num_arch;
    } 

    public function getTip_arch(){
        return $this->tip_arch;
    } 

    public function getDesc_arch(){
        return $this->desc_arch;
    }

    //Funciones para recuperar los valores de los atributos del objeto

    public function setCod_arch($cod_arch){
        $this->cod_arch = $cod_arch;
    }

    public function setNom_arch($nom_arch){
        $this->nom_arch = $nom_arch;
    }

    public function setNum_arch($num_arch){
        $this->num_arch = $num_arch;
    } 

    public function setTip_arch($tip_arch){
        $this->tip_arch = $tip_arch;
    } 

    public function setDesc_arch($desc_arch){
        $this->desc_arch = $desc_arch;
    }

}
?>