<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/contractmandateDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/contractmandateVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllercontractmandate{
        //Atributo privado el que va invocar nuestra clase catproperty
        private $cm;
        
        public function __construct(){
            $this->cm = new contractmandateDAO();
        }
            
        
            public function read(){
                return $this->cm->read();
            }

            public function readContractmandate(){
                return $this->cm->readContractmandate();
            }

            
        
    }

?>