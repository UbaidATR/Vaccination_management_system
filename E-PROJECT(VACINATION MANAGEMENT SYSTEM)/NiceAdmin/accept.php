<?php
include('config2.php');

// PHP mailor
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHP_Mailor\src\Exception.php';
require 'PHP_Mailor/src/PHPMailer.php';
require 'PHP_Mailor/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


// php mailor End

if (isset($_GET['accept_id_p'])) {
    $id = $_GET['accept_id_p'];
    $query_accept = mysqli_query($connection, "UPDATE `vaccinations_system`.`appointments` SET `status` = 'active' WHERE (`appointment_id` = '$id');");
    $query_mail = mysqli_query($connection, "select p.email,p.father_name, h.user_name from appointments a 
    join hospital h On a.hospital_id = h.hospital_id join parents p ON a.parent_id=p.parent_id where appointment_id = '$id'");
    $data_mail = mysqli_fetch_assoc($query_mail);
    $user_name = $data_mail['father_name'];
    $user_email = $data_mail['email'];
    $user_hospital = $data_mail['user_name'];
    if ($query_accept) {
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'ubaidatr66@gmail.com';                     //SMTP username
            $mail->Password = 'tilylptcekybswdo';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('ubaidatr@gmail.com', 'vaccinations_system');
            $mail->addAddress($user_email, $user_name);     //Add a recipient
            $mail->addReplyTo('ubaidatr@gmail.com', 'Information');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Appointment verification mail';
            $mail->Body = 'Your appointment for hospital ' . $user_hospital . ' <b>is accepted</b>';
            $mail->AltBody = 'your appointment for' . $user_hospital . 'is on next sunday';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "<script>
        if (confirm('The request has been accepted')) {
            window.location.href = 'notification.php';
        }
        </script>";
    }
} elseif (isset($_GET['reject_id_p'])) {
    $r_id = $_GET['reject_id_p'];
    $query_mail = mysqli_query($connection, "select p.email,p.father_name, h.user_name from appointments a 
    join hospital h On a.hospital_id = h.hospital_id join parents p ON a.parent_id=p.parent_id where appointment_id = '$r_id'");
    $data_mail = mysqli_fetch_assoc($query_mail);
    // print_r($data_mail);
    $user_name = $data_mail['father_name'];
    $user_email = $data_mail['email'];
    $user_hospital = $data_mail['user_name'];
    $query_reject = mysqli_query($connection, "delete from appointments where appointment_id = '$r_id'");
    if ($query_reject) {
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'ubaidatr66@gmail.com';                     //SMTP username
            $mail->Password = 'tilylptcekybswdo';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('ubaidatr@gmail.com', 'vaccinations_system');
            $mail->addAddress($user_email, $user_name);     //Add a recipient
            $mail->addReplyTo('ubaidatr@gmail.com', 'Information');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Appointment verification mail';
            $mail->Body = "Your appointment for hospital " . $user_hospital . " <b>is not accepted due some hospital's issues</b>";
            $mail->AltBody = 'your appointment for' . $user_hospital . 'is on next sunday';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "<script>
        if (confirm('The request has been rejected')) {
            window.location.href = 'notification.php';
        }
        </script>";
    }

} elseif (isset($_GET['accept_id_h'])) {
    $id = $_GET['accept_id_h'];
    $query_accept_h = mysqli_query($connection, "UPDATE `vaccinations_system`.`hospital` SET `status` = 'active' 
    WHERE (`hospital_id` = '$id');");
    $query_mail = mysqli_query($connection, "select user_email,user_name from hospital where hospital_id = '$id'");
    $data_mail_h=mysqli_fetch_assoc($query_mail);
    $h_user=$data_mail_h['user_name'];
    $h_email=$data_mail_h['user_email'];
    if ($query_accept_h) {
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'ubaidatr66@gmail.com';                     //SMTP username
            $mail->Password = 'tilylptcekybswdo';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('ubaidatr@gmail.com', 'vaccinations_system');
            $mail->addAddress($h_email, $h_user);     //Add a recipient
            $mail->addReplyTo('ubaidatr@gmail.com', 'Information');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Appointment verification mail';
            $mail->Body = "your request is accept nwo ypu can use your account ";
            $mail->AltBody = '';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "<script>
        if (confirm('The request has been accepted')) {
            window.location.href = 'notification.php';
        }
        </script>";
    }
} elseif (isset($_GET['reject_id_h'])) {
    $r_id = $_GET['reject_id_h'];
    $query_mail = mysqli_query($connection, "select user_email,user_name from hospital where hospital_id = '$r_id'");
    $data_mail_h=mysqli_fetch_assoc($query_mail);
    $h_user=$data_mail_h['user_name'];
    $h_email=$data_mail_h['user_email'];
    
    $query_reject_h = mysqli_query($connection, "delete from hospital where hospital_id = '$r_id'");

    if ($query_reject_h) {
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'ubaidatr66@gmail.com';                     //SMTP username
            $mail->Password = 'tilylptcekybswdo';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
            //Recipients
            $mail->setFrom('ubaidatr@gmail.com', 'vaccinations_system');
            $mail->addAddress($h_email, $h_user);     //Add a recipient
            $mail->addReplyTo('ubaidatr@gmail.com', 'Information');
    
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Appointment verification mail';
            $mail->Body = 'your request for adding the hosital at website vaccinations system is not approve due to some issues';
            $mail->AltBody = 'your appointment for is on next sunday';
    
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "<script>
        if (confirm('The request has been rejected')) {
            window.location.href = 'notification.php';
        }
        </script>";
    }
} else {
    echo "<script>alert ('no user found');document.location.href='notification.php' </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="display:none;">
    
</body>
</html>