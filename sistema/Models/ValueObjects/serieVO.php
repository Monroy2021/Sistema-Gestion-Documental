<?php
class serieVO{
    public $id_serie;
    public $nom_serie;
    public $desc_serie;
    
    public function __construct(){
    }

    //Funciones que se obtienen los valores de los atributos del objeto

    public function getId_serie(){
        return $this->id_serie;
    }

    public function getNom_serie(){
        return $this->nom_serie;
    }

    public function getDesc_serie(){
        return $this->desc_serie;
    }
  

    //Funciones para recuperar los valores de los atributos del objeto

    public function setId_serie($id_serie){
        $this->id_serie = $id_serie;
    }

    public function setNom_serie($nom_serie){
        $this->nom_serie = $nom_serie;
    }

    public function setDesc_serie($desc_serie){
        $this->desc_serie = $desc_serie;
    }
    
}
?>