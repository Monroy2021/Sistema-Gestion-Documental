<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/rolDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/rolVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllerrol{
        //Atributo privado el que va invocar nuestra clase rol
        private $rol;
        
        public function __construct(){
            $this->rol = new rolDAO();
        }
            public function create($rolVO){
                return $this->rol->create($rolVO);
            }
        
            public function read(){
                return $this->rol->read();
            }

            public function readNom_rol($id_rol){
                return $this->rol->readNom_rol($id_rol);
            }
        
            public function update($rolVO){
                return $this->rol->update($rolVO);
            }
        
            public function delete($id_rol){
                return $this->rol->delete($id_rol);   
            }
        
    }