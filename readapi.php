<?php

/*By POSTMAN CLIENT */
	// This file will interact with the ct_users table
	// adding header to access rest api using http server
	header('Access-Control-Allow-Origin : *'); // public api
	header('Content-Type: application/json');

	include 'config.php';
	include 'user.php';

	// instantiating DB objects & connect
	$database = new Database();
	$db = $database->connect();

	// Instantiate ct_user from server
	$user = new User($db);

	// Storing query result
	$result = $user->read();

	//Getting row count
	$num = $result->rowCount();

	// Check if there are users in ct_users
	if($num > 0)
	{
		//User Array
		$user_arr = array();

		//user array inside users_arr in json format 
		$users_arr['details'] =  array();

		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);

			// takes user details in a array
			$user_details = array(
			    'id' => $id,
				'user_email' => $user_email,
				'user_pwd' => $user_pwd,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'phone' => $phone,
				'zip' => $zip,
				'$address' => $address,
				'city' => $city,
				'state' => $state,
				'notes' => $notes,
				'vc_status' => $vc_status,
				'p_status' => $p_status,
				'contactt_status' => $contact_status,
				'status' => $status,
				'usertype' => $usertype
			    );

		// Pushing data to 'details' object
		array_push($users_arr['details'], $user_details);

		}// while end

		// converting php array data into JSON format
		echo json_encode($users_arr);


	}else 
	{
		// There are no user registered
		echo json_encode(
			array('message' => 'No user registered')
		);
	}

?>