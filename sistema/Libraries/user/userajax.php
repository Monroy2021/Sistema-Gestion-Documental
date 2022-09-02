<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controlleruser.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/userVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

    $getuser = new controlleruser();

    $arreglo = array();
    $datatable = array();

    $datatable = $getuser->read();
    foreach($datatable as $r)
    {
        $elementos = array("cod_usua"=>$r->getCod_usua(), 
                            "ced_pers"=>$r->getCed_pers(), 
                            "nom_pers"=>$r->getNom_pers(),
                            "ape_pers"=>$r->getApe_pers(),
                            "id_rol"=>$r->getId_rol(), 
                            "nom_rol"=>$r->getNom_rol(),
                            "nom_usua"=>$r->getNom_usua(), 
                            "pass_usua"=>$r->getPass_usua(),
                            "fec_ing_usua"=>$r->getFec_ing_usua()
                        );
        $arreglo[]=$elementos;
    }
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){
        $cedpers = $_POST['cedpers'];
        $idrol = $_POST['idrol'];
        $nomuser = $_POST['nomuser'];
        $passuser = $_POST['passuser'];
        $fec_ing_user = date("Y-m-d");
        $userVO = new userVO();
        $userVO->setCed_pers($cedpers);
        $userVO->setId_rol($idrol);
        $userVO->setNom_usua($nomuser);
        $userVO->setPass_usua($passuser);
        $userVO->setFec_ing_usua($fec_ing_user);             
        $getuser->create($userVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){
        $coduser = $_POST['coduser'];
        $cedpers = $_POST['cedpers'];
        $idrol = $_POST['idrol'];
        $nomuser = $_POST['nomuser'];
        $passuser = $_POST['passuser'];
        $fec_ing_user = date("Y-m-d");
        $userVO = new userVO();
        $userVO->setCod_usua($coduser);
        $userVO->setCed_pers($cedpers);
        $userVO->setId_rol($idrol);
        $userVO->setNom_usua($nomuser);
        $userVO->setPass_usua($passuser);
        $userVO->setFec_ing_usua($fec_ing_user);             
        $getuser->update($userVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        $coduser = $_POST['coduser'];
        $getuser->delete($coduser);
    }
?>