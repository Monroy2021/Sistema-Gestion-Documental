<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/typersonDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/typersonVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllertyperson{
        //Atributo privado el que va invocar nuestra clase rol
        private $typerson;
        
        public function __construct(){
            $this->typerson = new typersonDAO();
        }
            public function create($typersonVO){
                return $this->typerson->create($typersonVO);
            }
        
            public function read(){
                return $this->typerson->read();
            }

            public function readTipers($id_tip_pers){
                return $this->typerson->readNom_rol($id_tip_pers);
            }
        
            public function update($typersonVO){
                return $this->typerson->update($typersonVO);
            }
        
            public function delete($id_tip_pers){
                return $this->typerson->delete($id_tip_pers);   
            }
        
    }