<?php

// define("WEBMASTER_EMAIL", 'themesflat@gmail.com');
//$address = "example@themeforest.net";
$address = "info@dezling.com,ledezmatto@gmail.com";
if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$error = false;
$fields = array( 'name', 'email', 'subject', 'message' );

foreach ( $fields as $field ) {
	if ( empty($_POST[$field]) || trim($_POST[$field]) == '' )
		$error = true;
}

if ( !$error ) {

	$name = stripslashes($_POST['name']);
	$email = trim($_POST['email']);
	$subject = "Contatco desde la Web";		
	$message = stripslashes($_POST['message']);
	
	$e_subject = 'Contacto de ' . $name . '.';

	// Configuration option.
	// You can change this if you feel that you need to.
	// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

	$e_body = "Contacto de: $name" . PHP_EOL . PHP_EOL;
	$e_reply = "E-mail: $email" . PHP_EOL . PHP_EOL;
	$e_content = "Mensaje:\r\n$message" . PHP_EOL . PHP_EOL;

	$msg = wordwrap( $e_body . $e_reply .$e_subject , 70 );

	$headers = "From: $email" . PHP_EOL;
	$headers .= "Reply-To: $email" . PHP_EOL;
	$headers .= "MIME-Version: 1.0" . PHP_EOL;
	$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
	$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

	if(mail($address, $e_subject, $msg, $headers)) {

		// Email has sent successfully, echo a success page.

		echo 'Success';

	} else {

		echo 'ERROR!';

	}

}

?>