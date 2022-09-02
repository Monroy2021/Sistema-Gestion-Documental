<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerfile.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/fileVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

$getfile = new controllerfile();

if(isset($_POST['accion']) && $_POST['accion'] == "search"){
    $cod_tip_carp = $_POST['codtipcarp'];
    $cod_reg_oper = $_POST['codregoper'];
    
    $arreglo = array();
    $fileVO = new fileVO();
    $fileVO = $getfile->readFilecontract($cod_tip_carp, $cod_reg_oper);
    $elementos = array("cod_carp"=>$fileVO->getCod_carp(),
                        "cod_tip_carp"=>$fileVO->getCod_tip_carp(),
                        "cod_reg_oper"=>$fileVO->getCod_reg_oper(),
                        "desc_oper"=>$fileVO->getDesc_oper(),
                        "desc_carp"=>$fileVO->getDes_carp()
                        );
    $arreglo[]=$elementos;
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);
}

?>