<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/catpropertyDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/catpropertyVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllercatproperty{
        //Atributo privado el que va invocar nuestra clase catproperty
        private $catprop;
        
        public function __construct(){
            $this->catprop = new catpropertyDAO();
        }
            public function create($catpropVO){
                return $this->catprop->create($catpropVO);
            }
        
            public function read(){
                return $this->catprop->read();
            }

            public function readCatproperty($id_cat_prop){
                return $this->catprop->readCatproperty($id_cat_prop);
            }

            public function update($catpropVO){
                return $this->catprop->update($catpropVO);
            }
        
            public function delete($id_cat_prop){
                return $this->catprop->delete($id_cat_prop);   
            }
        
    }

?>