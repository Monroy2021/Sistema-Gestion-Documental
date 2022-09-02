<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/userDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/userVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controlleruser{
        //Atributo privado el que va invocar nuestra clase person
        private $user;
        
        public function __construct(){
            $this->user = new userDAO();
        }
            public function create($userVO){
                return $this->user->create($userVO);
            }
        
            public function read(){
                return $this->user->read();
            }

            public function readUsua($cod_usua){
                return $this->user->readUsua($ced_pers);
            }

            public function readPers($cod_usua){
                return $this->user->readPers($ced_pers);
            }
        
            public function update($userVO){
                return $this->user->update($userVO);
            }
        
            public function delete($cod_usua){
                return $this->user->delete($cod_usua);   
            }
        
    }

?>