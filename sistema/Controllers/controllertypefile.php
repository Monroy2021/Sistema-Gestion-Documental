<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/typefileDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/typefileVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllertypefile{
        //Atributo privado el que va invocar nuestra clase typefile
        private $typfile;
        
        public function __construct(){
            $this->typfile = new typefileDAO();
        }
            public function create($typfileVO){
                return $this->typfile->create($typfileVO);
            }
        
            public function read(){
                return $this->typfile->read();
            }

            public function readTipcarp($cod_tip_carp){
                return $this->typfile->readTipcarp($cod_tip_carp);
            }

            public function readTipcarpleasing($cod_reg_oper){
                return $this->typfile-> readTipcarpleasing($cod_reg_oper);
            }

            public function update($typfileVO){
                return $this->typfile->update($typfileVO);
            }
        
            public function delete($cod_tip_carp){
                return $this->typfile->delete($cod_tip_carp);   
            }
        
    }

?>