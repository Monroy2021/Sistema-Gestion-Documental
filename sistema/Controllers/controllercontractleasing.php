<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/contractleasingDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/contractleasingVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllercontractleasing{
        //Atributo privado el que va invocar nuestra clase catproperty
        private $ca;
        
        public function __construct(){
            $this->ca = new contractleasingDAO();
        }
            
        
            public function read(){
                return $this->ca->read();
            }

            public function readContractleasing(){
                return $this->ca->readContractleasing();
            }

            
        
    }