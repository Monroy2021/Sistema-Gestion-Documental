<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllertyperson.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/typersonVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

    $getyperson = new controllertyperson();

    $arreglo = array();
    $datatable = array();

    $datatable = $getyperson->read();
    foreach($datatable as $r)
    {
        $elementos = array("id_tip_pers"=>$r->getId_tip_pers(), 
                            "nom_tip_pers"=>$r->getNom_tip_pers(), 
                            "des_tip_pers"=>$r->getDes_tip_pers()
                        );
        $arreglo[]=$elementos;
    }
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){
        $id_tip_pers = $_POST['idtipers'];
        $nom_tip_pers = $_POST['nomtipers'];
        $des_tip_pers = $_POST['destipers'];
        $typersonVO = new typersonVO();
        $typersonVO->setId_tip_pers($id_tip_pers);
        $typersonVO->setNom_tip_pers($nom_tip_pers);  
        $typersonVO->setDes_tip_pers($des_tip_pers);            
        $getyperson->create($typersonVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){
        $id_tip_pers = $_POST['idtipers'];
        $nom_tip_pers = $_POST['nomtipers'];
        $des_tip_pers = $_POST['destipers'];
        $typersonVO = new typersonVO();
        $typersonVO->setId_tip_pers($id_tip_pers);
        $typersonVO->setNom_tip_pers($nom_tip_pers);  
        $typersonVO->setDes_tip_pers($des_tip_pers);            
        $getyperson->update($typersonVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        $id_tip_pers = $_POST['idtipers'];
        $getyperson->delete($id_tip_pers);
    }
?>