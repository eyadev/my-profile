<?php
 
/*require 'PHPMailerAutoload.php';
$mail = new PHPMailer;

    $mail->SMTPDebug = 4;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.zoho.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "crazy.khalil.1998@gmail.com";                 // SMTP username
    $mail->Password = "KhalilAymane@123";                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom("coco444@zohomail.com", $_POST['name']);
    $mail->addAddress("khalil.elhlou.1998@gmail.com");     // Add a recipient

    $mail->addReplyTo($_POST['email']);
    // print_r($_FILES['file']); exit;
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Body    = '<div style="border:2px solid red;">This is the HTML message body <b>in bold!</b></div>';
    $mail->Subject = $_POST['subject'];
    $mail->AltBody = $_POST['message'];
    echo 'OK';
    if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
    echo 'OK';
}
    
*/
function telegram_send($message) {
    $curl = curl_init();
    $api_key  = '1352352183:AAEysO2W17zmp-yZtY1T-pjumYSinShG1Go';
    $chat_id  = '811389319';
    $format   = 'HTML';
    curl_setopt($curl, CURLOPT_URL, 'https://api.telegram.org/bot'. $api_key .'/sendMessage?chat_id='. $chat_id .'&text='. $message .'&parse_mode=' . $format);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
    $result = curl_exec($curl);
    curl_close($curl);
    return true;
}

$message = "+++++++++ New Message ++++++++";
$message .= "SUBJECT: ".$_POST['subject'];
$message .= "MESSAGE: ".$_POST['message'];

telegram_send(urlencode($message));

echo "OK";
    
?>
