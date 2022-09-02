<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllercatproperty.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/catpropertyVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

    $getcatproperty = new controllercatproperty();

    $arreglo = array();
    $datatable = array();

    $datatable = $getcatproperty->read();
    foreach($datatable as $r)
    {
        $elementos = array("id_cat_prop"=>$r->getId_cat_prop(), 
                            "nom_cat_prop"=>$r->getNom_cat_prop(), 
                            "desc_cat_prop"=>$r->getDes_cat_prop()
                        );
        $arreglo[]=$elementos;
    }
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){
        $id_cat_prop = $_POST['idcatprop'];
        $nom_cat_prop = $_POST['nomcatprop'];
        $desc_cat_prop = $_POST['descatprop'];
        $catpropVO = new catpropertyVO();
        $catpropVO->setId_cat_prop($id_cat_prop);
        $catpropVO->setNom_cat_prop($nom_cat_prop);
        $catpropVO->setDes_cat_prop($desc_cat_prop);              
        $getcatproperty->create($catpropVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){
        $id_cat_prop = $_POST['idcatprop'];
        $nom_cat_prop = $_POST['nomcatprop'];
        $desc_cat_prop = $_POST['descatprop'];
        $catpropVO = new catpropertyVO();
        $catpropVO->setId_cat_prop($id_cat_prop);
        $catpropVO->setNom_cat_prop($nom_cat_prop);
        $catpropVO->setDes_cat_prop($desc_cat_prop);  
        $getcatproperty->update($catpropVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        $id_cat_prop = $_POST['idcatprop'];
        $getcatproperty->delete($id_cat_prop);
    }
?>