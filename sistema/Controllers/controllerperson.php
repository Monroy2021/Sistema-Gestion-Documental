<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/personDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/personVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllerperson{
        //Atributo privado el que va invocar nuestra clase person
        private $person;
        
        public function __construct(){
            $this->person = new personDAO();
        }
            public function create($personVO){
                return $this->person->create($personVO);
            }
        
            public function read(){
                return $this->person->read();
            }

            public function readPerson($ced_pers){
                return $this->person->readPerson($ced_pers);
            }
        
            public function update($personVO){
                return $this->person->update($personVO);
            }
        
            public function delete($ced_pers){
                return $this->person->delete($ced_pers);   
            }
        
    }

?>