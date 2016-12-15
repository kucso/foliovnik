<?php


// Zobere s fromulara plochz, html a
$name = strip_tags(trim($_POST["name"]));
$name = str_replace(array("\r","\n"),array(" "," "),$name);
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$message = trim($_POST["message"]);


//KONTROLA DAT
if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL))
{ header("Location: http://www.webdesigncourse.com/omnifood/index.php?success=-1") ;
 exit;

 }

//Nastavenie adresi kam to bude prichadzat
$recipient = "branislav.kison@gmail.com";

//Nastavit predmeet emailu
$subject = "Novy feedback od $name";


//Nastavenie obsahu emailu
$email_content = "Name: $name\n";
$email_content .= "Email: $email\n\n";
$email_content .= "Name: \n$message\n";

//Nastavenie nadpisu v emaile
$email_headers = "FROM: $name <$email>";

//Poslat email
mail($recipient, $subject, $email_content, $email_headers);

//jkjk
    header("Location: http://www.webdesigncourse.com/omnifood/index.php?success=1");