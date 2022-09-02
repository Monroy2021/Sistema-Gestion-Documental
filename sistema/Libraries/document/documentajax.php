<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerdocument.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/documentVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

$getdocument = new controllerdocument();

if(isset($_POST['accion']) && $_POST['accion'] == "search"){
    $cod_carp = $_POST['codcarp'];
    $arreglo = array();
    $datatable = array();
    $datatable = $getdocument->readDocumentscarp($cod_carp);

    foreach($datatable as $r)
    {
        $elementos = array("cod_doc"=>$r->getCod_doc(),
                            "cod_carp"=>$r->getCod_carp(),
                            "id_subse"=>$r->getId_subse(),
                            "nom_subse"=>$r->getNom_subse(),
                            "orden_subse"=>$r->getOrden_subse(),
                            "nom_doc"=>$r->getNom_doc(),
                            "id_sop"=>$r->getId_sop(),
                            "orden_doc"=>$r->getOrden_doc(),
                            "orden_sop"=>$r->getOrden_sop(),
                            "rep_sop"=>$r->getRep_sop(),
                            "nom_sop"=>$r->getNom_sop(),
                            "ext_arch_sop"=>$r->getExt_arch_sop()
                        );
        $arreglo[]=$elementos;
    }
    
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);
}

if(isset($_POST['accion']) && $_POST['accion'] == "subserie"){
    $cod_reg_oper = $_POST['codregoper'];
    $arreglo = array();
    $datatable = array();
    $datatable = $getdocument->readSubserie($cod_reg_oper);

    foreach($datatable as $r)
    {
        $elementos = array(
                            "id_subse"=>$r->getId_subse(),
                            "nom_subse"=>$r->getNom_subse()
                        );
        $arreglo[]=$elementos;
    }
    
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);
}

if(isset($_POST['accion']) && $_POST['accion'] == "searchdocuments"){
    $cod_reg_oper = $_POST['codregoper'];
    $id_subse = $_POST['idsubse'];
    $arreglo = array();
    $datatable = array();
    $datatable = $getdocument->readDocumentsubse($cod_reg_oper, $id_subse);

    foreach($datatable as $r)
    {
        $elementos = array("cod_doc"=>$r->getCod_doc(),
                            "cod_carp"=>$r->getCod_carp(),
                            "id_subse"=>$r->getId_subse(),
                            "nom_subse"=>$r->getNom_subse(),
                            "nom_doc"=>$r->getNom_doc(),
                            "tip_arch_doc"=>$r->getTip_arch_doc(),
                            "nom_sop"=>$r->getNom_sop(),
                            "rep_sop"=>$r->getRep_sop(),
                            "ext_arch_sop"=>$r->getExt_arch_sop()
                        );
        $arreglo[]=$elementos;
    }
    
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);
}


?>