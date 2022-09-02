<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerproperty.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/propertyVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

$getproperty = new controllerproperty();

if(isset($_POST['accion']) && $_POST['accion'] == "searchproperty"){
    $arreglo = array();
    $cod_reg_oper = $_POST["codregoper"];
    $propVO = new propertyVO();
    $propVO = $getproperty->readPropoper($cod_reg_oper);
    $propVO->getId_prop();
    $propVO->getId_tip_prop();
    $propVO->getNom_tip_prop(); 
    $propVO->getDir_prop();
    $propVO->getUbi_prop();
    $propVO->getDesc_prop();

    $elementos = array("id_prop"=>$propVO->getId_prop(), 
                        "id_tip_prop"=>$propVO->getId_tip_prop(), 
                        "nom_tip_prop"=>$propVO->getNom_tip_prop(),
                        "dir_prop"=>$propVO->getDir_prop(),
                        "ubi_prop"=>$propVO->getUbi_prop(), 
                        "desc_prop"=>$propVO->getDesc_prop()
                        );
    $arreglo[]=$elementos;
    
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);

}

?>