<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/tipropertyDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/tipropertyVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllertiproperty{
        //Atributo privado el que va invocar nuestra clase catproperty
        private $tiprop;
        
        public function __construct(){
            $this->tiprop = new tipropertyDAO();
        }
            public function create($tipropVO){
                return $this->tiprop->create($tipropVO);
            }
        
            public function read(){
                return $this->tiprop->read();
            }

            public function readProperty($id_tip_prop){
                return $this->tiprop->readProperty($id_tip_prop);
            }

            public function update($tipropVO){
                return $this->tiprop->update($tipropVO);
            }
        
            public function delete($id_tip_prop){
                return $this->tiprop->delete($id_tip_prop);   
            }
        
    }

?>