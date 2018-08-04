<?php 
    
	require_once 'app/include/database.php';
	require_once 'app/include/functions.php';

	if (isset ($_POST['email'])) {

		$email =trim($_POST['email']);
		echo $email;

		$insert_result = insert_subscriber( $email);

		$header ='Location: /toond/?subscribe=';
		$header .=$insert_result;

		header($header);
//функция работы над email
	} else {
		header('Location: /toond');
	}

	
?>