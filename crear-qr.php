<?php 
if(isset($_POST) && !empty($_POST)) {
    include('librerias/phpqrcode/qrlib.php'); 
    $codesDir = "qrs/";   
    $codeFile = date('d-m-Y-h-i-s').'.png';
    QRcode::png($_POST['formData'], $codesDir.$codeFile, $_POST['ecc'], $_POST['size']); 
    echo '<img class="img-thumbnail" src="'.$codesDir.$codeFile.'" />';
} else {
    header('location:./');
}
?>
