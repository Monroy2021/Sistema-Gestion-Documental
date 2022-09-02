<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/serieDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/serieVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllerserie{
        //Atributo privado el que va invocar nuestra clase archive
        private $serie;
        
        public function __construct(){
            $this->serie = new serieDAO();
        }
            public function create($serieVO){
                return $this->serie->create($serieVO);
            }
        
            public function read(){
                return $this->serie->read();
            }

            public function readSerie($id_serie){
                return $this->serie->readSerie($id_serie);
            }
        
            public function update($serieVO){
                return $this->serie->update($serieVO);
            }
        
            public function delete($id_serie){
                return $this->serie->delete($id_serie);   
            }
        
    }