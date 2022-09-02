<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/soporteDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/soporteVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllersoporte{
        //Atributo privado el que va invocar nuestra clase archive
        private $sop;
        
        public function __construct(){
            $this->sop = new soporteDAO();
        }
            public function create($sopVO){
                return $this->sop->create($sopVO);
            }
        
            public function read(){
                return $this->sop->read();
            }

            public function readSop($id_sop){
                return $this->sop->readSop($id_sop);
            }

            public function readSoporteDocument($cod_carp, $id_subse, $cod_doc){
                return $this->sop->readSoporteDocument($cod_carp, $id_subse, $cod_doc);
            }

            public function readSopdocumentcarp($cod_carp, $cod_doc, $id_sop){
                return $this->sop->readSopdocumentcarp($cod_carp, $cod_doc, $id_sop);
            }

            public function readCarpdocumentsop($cod_carp, $cod_doc){
                return $this->sop->readCarpdocumentsop($cod_carp, $cod_doc);
            }
        
            public function update($sopVO){
                return $this->sop->update($sopVO);
            }
        
            public function delete($id_sop){
                return $this->sop->delete($id_sop);   
            }

            public function deleteSoportecarpdoc($cod_carp, $cod_doc, $id_sop){
                return $this->sop->deleteSoportecarpdoc($cod_carp, $cod_doc, $id_sop);   
            }

        
    }