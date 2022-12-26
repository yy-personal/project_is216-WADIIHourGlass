<?php

session_start();

require_once 'include/AccountDAO.php';

//  this step is important !!!!!to retrieve the json from axios
//============================================================
$request_body = file_get_contents('php://input');
$_POST = json_decode($request_body, true);
// , 'post'=>$_POST add this into $out to view in console
//============================================================
if (!isset($_POST)){
	header('location: register.php');
	return;	
}
$out = array('error' => false);

if( isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirmPassword'];
    
    if( $email != '' && $name != '' && $pass != '' && $confirm_pass != '' ) {
        // Check if passwords match
        if( $pass != $confirm_pass ) {
            $error = 'Passwords do not match!';
            $out['error'] = true;
            $out['message'] = $error;
            header("Content-type: application/json");
            echo json_encode($out);
            return;            
        }
        else {
            
            // echo "email: $email <br> Pass: $pass <br> Confirm Pass: $confirm_pass <hr>";
            $dao = new AccountDAO;
            $dbUser = $dao->getUserEmail($email);
            if  ($dbUser == $email){
                $out['error'] = true;
                $out['message'] = "User already exists with the email!";
                header("Content-type: application/json");
                echo json_encode($out);
                return;
            }
            else{
                // encrypt pass into hash pass and register
                $hashedPass= password_hash($pass, PASSWORD_DEFAULT);
                $status = $dao->register($email, $name, $hashedPass);
    
                if ($status){
                    $name = $dao->getUserName($email);
                    $out['name'] = $name;
                    // send back to register -- not in use
                    $out['error'] = false;
                    header("Content-type: application/json");
                    echo json_encode($out);
                    return;
    
                }else{
                    $out['error'] = true;
                    $out['message'] = $status;
                    header("Content-type: application/json");
                    echo json_encode($out);
                    return;
                }
            }
        }

    }
    else {
        $error = 'All fields must be non-empty!';
        $out['error'] = true;
        $out['message'] = $error;
        header("Content-type: application/json");
        echo json_encode($out);
        return;
    }

}
else {
    $error = 'Unauthorized access. Register here!';
    $out['error'] = true;
    $out['message'] = $error;
    header("Content-type: application/json");
    echo json_encode($out);
    return;
}

?>
