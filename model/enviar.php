<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



require 'vendor/autoload.php';



class clsEnviar_contacto
{
        //atributos
        public $name;
        public $apellido;
        public $email;
        public $need;
        public $message;
        public $resultado;


       //constructores
       public function __construct()
       {
       }

       public static function constructorParametros(
        $name,
        $apellido,
        $email,
        $need,
        $message,
        $resultado

    
         
       
       ){

            $c = new clsEnviar_contacto();
            $c->name = $name;
            $c->apellido = $apellido;
            $c->email = $email;
            $c->need = $need;
            $c->message = $message;
            $c->resultado = $resultado;

           

           return $c;
       }


    



public function enviar_contacto() {
    $email_cine = "juanelabayen@outlook.com";
    //Obtener datos post del formulario de contacto.php
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $need = $_POST['need'];
        $resultado = "";

        //Enviar email PHPMailer
        $mail= new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = "smtp.office365.com";
        $mail->SMTPAuth=true;
        $mail->SMTPSecure = 'SSL';
        $mail->CharSet = 'UTF-8';

        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );

        //Usar outlook.com
        $mail->Username   = "juanelabayen@outlook.com";
        $mail->Password   = "Estocolmo86";
        $mail->SMTPSecure='STARTTLS';
        // $mail->SMTPSecure = "tls";

        $mail->Port       = 587;

        $mail->setFrom($email_cine, $name . ' ' . $apellido);
        $mail->addAddress($email_cine);
        $mail->isHTML(true);
        $mail->Subject = ($need);
        $body= "<b>Información del cliente</b><br> <b>Nombre:</b> " . $name . "<br> <b>Apellido:</b> " . $apellido . "<br> <b>Email:</b> " . $email . "<br> <b>Mensaje:</b> " . $message;
        $mail->Body    = ($body);
        $mail->AltBody = 'CineGchu';
        // $mail->AddAttachment('./ticket.pdf', 'ticket.pdf');
        

        }
        try {
            $mail->send();
            echo "<div class='alert alert-success alert-dismissible' role='alert'>";
            echo "<strong>Tu consulta ha sido enviada correctamente.</strong> Tan pronto como sea posible nos comunicaremos contigo.";
            echo "</div>";
            
        } catch (Exception $e) {
            echo "<div class='alert alert-danger alert-dismissible' role='alert'>";
            echo "<strong>Hubo un error.</strong> Intenta nuevamente o contactate a info@cinegchu.com.";
            echo "</div>";
            
        }
        finally {
            $mail->SmtpClose();
            
        }

    }
}



?>
