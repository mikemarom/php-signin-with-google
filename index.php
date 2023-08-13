<!DOCTYPE html><html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="content-language" content="en-Us">
	<title>Signin to Webapp</title>
</head>
<body>
	
	<p style="font-size: 36px; padding-bottom: 40px;">Sign in to webapp:</p>
	<p>
		Direct login:
	<form action="direct_login.php" method="POST">
			<input type="text" name="username" placeholder="User Name"><br>
			<input type="password" name="password" placeholder="Password"><br> 
	        <button type="submit">Login</button>
	</form>
	<p style="padding-top: 40px;padding-bottom: 40px;">Alternatively, login via Google Sign-In:</p>
	
	<?php 
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
	$gClient->setScopes(array('profile','email'));
	
	
	$auth_url = $gClient->createAuthUrl();
	
	echo '<a href="'.filter_var($auth_url, FILTER_SANITIZE_URL).'" class="login-btn">Sign in with Google</a>';
	?>
		
</body>
</html>










