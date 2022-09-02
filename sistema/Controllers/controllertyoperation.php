<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/tyoperationDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/tyoperationVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllertyoperation{
        //Atributo privado el que va invocar nuestra clase tyoperation
        private $tyoperation;
        
        public function __construct(){
            $this->tyoperation = new tyoperationDAO();
        }
            public function create($tyoperationVO){
                return $this->tyoperation->create($tyoperationVO);
            }
        
            public function read(){
                return $this->tyoperation->read();
            }

            public function readTipoper($id_tip_oper){
                return $this->tyoperation->readTipoper($id_tip_oper);
            }
        
            public function update($tyoperationVO){
                return $this->tyoperation->update($tyoperationVO);
            }
        
            public function delete($id_tip_oper){
                return $this->tyoperation->delete($id_tip_oper);   
            }
        
    }