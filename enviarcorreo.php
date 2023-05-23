<?php

  if(!$_POST) exit;

  // Verificación del Correo (No tocar)
  function isEmail($email) {
    return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
  }

  if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

  $nya = $_POST['name'];
  $apellidos = $_POST['apellidos'];
  $organizacion = $_POST['organizacion'];
  $telefono = $_POST['telefono'];
  $email = $_POST['email'];
  $asunto = $_POST['inlineRadioOptions'];
  $puesto = $_POST['puesto'];
  //$img = $_FILES['img_cert'];
  $mensaje = $_POST['mensaje'];
  $norma = $_POST['norma'];
  $giro = $_POST['giro'];
  $namecert = $_POST['namecert'];


  if(trim($nya) == '') {
    $a = 0;
    $b = '<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, ingresa tus Nombre(s).</div>';

    $dab = array(
      "a" => $a, 
      "b" => $b
    );

    echo (json_encode($dab));
    exit();

  } else if(trim($apellidos) == '') {
    $a = 0;
    $b = '<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, ingresa tus Apellidos.</div>';

    $dab = array(
      "a" => $a, 
      "b" => $b
    );

    echo (json_encode($dab));
    exit();

  } else if(trim($email) == '') {
    $a = 0;
    $b = '<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, ingresa tu Email.</div>';

    $dab = array(
      "a" => $a, 
      "b" => $b
    );

    echo (json_encode($dab));
    exit();

  } /*else if($_FILES['img']['size'] == 0) {
    $a = 0;
    $b = '<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, sube una imagen en Formato JPG, PNG o GIF.</div>';

    $dab = array(
      "a" => $a, 
      "b" => $b
    );

    echo (json_encode($dab));
    exit();

  }*/ else if(!isEmail($email)) {
    $a = 0;
    $b = '<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, ingresa tu Email correctamente.</div>';

    $dab = array(
      "a" => $a, 
      "b" => $b
    );

    echo (json_encode($dab));
    exit();

  } else if(trim($mensaje) == '') {
    $a = 0;
    $b = '<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, ingresa tu Mensaje.</div>';

    $dab = array(
      "a" => $a, 
      "b" => $b
    );

    echo (json_encode($dab));
    exit();

  }
  /*
  // Subir Archivo 
  $directorio_destino = "uploads/";
  $archivo_destino = $directorio_destino . basename($_FILES["img"]["name"]);
  $uploadOk = 1;
  $formatoImagen = strtolower(pathinfo($archivo_destino,PATHINFO_EXTENSION));
  // Verificamos si la imagen es falsa o no 
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["img"]["tmp_name"]);
      if($check !== false) {
          // echo "Mensaje";
          $uploadOk = 1;
      } else {
          // echo "Mensaje";
          $uploadOk = 0;
      }
  }

  // Verificamos el tamaño de la imagen 
  if (round($_FILES['img']["size"] / 1024) > 8192) {

      $uploadOk = 0;

      $a = 0;
      $b = '<div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>El archivo no debe pesar más de 8 MB.</div>';

      $dab = array(
        "a" => $a, 
        "b" => $b
      );

      echo (json_encode($dab));
      exit();
  }

  
  /*
  // Permitimos solo ciertos formatos de imagen 
  if($formatoImagen != "jpg" && $formatoImagen != "png" && $formatoImagen != "gif") {
      $uploadOk = 0;

      $a = 0;
      $b = '<div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, sube una imagen en formato JGP, PNG o GIF</div>';

      $dab = array(
        "a" => $a, 
        "b" => $b
      );

      echo (json_encode($dab));
      exit();
  }
// Si la imagen no se puede cargar, mostramos un mensaje 
if ($uploadOk == 0) {

    $a = 0;
    $b = '<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Tu imagen no puede ser cargada.</div>';

    $dab = array(
      "a" => $a, 
      "b" => $b
    );

    echo (json_encode($dab));
    exit();
// Subimos la imagen
} 
else {
  $tmp = explode(".", $_FILES["img"]["name"]);
  // $nuevonombreimagen = $tmp;
  $nuevonombreimagen = $_FILES["img"]["name"];
  move_uploaded_file($_FILES["img"]["tmp_name"], $directorio_destino . $nuevonombreimagen);
}
*/


/* Configuración para el envio del Correo */

//Correo a donde caeran los mensajes del formulario
$correo = "info@novaterrapc.com.mx";
// $correo = "atencionaclientes@novaterra.com";
// Asunto 
$e_asunto= 'Mensaje de Contacto';

//$archivo = 'https://tudominio.com/uploads/'.$nuevonombreimagen;
$archivo = 'uploads/'.$nuevonombreimagen;

// Preparamos el encabezado del correo 
$e_bodyas = utf8_decode("Asunto: $asunto") . PHP_EOL;
$e_bodya = utf8_decode("Nombre: $nya") . PHP_EOL;
$e_bodyg = utf8_decode("Apellidos: $apellidos") . PHP_EOL;
$e_bodyd = utf8_decode("Organización: $organizacion") . PHP_EOL;
$e_bodye = utf8_decode("Teléfono: $telefono") . PHP_EOL;
$e_bodyf = utf8_decode("Puesto: $puesto") . PHP_EOL;
$e_reply = "Email: $email" . PHP_EOL;
$e_bodyc = utf8_decode("Mensaje: $mensaje") . PHP_EOL;

if($asunto == 'cotizacion'){
  $e_bodynorma = utf8_decode("Norma: $norma") . PHP_EOL;
  $e_bodygiro = utf8_decode("Giro: $giro") . PHP_EOL;

  $msg = wordwrap($e_bodyas . $e_bodya . $e_bodyg . $e_bodyd . $e_bodynorma . $e_bodygiro . $e_bodye . $e_bodyf . $e_bodyc . $e_reply, 26 );
}
elseif ($asunto == 'Vigencia') {
  $e_bodynorma = utf8_decode("Norma: $norma") . PHP_EOL;
  $e_bodynamecert = utf8_decode("<b>Nombre certificado:</b> $namecert") . PHP_EOL;
  $msg = wordwrap($e_bodyas . $e_bodya . $e_bodyg . $e_bodyd . $e_bodynorma . $e_bodynamecert . $e_bodygiro . $e_bodye . $e_bodyf . $e_bodyc . $e_reply, 26 );
}
else {
  $msg = wordwrap($e_bodyas . $e_bodya . $e_bodyg . $e_bodyd . $e_bodye . $e_bodyf . $e_bodyc . $e_reply, 26 );
}

// Creamos el encabezado del correo 
$headers = "From: ".$nya." <".$email.">" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;


  if(mail($correo, $e_asunto, $msg, $headers)) {

    // Si el correo es enviado correctamente, mostramos un mensaje 
    $a = 1;
    $b = '<div class="alert alert-success close">¡Tu mensaje ha sido enviado correctamente!</div>';
    // $b = '<div class="alert alert-success alert-dismissable">
    //<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>¡Tu mensaje ha sido enviado correctamente!</div>';

    $dab = array(
      "a" => $a, 
      "b" => $b
    );

    //echo (mail($correo, $e_asunto, $msg, $headers));
    echo (json_encode($dab));

  } else {
    $dab = array(
      "a" => $a, 
      "b" => $asunto
    );
  }