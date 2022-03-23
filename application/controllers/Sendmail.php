<!-- Please Refere this link

https://stackoverflow.com/a/57628059 -->

<?php 
class Sendmail extends CI_Controller 
{
    function  __construct(){
        parent::__construct();
    }

	public function send_mail()
    {
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'priyank.m@upsquare.in';
        $mail->Password = 'Cb8m3w2p';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('priyank.m@upsquare.in', 'Priyank Mehta');

        // Add a recipient
        $mail->addAddress('priyankm21097@gmail.com');

        // Add cc or bcc 
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Email subject
        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;

        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }

    }
}
?>