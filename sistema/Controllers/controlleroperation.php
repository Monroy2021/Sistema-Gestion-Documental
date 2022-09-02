<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/operationDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/operationVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controlleroperation{
        //Atributo privado el que va invocar nuestra clase catproperty
        private $oper;
        
        public function __construct(){
            $this->oper = new operationDAO();
        }
            public function create($operVO){
                return $this->oper->create($operVO);
            }
        
            public function read(){
                return $this->oper->read();
            }

            public function readOper($cod_reg_oper){
                return $this->oper->readOper($cod_reg_oper);
            }

            public function update($operVO){
                return $this->oper->update($operVO);
            }
        
            public function delete($cod_reg_oper){
                return $this->oper->delete($cod_reg_oper);   
            }
        
    }

?>