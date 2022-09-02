<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllertyoperation.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/tyoperationVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

    $getyoperation = new controllertyoperation();

    $arreglo = array();
    $datatable = array();

    $datatable = $getyoperation->read();
    foreach($datatable as $r)
    {
        $elementos = array("id_tip_oper"=>$r->getCod_tip_oper(), 
                            "nom_tip_oper"=>$r->getNom_tip_oper(), 
                            "desc_tip_oper"=>$r->getDes_tip_oper()
                        );
        $arreglo[]=$elementos;
    }
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){
        $id_tip_pers = $_POST['idtipoper'];
        $nom_tip_pers = $_POST['nomtipoper'];
        $des_tip_pers = $_POST['destipoper'];
        $tipoperVO = new tyoperationVO();
        $tipoperVO->setCod_tip_oper($id_tip_pers);
        $tipoperVO->setNom_tip_oper($nom_tip_pers);  
        $tipoperVO->setDes_tip_oper($des_tip_pers);            
        $getyoperation->create($tipoperVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){
        $id_tip_pers = $_POST['idtipoper'];
        $nom_tip_pers = $_POST['nomtipoper'];
        $des_tip_pers = $_POST['destipoper'];
        $tipoperVO = new tyoperationVO();
        $tipoperVO->setCod_tip_oper($id_tip_pers);
        $tipoperVO->setNom_tip_oper($nom_tip_pers);  
        $tipoperVO->setDes_tip_oper($des_tip_pers);            
        $getyoperation->update($tipoperVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        $id_tip_oper = $_POST['idtipoper'];
        $getyoperation->delete($id_tip_oper);
    }
?>