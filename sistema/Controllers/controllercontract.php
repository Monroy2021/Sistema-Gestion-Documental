<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/contractDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/contractVO.php";
    require_once($namerute);
    require_once($namerute1);
    
    class controllercontract{
        //Atributo privado el que va invocar nuestra clase empresa
        private $contract;
        
        public function __construct(){
            $this->contract = new contractDAO();
        }
            public function create($conVO){
                return $this->contract->create($conVO);
            }
        
            public function read(){
                return $this->contract->read();
            }

            public function readPersoncontract($cod_reg_oper){
                return $this->contract->readPersoncontract($cod_reg_oper);
            }

            public function readContract($ced_pers, $cod_reg_oper, $id_tip_pers){
                return $this->contract->readContract($ced_pers, $cod_reg_oper, $id_tip_pers);
            }
        
            public function update($conVO){
                return $this->contract->update($conVO);
            }
        
            public function delete($id_con){
                return $this->contract->delete($id_con);   
            }
        
    }
?>