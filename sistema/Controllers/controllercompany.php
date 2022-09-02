<?php

    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/companyDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/companyVO.php";
    require_once($namerute);
    require_once($namerute1);
    
    class controllercompany{
        //Atributo privado el que va invocar nuestra clase empresa
        private $company;
        
        public function __construct(){
            $this->company = new companyDAO();
        }
            public function create($compVO){
                return $this->company->create($compVO);
            }
        
            public function read(){
                return $this->company->read();
            }

            public function readNom_emp($nom_emp){
                return $this->company->readNom_emp($nom_emp);
            }
        
            public function update($compVO){
                return $this->company->update($compVO);
            }
        
            public function delete($id_emp){
                return $this->company->delete($id_emp);   
            }
        
    }
?>