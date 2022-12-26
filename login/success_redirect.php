<?php

session_start();
if ($_POST['name'] == ''){
	header('location: login.php');
	return;	
}
else{
	$_SESSION['name'] = isset($_POST['name']) ? $_POST['name'] : '';
	header('location: ../homepage.php');
	return;	
}

?>

