<?php 
    use PHPMailer\PHPMailer\PHPMailer;

    include "consts.php";
    require ComposerAutoloadPath;

    $mail = new PHPMailer;
    $mail->CharSet = 'utf-8';

    $mail->isSMTP();                                      
    $mail->Host = 'smtp.yandex.ru';  																							// Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               
    $mail->Username = 'ilyysha@yandex.ru';
    $mail->Password = 'thvjkjdbx'; 
    $mail->SMTPSecure = 'ssl';                            
    $mail->Port = 465; 

    $mail->setFrom('ilyysha@yandex.ru'); 

    foreach ($emailsArray as $email) {
        echo $email."<br/>";
        $mail->addAddress($email);     
    }
    
    $mail->isHTML(true);                                  
    $mail->Subject = $mailSubjectString;
    $mail->Body    = $mailTextString;
    $mail->AltBody = '';

    if(!$mail->send()) {
        echo 'Error';
    } else {
        echo 'Сообщение успешно разослано!';
    }
?>