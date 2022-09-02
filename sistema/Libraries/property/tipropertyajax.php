<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllertiproperty.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/tipropertyVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

    $getiproperty = new controllertiproperty();

    $arreglo = array();
    $datatable = array();

    $datatable = $getiproperty->read();
    foreach($datatable as $r)
    {
        $elementos = array("id_tip_prop"=>$r->getId_tip_prop(),
                            "id_cat_prop"=>$r->getId_cat_prop(), 
                            "nom_cat_prop"=>$r->getNom_cat_prop(),
                            "nom_tip_prop"=>$r->getNom_tip_prop(), 
                            "desc_tip_prop"=>$r->getDes_tip_prop()
                        );
        $arreglo[]=$elementos;
    }
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){
        $id_tip_prop = $_POST['idtiprop'];
        $id_cat_prop = $_POST['idcatprop'];
        $nom_tip_prop = $_POST['nomtiprop'];
        $desc_tip_prop = $_POST['destiprop'];
        $tipropVO = new tipropertyVO();
        $tipropVO->setId_tip_prop($id_tip_prop);
        $tipropVO->setId_cat_prop($id_cat_prop);
        $tipropVO->setNom_tip_prop($nom_tip_prop);
        $tipropVO->setDes_tip_prop($desc_tip_prop);              
        $getiproperty->create($tipropVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){
        $id_tip_prop = $_POST['idtiprop'];
        $id_cat_prop = $_POST['idcatprop'];
        $nom_tip_prop = $_POST['nomtiprop'];
        $desc_tip_prop = $_POST['destiprop'];
        $tipropVO = new tipropertyVO();
        $tipropVO->setId_tip_prop($id_tip_prop);
        $tipropVO->setId_cat_prop($id_cat_prop);
        $tipropVO->setNom_tip_prop($nom_tip_prop);
        $tipropVO->setDes_tip_prop($desc_tip_prop);  
        $getiproperty->update($tipropVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        $id_tip_prop = $_POST['idtiprop'];
        $getiproperty->delete($id_tip_prop);
    }
?>