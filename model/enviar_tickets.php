<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include 'model/qr class.php';
include 'fpdf/fpdf.php';



require 'vendor/autoload.php';


class clsEnviar_tickets
{
        //atributos
        public $name;
        public $apellido;
        public $email;
        public $count1;
        public $total1;
        public $title;
        public $fecha;
        public $hora;
        public $sala;
        public $precio;




       //constructores
       public function __construct()
       {
       }

       public static function constructorParametros(
        $name,
        $apellido,
        $email,
        $count1,
        $total1,
        $title,
        $fecha,
        $hora,
        $sala,
        $precio

       
       ){

            $t = new clsEnviar_tickets();
            $t->name = $name;
            $t->apellido = $apellido;
            $t->email = $email;
            $t->count1 = $count1;
            $t->total1 = $total1;
            $t->title = $title;
            $t->fecha = $fecha;
            $t->hora = $hora;
            $t->sala = $sala;
            $t->precio = $precio;


           return $t;
       }


    



public function enviar_tickets() {
    //Email del cine
    $email_cine = "aca debe ir un correo outlook";
    //Obtener datos post del formulario de tickets.php
    if (isset($_POST['pago'])) {
        $name = $_POST['name'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $subject = "Compra de tickets";
        $count1 = $_POST['count1'];
        $total1 = $_POST['total1'];
        $title = $_POST['title'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $sala = $_POST['sala'];
        $precio = $_POST['precio'];
        $user =($_SESSION['user']);
        

        //Crear PDF
        ob_end_clean();

        // Instanciar y utlizar la clase FPDF
        $pdf = new FPDF();
        
        //Agregar nueva pagina
        $pdf->AddPage();
        $contenido = $res['1']->title; 
        $contenido = $contenido . $precio;
        $precio = $precio;
        $precio = '$' . $precio;  
        $total1 = '$' . $total1;

        // Setear estilo de fuente
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(60,4,'CINEGCHU',0,1,'C');
        $pdf->SetFont('Helvetica','',8);

        $pdf->Cell(60,4, 'Usuario: ' . $user,0,1,'C');
        $pdf->Cell(60,4, $email,0,1,'C');
        $pdf->Cell(60,4, $name . ' ' . $apellido ,0,1,'C');
        $pdf->Cell(60,4,'SALA DE CINE ' . $sala,0,1,'C');

        // DATOS FACTURA        
        $pdf->Ln(5);
        $pdf->Cell(60,4,'Factura Simple: A',0,1,'');
        $pdf->Cell(60,4,'Fecha de funcion: ' . $fecha,0,1,'');
        $pdf->Cell(60,4,'Metodo de pago: Paypal',0,1,'');

        // COLUMNAS
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 10, 'Entradas', 0);
        $pdf->Cell(25, 10, 'Horarios', 0);
        $pdf->Cell(5, 10, 'Asiento', 0, 0, 'R');
        $pdf->Cell(15, 10, 'Unidades',0,0,'R');
        $pdf->Cell(15, 10, 'Precio',0,0,'R');
        $pdf->Cell(20, 10, 'Total',0,0,'R');
        $pdf->Cell(22, 10, 'QR',0,0,'R');
        $pdf->Ln(8);
        $pdf->Cell(0,0,'','T');
        $pdf->Ln(0);

        //Generar qr
        $qr= new QR_BarCode();
        // Crear texto que va dentro del qr
        $texto = 'CINEGCHU Pelicula: ' .  $title . ' $Fecha: ' . $fecha . ' Hora:' . $hora . ' ' . $sala . ' N° asientos:' . $count1 . ' Total:' . $precio;
        
        $qr->text($texto);

        $qr->qrCode(350,'img/cw-qr.png');
        $image1 = "img/cw-qr.png";

        $pdf->Cell(1, -5, $pdf->Image($image1, 120 ,60, 35 , 38,'png'),0,0,'R');

        // PRODUCTOS
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->MultiCell(30,4,$title,0,'L'); 
        $pdf->Cell(40, -5, $hora,0,0,'R');
        $pdf->Cell(20, -5, 'Asiento',0,0,'R');
        $pdf->Cell(10, -5, $count1,0,0,'R');
        $pdf->Cell(20, -5, $precio,0,0,'R');
        $pdf->Cell(20, -5, $total1,0,0,'R');
        $pdf->Cell(22, -5, "",0,0,'R');

        $pdf->Ln(30);
        



        // Generar el documento
        $filename="ticket.pdf";
        $dir = "C:/xampp/htdocs/"; // Ruta completa como: C:/xampp/htdocs/
        $pdf->Output($dir.$filename,'F');
        



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

        //Usar outlook.com. Agregar cuenta de outlook y password
        $mail->Username   = "aca debes ingresar un correo";
        $mail->Password   = "";
        $mail->SMTPSecure='STARTTLS';
        $mail->Port       = 587;

        $mail->setFrom("aca debes ingresar un correo", 'CineGchu');
        $mail->addAddress($email, $name . " " . $apellido);
        $mail->isHTML(true);
        $mail->Subject = ($subject);
        $body= "Hola <b>" . $name . ' ' . $apellido . "</b><br>Haz comprado tickets en <b>CineGchu</b> para:<br> <b>Pelicula:</b> " . $title . "<br> <b>Fecha:</b> " . $fecha . "<br> <b>Hora:</b> " . $hora . "<br> <b>Sala:</b> " . $sala . "<br> <b>Cantidad de entradas:</b> " . $count1 . "<br> <b>Precio:</b> " . $precio . "<br> <b>Total:</b> " . $total1 . "<br> <br> Gracias por preferirnos.";
        $mail->Body    = ($body);
        $mail->AltBody = 'CineGchu';
        $mail->AddAttachment('./ticket.pdf', 'ticket.pdf');
        

        }
        //Utilice Swal fire para las alertas.
        try {
            $mail->send();
                     

            echo "<script>swal('¡Compra exitosa!', 'Ya tienes tus tickets para ";
            echo "$title. Por favor revisa tu e-mail te hemos enviado los tickets.'";
            echo ", 'success');</script>";

            
            
        } catch (Exception $e) {
            echo "<script>swal('¡Error!', 'Algo ha salido mal, por favor intentalo de nuevo, o contactanos.', 'error');</script>";

            
        }
        finally {
            $mail->SmtpClose();
            
        }

    }
}



?>