<?php

class userVO{
    public $id_emp;
    public $cod_usua;
    public $ced_pers;
    public $nom_pers;
    public $ape_pers;
    public $id_rol;
    public $nom_rol;
    public $nom_usua;
    public $pass_usua;
    public $fec_ing_usua;

    public function __construct(){
    }

    //Funciones que se obtienen los valores de los atributos del objeto

    public function getId_emp(){
        return $this->id_emp;
    }

    public function getCod_usua(){
        return $this->cod_usua;
    }

    public function getCed_pers(){
        return $this->ced_pers;
    }

    public function getNom_pers(){
        return $this->nom_pers;
    }

    public function getApe_pers(){
        return $this->ape_pers;
    }

    public function getId_rol(){
        return $this->id_rol;
    }

    public function getNom_rol(){
        return $this->nom_rol;
    }

    public function getNom_usua(){
        return $this->nom_usua;
    }

    public function getPass_usua(){
        return $this->pass_usua;
    }

    public function getFec_ing_usua(){
        return $this->fec_ing_usua;
    }

    //Funciones para recuperar los valores de los atributos del objeto

    public function setId_emp($id_emp){
        $this->id_emp = $id_emp;
    }

    public function setCod_usua($cod_usua){
        $this->cod_usua = $cod_usua;
    }

    public function setCed_pers($ced_pers){
        $this->ced_pers = $ced_pers;
    }

    public function setNom_pers($nom_pers){
        $this->nom_pers = $nom_pers;
    }

    public function setApe_pers($ape_pers){
        $this->ape_pers = $ape_pers;
    }

    public function setId_rol($id_rol){
        $this->id_rol = $id_rol;
    }

    public function setNom_rol($nom_rol){
        $this->nom_rol = $nom_rol;
    }

    public function setNom_usua($nom_usua){
        $this->nom_usua = $nom_usua;
    }

    public function setPass_usua($pass_usua){
        $this->pass_usua = $pass_usua;
    }

    public function setFec_ing_usua($fec_ing_usua){
        $this->fec_ing_usua = $fec_ing_usua;
    }

}

?>