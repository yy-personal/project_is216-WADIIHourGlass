<?php
require_once "include/AccountDAO.php";
session_start();
//  this step is important !!!!!to retrieve the json from axios
//============================================================
$request_body = file_get_contents('php://input');
$_POST = json_decode($request_body, true);
if (!isset($_POST)){
	header('location: login.php');
	return;	
}
//============================================================

if( isset($_POST['email']) && isset($_POST['password']) ) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if( $email != '' && $pass != '' ) {
        // authenticate from DB
        $dao = new AccountDAO;
        $dbPassword = $dao->getPassword($email);
        $msg = "Authentication failed!";
		//  successs
        if( password_verify($pass, $dbPassword)){
            //  go to rediect right away
            $msg = "Authentication successful!";
            $out['error'] = false;
            $out['message'] = $msg;
            $name = $dao->getUserName($email);
            $out['name'] = $name;
            header("Content-type: application/json");
            echo json_encode($out);
			return;
        }
        else{
            $msg = "Invalid email or Password!";
            $out['error'] = true;
            $out['message'] = $msg;
            header("Content-type: application/json");
            echo json_encode($out);
			return;

        }
    }
    else {
        $error = 'Both fields must be non-empty!';
        $out['error'] = true;
        $out['message'] = $error;
        header("Content-type: application/json");
        echo json_encode($out);
        return;
    }
}
else {
    $error = 'Unauthorized access. Log in here!';
    $out['error'] = true;
    $out['message'] = $error;
    header("Content-type: application/json");
    echo json_encode($out);
    return;
}

?>