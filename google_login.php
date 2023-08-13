<!DOCTYPE html><html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="content-language" content="en-Us">
		<link rel="stylesheet" type="text/css" href="layout.css" /> 
	<title>Signin to Webapp</title>
</head>
<body>
<?php
	// Handle the callback after Google Sign-In
	// include the Google API PHP client library
	require_once 'google-api-php-client--PHP7.4/vendor/autoload.php';
	
	// Google Client configuration
	$googClientID = '929704032553-00u0ts295fqhjre2ld2ccqhf7h0ekct8.apps.googleusercontent.com';
	$googClientSecret = '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';

	// Initialize the Google API Client
	$gClient = new Google_Client();
	$gClient->setApplicationName('Login to marom.dev');
	$gClient->setClientId($googClientID);
	$gClient->setClientSecret($googClientSecret);
	$gClient->setRedirectUri('https://marom.dev/php-signin-with-google/google_login.php');
	
	// What are the data fields we'd like to get from the user once they've logged in
	$gClient->setScopes('email');
	$gClient->setScopes('profile');
	
	
	if (isset($_GET['code'])) 
	{
	 	$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$gClient->setAccessToken($token);
		
		
		// Use $token to fetch user info from Google API
		$gOAuthClient = new Google_Service_Oauth2($gClient);
		$gUserProfile = $gOAuthClient->userinfo->get();
    
		//print_r($gUserProfile);
	
	    // You can now use $gUserProfile to access user information
	    $user_email = $gUserProfile->email;
		$user_given_name = $gUserProfile->givenName;
		$user_family_name = $gUserProfile->familyName;
		$user_name = $gUserProfile->name;
		$user_id = $gUserProfile->id;
	    
		echo "Youv'e succesfully logged in using Google Sign-In!<br><br>";		
		echo "Your email is: ".$user_email."<br>";
		echo "Your name is: ".$user_name."<br>";
	}

?>	
</body>
</html>







