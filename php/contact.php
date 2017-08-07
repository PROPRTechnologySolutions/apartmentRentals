<?php

 //connect to MySQL and our Database
    $conn = mysqli_connect("localhost", "root", "mysql");
    mysqli_select_db($conn, "loftyHeights");

//Retrieve form data. 
//GET - user submitted data using AJAX
//POST - in case user does not support javascript, we'll use POST instead
$firstName = ($_GET['firstName']) ? $_GET['firstName'] : $_POST['firstName'];
$firstName = mysqli_real_escape_string($conn, $firstName);
$lastName = ($_GET['lastName']) ? $_GET['lastName'] : $_POST['lastName'];
$lastName = mysqli_real_escape_string($conn, $lastName);
$email = ($_GET['email']) ?$_GET['email'] : $_POST['email'];
$username = ($_GET['username']) ?$_GET['username'] : $_POST['username'];
$password = ($_GET['password']) ?$_GET['password'] : $_POST['password'];
$requestType = ($_GET['requestType']) ?$_GET['requestType'] : $_POST['requestType'];
$qSubscribe = ($_GET['qSubscribe']) ?$_GET['qSubscribe'] : $_POST['qSubscribe'];
$comments = ($_GET['comments']) ?$_GET['comments'] : $_POST['comments'];
$message = mysqli_real_escape_string($conn, $comments);

//flag to indicate which method it uses. If POST set it to 1

if ($_POST) $post=1;

//Simple server side validation for POST data, of course, you should validate the email
if (!$firstName) $errors[count($errors)] = 'Please enter your name.';
if (!$lastName) $errors[count($errors)] = 'Please enter your name.';
if (!$email) $errors[count($errors)] = 'Please enter your email.'; 
if (!$comments) $errors[count($errors)] = 'Please enter your message.';

//if the errors array is empty, send the mail
if (!$errors) {

	//recipient - replace your email here
	$to = 'baldeaglejprice@hotmail.com';	
	//sender - from the form
	$from = $firstName . " " . $lastName . ' <' . $email . '>';
	
	//subject and the html message
	$subject = 'Message from ' . $firstName . " " . $lastName;	
	$message = 'Name: ' . $firstName . " " . $lastName . '<br/><br/>
		       Email: ' . $email . '<br/><br/>		
		       Message: ' . nl2br($comments) . '<br/>';

	//send the mail
	$result = sendmail($to, $subject, $comments, $from);
	
	//if POST was used, display the message straight away
	if ($_POST) {
		if ($result) echo 'Thank you! We have received your message.';
		else echo 'Sorry, unexpected error. Please try again later';
		
	//else if GET was used, return the boolean value so that 
	//ajax script can react accordingly
	//1 means success, 0 means failed
	} else {
		echo $result;	
	}

//if the errors array has values
} else {
	//display the errors message
	for ($i=0; $i<count($errors); $i++) echo $errors[$i] . '<br/>';
	echo '<a href="index.html">Back</a>';
	exit;
}


//Simple mail function with HTML header
function sendmail($to, $subject, $message, $from) {
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= 'From: ' . $from . "\r\n";
	
	$result = mail($to,$subject,$message,$headers);
	
	if ($result) return 1;
	else return 0;
}

    //
    $query = "INSERT INTO correspondence(firstName, lastName, email, username, password, requestType, qSubscribe, comments) 
    VALUES('$firstName', '$lastName', '$email', '$username', '$password', '$requestType', '$qSubscribe', '$comments')";
    mysqli_query($conn, $query);

    $registered = mysqli_affected_rows($conn);

if($registered==1) {
        echo "Welcome, " . $firstName . " " . $lastName . "! Thanks for joining.";
} 
    else 
{
    echo "Sorry, " . $firstName . " " . $lastName . "! Sign up failed.";
}

?>

<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="1; url=../index.php">
        <script type="text/javascript">
            window.location.href = "../index.php"
        </script>
        <title>Page Redirection</title>
    </head>
    <body>
        <!-- Note: don't tell people to `click` the link, just tell them that it is a link. -->
        If you are not redirected automatically, follow this <a href='../index.php'>link to example</a>.
    </body>
</html>
