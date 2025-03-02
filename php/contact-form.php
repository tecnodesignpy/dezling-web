<?php

if(!$_POST) exit;

// Email address that messages will be sent to;
$address = "ledezmatto@tecnodesign.com.py";

// Email address verification, do not edit.
function isEmail($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$name       = $_POST['name'];
$email      = $_POST['email']; 
$message    = $_POST['message'];
$phone      = $_POST['phone'];

if(trim($name) == '') {
	echo '<div class="error_message">Debes escribir tu nombre.</div>';
	exit();
} else if(trim($email) == '') {
	echo '<div class="error_message">Debes introducir un correo electrónico válido.</div>';
	exit();
} else if(!isEmail($email)) {
	echo '<div class="error_message">Correo ELectrónico inválido.</div>';
	exit();
}
if(trim($message) == '') {
	echo '<div class="error_message">Ingrese su mensaje.</div>';
	exit();
}

if(get_magic_quotes_gpc()) {
	$message = stripslashes($message);
}



$email_address = 'noreply@dezling.com';
//$email_address = 'ledezmatto@gmail.com';
$subject = ("Contacto desde la Web");



// Create the email and send the message
$to = 'info@dezling.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = $subject;
$email_body = "Recibio un nuevo mensaje desde el formulario web.\n\n"."Mensaje:\n$message\n Sender: $name \n Telefono: $phone \n Email: $email";
$headers = "From: $email_address\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.	
if(mail($to,$email_subject,$email_body,$headers)){
	// Email has sent successfully, echo a success page.
	echo "<div id='success_page'>";
	echo "<h4 class='highlight'>Gracias <strong>$name</strong>, tu mensaje ha sido enviado.</h4>";
	echo "</div>";
} else {
	// Email has sent successfully, echo a success page.
	echo "<div id='success_page'>";
	echo "<h4 class='highlight'>ERROR.</h4>";
	echo "</div>";
}