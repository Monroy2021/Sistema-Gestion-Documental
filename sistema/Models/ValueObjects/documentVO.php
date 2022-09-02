<?php
class documentVO{
    public $cod_doc;
    public $cod_carp;
    public $nom_carp;
    public $id_subse;
    public $nom_subse;
    public $orden_subse;
    public $nom_doc;
    public $desc_doc;
    public $tip_arch_doc;
    public $orden_doc;
    public $cod_doc_prop;
    public $id_sop;
    public $nom_sop;
    public $orden_sop;
    public $rep_sop;
    public $ext_arch_sop;

    public function __construct(){
    }

     //Funciones que se obtienen los valores de los atributos del objeto

    public function getCod_doc(){
        return $this->cod_doc;
    }

    public function getCod_carp(){
        return $this->cod_carp;
    }

    public function getNom_carp(){
        return $this->nom_carp;
    }

    public function getId_subse(){
        return $this->id_subse;
    }

    public function getNom_subse(){
        return $this->nom_subse;
    }

    public function getOrden_subse(){
        return $this->orden_subse;
    }

    public function getNom_doc(){
        return $this->nom_doc;
    }

    public function getOrden_doc(){
        return $this->orden_doc;
    }

    public function getDesc_doc(){
        return $this->desc_doc;
    }

    public function getTip_arch_doc(){
        return $this->tip_arch_doc;
    }

    public function getCod_doc_prop(){
        return $this->cod_doc_prop;
    }

    public function getId_sop(){
        return $this->id_sop;
    }

    public function getNom_sop(){
        return $this->nom_sop;
    }

    public function getOrden_sop(){
        return $this->orden_sop;
    }

    public function getRep_sop(){
        return $this->rep_sop;
    }

    public function getExt_arch_sop(){
        return $this->ext_arch_sop;
    }

    //Funciones para recuperar los valores de los atributos del objeto

    public function setCod_doc($cod_doc){
        $this->cod_doc = $cod_doc;
    }

    public function setCod_carp($cod_carp){
        $this->cod_carp = $cod_carp;
    }

    public function setNom_carp($nom_carp){
        $this->nom_carp = $nom_carp;
    }

    public function setId_subse($id_subse){
        $this->id_subse = $id_subse;
    }

    public function setNom_subse($nom_subse){
        $this->nom_subse = $nom_subse;
    }

    public function setOrden_subse($orden_subse){
        $this->orden_subse = $orden_subse;
    }

    public function setNom_doc($nom_doc){
        $this->nom_doc = $nom_doc;
    }

    public function setDesc_doc($desc_doc){
        $this->desc_doc = $desc_doc;
    }

    public function setTip_arch_doc($tip_arch_doc){
        $this->tip_arch_doc = $tip_arch_doc;
    }

    public function setOrden_doc($orden_doc){
        $this->orden_doc = $orden_doc;
    }

    public function setCod_doc_prop($cod_doc_prop){
        $this->cod_doc_prop = $cod_doc_prop;
    }

    public function setId_sop($id_sop){
        $this->id_sop = $id_sop;
    }

    public function setNom_sop($nom_sop){
        $this->nom_sop = $nom_sop;
    }

    public function setRep_sop($rep_sop){
        $this->rep_sop = $rep_sop;
    }

    public function setOrden_sop($orden_sop){
        $this->orden_sop = $orden_sop;
    }

    public function setExt_arch_sop($ext_arch_sop){
        $this->ext_arch_sop = $ext_arch_sop;
    }

}
?>