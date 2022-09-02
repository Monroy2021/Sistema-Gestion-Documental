<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/propertyDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/propertyVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllerproperty{
        //Atributo privado el que va invocar nuestra clase catproperty
        private $prop;
        
        public function __construct(){
            $this->prop = new propertyDAO();
        }
            public function create($propVO){
                return $this->prop->create($propVO);
            }
        
            public function read(){
                return $this->prop->read();
            }

            public function readProp($id_prop){
                return $this->prop->readProp($id_prop);
            }

            public function readPropoper($cod_reg_oper){
                return $this->prop->readPropoper($cod_reg_oper);
            }

            public function update($propVO){
                return $this->prop->update($propVO);
            }
        
            public function delete($id_prop){
                return $this->prop->delete($id_prop);   
            }
        
    }

?>