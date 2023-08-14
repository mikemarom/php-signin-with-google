<!DOCTYPE html><html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="content-language" content="en-Us">
		<link rel="stylesheet" type="text/css" href="layout.css" /> 
	<title>Signin to Webapp</title>
</head>
<body>
<?php
	// define new cleanup() function - clean up data
    function cleanup($data)
		{
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
    	}
	
	// Get the username and password from the $_POST call object
 	$username = cleanup($_POST['username']);  
    $hashed_pass = hash('md5',cleanup($_POST['password']));
	
	$users_database = array(							// mock username table with sample data
		0 => array(
			"id" => "1",
			"username" => "abcd",
			"password_hash" => "b4af804009cb036a4ccdc33431ef9ac9", 	// this is the MD5 hahh password 'pass1234'
			"validation_method" => "direct", 						// this user is directly registered on this site, not logged in via Google Sign-In
			"name" => "Bill Jones",
			"email" => "bill.jones.com"
			)
		,
		1 => array(
			"id" => "2",
			"username" => "john",
			"password_hash" => "5ebe2294ecd0e0f08eab7690d2a6ee69", 	// this is the MD5 hahh password 'secret',
			"validation_method" => "direct", 						// this user is directly registered on this site, not logged in via Google Sign-In
			"name" => "Jimmy Ross",
			"email" => "jross@gmail.com"
		)
	);
	
	
	//is the username & password in our username table?
	$found_user = false;
	$found_user_id = 0;
	$found_user_name = "";
	$found_user_email = "";
	
	foreach ($users_database as &$single_user_in_database)
	{
		if (($single_user_in_database['username']===$username) && ($single_user_in_database['password_hash'] === $hashed_pass))
		{
			$found_user = true;
			$found_user_id = $single_user_in_database['id'];
			$found_user_name = $single_user_in_database['name'];
			$found_user_email = $single_user_in_database['email'];
		}
	
	}
	
	if ($found_user == false)
	{
		echo "User not found, login unsuccessful";
	}
	else
	{
		echo "Youv'e succesfully logged in using the direct login!<br><br>";	
		echo "User id ".$found_user_id." is logged in<br>";
		echo "User name is ".$found_user_name."<br>";
		echo "User email is ".$found_user_email."<br>";
	}

?>	
</body>
</html>







