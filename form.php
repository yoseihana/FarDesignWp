<?php
/*$name = $_POST['nom'];
$email = $_POST['email'];
$civilite = $_POST['civilite'];
$surname = $_POST['prenom'];
$phone = $_POST['tel'];
$message = $_POST['commentaire'];
$de = 'From: FAR';
$a = 'anna.buffart@gmail.com';
$sujet = 'Un nouveau message sur far.be';

$body = "Bonjour,\nUn nouveau message a été envoyé depuis le site far.be. \nDe: $surname $name\n Civilité: $civilite\n Email: $email\n Téléphone: $phone \n Message:\n $message";

mail($a, $sujet, $body, $de);

if(isset($_POST['submit'])){
    if(mail($a, $sujet, $body, $de)){
        header('Location: http://www.far.be/contacts/');
    }else{
        header('Location: http://www.far.be/404error');
    }
}*/
$name = $_POST['nom'];
$email = $_POST['email'];
$civilite = $_POST['civilite'];
$surname = $_POST['prenom'];
$phone = $_POST['tel'];
$message = $_POST['commentaire'];
$to = $mail;
$sujet = 'Mail test';
$from = "From:anna.buffart@gmail.com\n";
$from .= "MIME-version: 1.0\n";
$from .= "Content-type: text/html; charset= iso-8859-1\n";

$contenumail = '
			<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
				<HTML>
					<HEAD>
						<TITLE>TEST</TITLE>
						<style type="text/css">
				<!--
				.Style1 {
					font-family: Verdana, Arial, Helvetica, sans-serif;
					font-weight: bold;
					font-size: 10px;
					color: #FFFFFF;
				}
				.Style2 {
					color: #FFFFFF;
					font-family: Verdana, Arial, Helvetica, sans-serif;
					font-size: 10px;
					font-weight: bold;
				}
				-->
						</style>
				</head>
<body bgcolor="#FFFFFF">

<font color="black">
Bonjour,\nUn nouveau message a été envoyé depuis le site far.be. \nDe: ' . $surname . ' ' . $name . '\n Civilité: ' . $civilite . '\n Email: ' . $email . '\n Téléphone: ' . $phone . '\n Message:\n ' . $message . '
</font>

</body>
				</html>';
if (mail('anna.buffart@gmail.com', $sujet, $contenumail, $from))
{
    echo 'OK Le mail de control est envoye à anna.buffart@gmail.com';
} else
{
    echo 'error';
}
?>

