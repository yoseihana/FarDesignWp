<?php
$name = $_POST['nom'];
$email = $_POST['email'];
$civilite = $_POST['civilite'];
$surname = $_POST['prenom'];
$phone = $_POST['tel'];
$message = $_POST['message'];
$de = 'From: FAR';
$a = 'anna.buffart@gmail.com';
$sujet = 'Un nouveau message sur far.be';

$body = "Bonjour,\nUn nouveau message a été envoyé depuis le site far.be. \nDe: $surname $name\n Civilité: $civilite\n Email: $email\n Téléphone: $phone \n Message:\n $message";

mail($a, $sujet, $body, $de);

if(isset($_POST['submit'])){
    if(mail($a, $sujet, $body, $de)){
        header('Location: http://farwp.buffart.eu/contacts/');
    }else{
        header('Location: http://farwp.buffart.eu/404error');
    }
}

?>