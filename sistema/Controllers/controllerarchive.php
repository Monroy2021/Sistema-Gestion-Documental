<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/archiveDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/archiveVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllerarchive{
        //Atributo privado el que va invocar nuestra clase archive
        private $archive;
        
        public function __construct(){
            $this->archive = new archiveDAO();
        }
            public function create($archVO){
                return $this->archive->create($archVO);
            }
        
            public function read(){
                return $this->archive->read();
            }

            public function readArchive($cod_arch){
                return $this->archive->readArchive($cod_arch);
            }
        
            public function update($archVO){
                return $this->archive->update($archVO);
            }
        
            public function delete($cod_arch){
                return $this->archive->delete($cod_arch);   
            }
        
    }