<?php
//https://github.com/Synchro/PHPMailer

$to      = 'oto58@abv.bg';
$subject = 'generated mail';
$message = 'izprateno ot PHP';
$from = 'no reply';

require 'sendMail.php';

if(sendMail($to, $subject, $message, $from)){
    echo 'mail sended';
}  else {
    echo 'mail not send';
};