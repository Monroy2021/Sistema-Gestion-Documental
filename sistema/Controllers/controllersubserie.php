<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/subserieDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/subserieVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllersubserie{
        //Atributo privado el que va invocar nuestra clase archive
        private $subse;
        
        public function __construct(){
            $this->subse = new subserieDAO();
        }
            public function create($subseVO){
                return $this->subse->create($subseVO);
            }
        
            public function read(){
                return $this->subse->read();
            }

            public function readSubse($id_subse){
                return $this->subse->readSubse($id_subse);
            }
        
            public function update($subseVO){
                return $this->subse->update($subseVO);
            }
        
            public function delete($id_subse){
                return $this->subse->delete($id_subse);   
            }
        
    }