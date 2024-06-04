<?php

include "config.php";

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    // $sql = "SELECT * FROM reservation ";
    // $result = $conn->query($sql);
    // $row = mysqli_fetch_array($result);

    if(isset($_POST["id"]) && !empty($_POST["id"])){

        $sql = "SELECT * FROM reservation where id =?";


        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id); 

            $param_id = trim($_POST["id"]);


        }

        $fullname = $row["fullname"];
        $email = $row["email"];
        $phone = $row["phone"];
        $id = $row["id"];

        var_dump($email) ;
        var_dump($fullname);
        var_dump($phone);
        var_dump($id);



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);



try {
    
    $mail->isSMTP();  
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'hadhemi.ghachem2002@gmail.com';                    
    $mail->Password   = 'cynd wmjr wqwj qrwq';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port =465 ;                                  


    //Recipients
    $mail->setFrom('hadhemi.ghachem2002@gmail.com', 'Ghachem Hadhemi');
    $mail->addAddress($email, $fullname);    
    
    $mail->isHTML(true);                              
    $mail->Subject = 'Reponse Resevation';
    $mail->Body    = 'votre reservation est acceptée. Merci de nous appelez pour le paiement';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}




    }else {
        echo "error";
    }

    
    















?>