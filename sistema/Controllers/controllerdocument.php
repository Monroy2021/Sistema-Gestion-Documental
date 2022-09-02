<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/documentDAO.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/documentVO.php";
    require_once($namerute);
    require_once($namerute1);

    class controllerdocument{
        //Atributo privado el que va invocar nuestra clase catproperty
        private $document;
        
        public function __construct(){
            $this->document = new documentDAO();
        }
            public function create($docVO){
                return $this->document->create($docVO);
            }
        
            public function read(){
                return $this->document->read();
            }

            public function readDoc($cod_doc){
                return $this->document->readDoc($cod_doc);
            }

            public function readDocumentfile($cod_carp, $subserie_doc, $nom_doc){
                return $this->document->readDocumentfile($cod_carp, $subserie_doc, $nom_doc);
            }

            public function readDocumentfileordendoc($cod_carp, $subserie_doc, $orden_doc){
                return $this->document->readDocumentfileordendoc($cod_carp, $subserie_doc, $orden_doc);
            }

            public function readDocumentscarp($cod_carp){
                return $this->document->readDocumentscarp($cod_carp);
            }

            public function readSubserie($cod_carp){
                return $this->document->readSubserie($cod_carp);
            }

            public function readDocumentsubse($cod_carp, $id_subse){
                return $this->document->readDocumentsubse($cod_carp, $id_subse);
            }

            public function countSopdocumentcarp($cod_carp, $cod_doc){
                return $this->document->countSopdocumentcarp($cod_carp, $cod_doc);
            }

            public function update($docVO){
                return $this->document->update($docVO);
            }
        
            public function delete($cod_doc){
                return $this->document->delete($cod_doc);   
            }
        
    }

?>