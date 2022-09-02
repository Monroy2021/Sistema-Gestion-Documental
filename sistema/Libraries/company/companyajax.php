<?php
    $namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllercompany.php";
    $namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/companyVO.php";
    header('Content-type: application/json');
    require_once($namerute);
    require_once($namerute1);

    $getcompany = new controllercompany();

    $arreglo = array();
    $datatable = array();
    $datatable = $getcompany->read();
    foreach($datatable as $r)
    {
        $elementos = array("id_emp"=>$r->getId_emp(),
                            "nit_emp"=>$r->getNit_emp(),
                            "nom_emp"=>$r->getNom_emp(),
                            "dir_emp"=>$r->getDir_emp(),
                            "reg_emp"=>$r->getReg_emp()
                        );
        $arreglo[]=$elementos;
    }
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){
        $nitempresa = $_POST['nitempresa'];
        $nomempresa = $_POST['nomempresa'];
        $dirempresa = $_POST['dirempresa'];
        $regempresa = $_POST['regempresa'];
        $compVO = new companyVO();
        $compVO->setNit_emp($nitempresa);
        $compVO->setNom_emp($nomempresa);
        $compVO->setDir_emp($dirempresa);
        $compVO->setReg_emp($regempresa);
        $getcompany->create($compVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){
        $idempresa = $_POST['idempresa'];
        $nitempresa = $_POST['nitempresa'];
        $nomempresa = $_POST['nomempresa'];
        $dirempresa = $_POST['dirempresa'];
        $regempresa = $_POST['regempresa'];
        $compVO = new companyVO();
        $compVO->setId_emp($idempresa);
        $compVO->setNit_emp($nitempresa);
        $compVO->setNom_emp($nomempresa);
        $compVO->setDir_emp($dirempresa);
        $compVO->setReg_emp($regempresa);
        $getcompany->update($compVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        $idempresa = $_POST['idempresa'];
        $getcompany->delete($idempresa);
    }


?>