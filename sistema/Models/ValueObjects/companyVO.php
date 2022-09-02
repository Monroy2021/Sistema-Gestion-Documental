<?php

class companyVO{

    public $id_emp;
    public $nit_emp;
    public $nom_emp;
    public $dir_emp;
    public $reg_emp;
    
    public function __construct(){
    }

    //Funciones que se obtienen los valores de los atributos del objeto

    public function getId_emp(){
        return $this->id_emp;
    }

    public function getNit_emp(){
        return $this->nit_emp;
    }

    public function getNom_emp(){
        return $this->nom_emp;
    }

    public function getDir_emp(){
        return $this->dir_emp;
    }

    public function getReg_emp(){
        return $this->reg_emp;
    }

    //Funciones para recuperar los valores de los atributos del objeto

    public function setId_emp($id_emp){
        $this->id_emp = $id_emp;
    }

    public function setNit_emp($nit_emp){
        $this->nit_emp = $nit_emp;
    }

    public function setNom_emp($nom_emp){
        $this->nom_emp = $nom_emp;
    }

    public function setDir_emp($dir_emp){
        $this->dir_emp = $dir_emp;
    }

    public function setReg_emp($reg_emp){
        $this->reg_emp = $reg_emp;
    }

}

?>