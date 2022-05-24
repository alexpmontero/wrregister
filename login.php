<?php
 
include 'config.php';
session_start();
 
if (isset($_POST['login'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM usuarios WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo '<p class="error">*Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['usuario_id'];
            $_SESSION['user_name'] = $result['username'];
            //echo '<p class="success">Congratulations, you are logged in!</p>';
            header('Location: crear');
            exit;
        } else {
            echo '<p class="error">**Username password combination is wrong!</p>';
        }
    }
}
 
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet"   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="imgs/ico.png">

    <title>Generar códigos QR</title>
    <link rel="stylesheet" href="./css/main.css" />
    <script src="./js/app.js"></script>
</head>

<section class="wrapper_head_page">
    <div class="container-lg">
        <div class="row">
        <div class="col-md-6">
            <div class="sec_head_page_info">
            <h6 class="ttls_minimum in_head mb-4"><span>World Register</span></h6>
            <h3 class="ttl_home">Otros servicios</h3>
            <p class="my_paragraph mt-3">
                La Certificación es la forma mas confiable de demostrar
                excelencia y conducir la mejora continua.
            </p>
            </div>
        </div>
        </div>
    </div>
</section>  
<section class="wrapper_certif">
    <div class="container-lg">
        <div class="sec_ttls_certif">
        <div class="row">
            <form method="post" action="" name="signin-form">
                <div class="form-element">
                    <label>Username</label>
                    <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
                </div>
                <div class="form-element">
                    <label>Password</label>
                    <input type="password" name="password" required />
                </div>
                <button type="submit" name="login" value="login">Iniciar sesión</button>
            </form>
        </div>            
        </div>
    </div>
</section>

