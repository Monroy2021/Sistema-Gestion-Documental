<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/DataAccessObjects/userDAO.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/userVO.php";
header('Content-type: application/json');

require_once($namerute);
require_once($namerute1);

session_start();

$userlogin = new userDAO();
$usersVO = new userVO();


if(isset($_POST['option']) && $_POST['option'] == "login"){
    $username = $_POST['nameuser'];
    $userpass = $_POST['passworduser'];
    $usersVO = $userlogin->readUser($username,$userpass);
    $_SESSION['usernom'] = $usersVO->getNom_pers();
    $_SESSION['userape'] = $usersVO->getApe_pers();
    $_SESSION['userol'] =  $usersVO->getNom_rol();
    $_SESSION['useremp'] = $usersVO->getId_emp();
    $user = array(
        'ced_user'=>$usersVO->getCed_pers(),
        'nom_user'=>$usersVO->getNom_pers(),
        'ape_user'=>$usersVO->getApe_pers()
    );
    echo json_encode($user);
}

if(isset($_POST['option']) && $_POST['option'] == "close"){
    unset($_SESSION['usernom']); 
    unset($_SESSION['userape']);
    unset($_SESSION['userol']); 
    unset($_SESSION['useremp']);
    session_unset();
    session_destroy();
    $respuesta = "OK";
    echo json_encode($respuesta);
}
    



?>