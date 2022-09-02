<?php
class personVO{
    public $ced_pers;
    public $id_emp;
    public $nom_emp;
    public $nom_pers;
    public $ape_pers;
    public $fec_exp_ced_pers;
    public $cel_pers;
    public $tel_pers;
    public $email_pers;
    public $sex_pers;
    public $dir_pers;
    public $ciud_pers;
    public $fec_reg_pers;
    public $fec_act_pers;

    public function __construct(){
    }

    //Funciones que se obtienen los valores de los atributos del objeto

    public function getCed_pers(){
        return $this->ced_pers;
    }

    public function getId_emp(){
        return $this->id_emp;
    }

    public function getNom_emp(){
        return $this->nom_emp;
    }

    public function getNom_pers(){
        return $this->nom_pers;
    }

    public function getApe_pers(){
        return $this->ape_pers;
    }

    public function getFec_exp_ced_pers(){
        return $this->fec_exp_ced_pers;
    }

    public function getCel_pers(){
        return $this->cel_pers;
    }

    public function getTel_pers(){
        return $this->tel_pers;
    }

    public function getEmail_pers(){
        return $this->email_pers;
    }

    public function getSex_pers(){
        return $this->sex_pers;
    }

    public function getDir_pers(){
        return $this->dir_pers;
    }

    public function getCiud_pers(){
        return $this->ciud_pers;
    }

    public function getFec_reg_pers(){
        return $this->fec_reg_pers;
    }

    public function getFec_act_pers(){
        return $this->fec_act_pers;
    }

    //Funciones para recuperar los valores de los atributos del objeto

    public function setCed_pers($ced_pers){
        $this->ced_pers = $ced_pers;
    }

    public function setId_emp($id_emp){
        $this->id_emp = $id_emp;
    }

    public function setNom_emp($nom_emp){
        $this->nom_emp = $nom_emp;
    }

    public function setNom_pers($nom_pers){
        $this->nom_pers = $nom_pers;
    }

    public function setApe_pers($ape_pers){
        $this->ape_pers = $ape_pers;
    }

    public function setFec_exp_ced_pers($fec_exp_ced_pers){
        $this->fec_exp_ced_pers = $fec_exp_ced_pers;
    }

    public function setCel_pers($cel_pers){
        $this->cel_pers = $cel_pers;
    }

    public function setTel_pers($tel_pers){
        $this->tel_pers = $tel_pers;
    }

    public function setEmail_pers($email_pers){
        $this->email_pers = $email_pers;
    }

    public function setSex_pers($sex_pers){
        $this->sex_pers = $sex_pers;
    }

    public function setDir_pers($dir_pers){
        $this->dir_pers = $dir_pers;
    }

    public function setCiud_pers($ciud_pers){
        $this->ciud_pers = $ciud_pers;
    }

    public function setFec_reg_pers($fec_reg_pers){
        $this->fec_reg_pers = $fec_reg_pers;
    }

    public function setFec_act_pers($fec_act_pers){
        $this->fec_act_pers = $fec_act_pers;
    }
    
}
?>