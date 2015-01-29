<?php
$mbox = imap_open("{imap.gmail.com:993/imap/ssl}", "oto58eood@gmail.com", "Ribar4e1");

$numMsgs = imap_num_msg($mbox);
echo  "<H1>You have ".$numMsgs. " messages in your inbox</H1>";
for($i=1; $i <= $numMsgs; $i++) {
      echo "<br>";
      $bodyText = imap_fetchbody($mbox,$i,1.2);
      if(!strlen($bodyText)>0){
            $bodyText = imap_fetchbody($mbox,$i,2.0);
      }
      $bodyText = quoted_printable_decode($bodyText);
      $structure = imap_fetchstructure($mbox,$i);
      //echo $structure->subtype;
      //echo '<pre>'.print_r($structure, true).'</pre>';
      $headers = imap_headerinfo($mbox,$i);
      $from = $headers->fromaddress;
      $subject = $headers->subject;

      echo "<br />".$i." From: ".$from.", Subject: ".$subject."<br /> \n ".$bodyText;
      //echo '<pre>'.print_r($body, true).'</pre>';

}

imap_close($mbox);
?>