<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/fileDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/fileVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllerfile{
        //Atributo privado el que va invocar nuestra clase catproperty
        private $file;
        
        public function __construct(){
            $this->file = new fileDAO();
        }
            public function create($fileVO){
                return $this->file->create($fileVO);
            }
        
            public function read(){
                return $this->file->read();
            }

            public function readFile($cod_carp){
                return $this->file->readFile($cod_carp);
            }

            public function readFilecontract($cod_tip_carp, $cod_reg_oper){
                return $this->file->readFilecontract($cod_tip_carp, $cod_reg_oper);
            }

            public function update($fileVO){
                return $this->file->update($fileVO);
            }
        
            public function delete($cod_carp){
                return $this->file->delete($cod_carp);   
            }
        
    }

?>