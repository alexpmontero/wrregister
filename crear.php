<?php
session_start();
 
if(!isset($_SESSION['user_id'])){
    header('Location: login');
    exit;
} else {
  ?>

  <html>
      <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <link rel="icon" type="image/png" href="imgs/ico.png">
          <link rel="stylesheet"   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

          <title>Generar códigos QR</title>
          <link rel="stylesheet" href="./css/main.css" />
          <script src="./js/app.js"></script>
      </head>

      <body class="">
        <section class="wrapper_head_page">
          <div class="container-lg">
            <div class="row">
              <div class="col-md-6">
                <div class="sec_head_page_info">
                  <h6 class="ttls_minimum in_head mb-4"><span>World Register</span></h6>
                  <h3 class="ttl_home">Otros servicios - LOGIN</h3>
                  <p class="my_paragraph mt-3">
                    La Certificación es la forma mas confiable de demostrar
                    excelencia y conducir la mejora continua.
                  </p>
                  <div class="mt-4">
                    <!-- <a href="http://www.wrregister.com/documentation/catalogo_de_servicios.pdf" class="btn btn_border"
                      >DESCARGAR CATÁLOGO DE SERVICIOS</a
                    > -->
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="sec_head_page_img">
                  <img src="./imgs/bg_o_services.png" alt="Acerca de WORLD REGISTER"/>
                </div>
              </div>
            </div>
          </div>
        </section>  
        <section class="wrapper_certif">
          <div class="container-lg">
            <div class="sec_ttls_certif">
              <div class="row">
                  <h2>Bienvenido <strong> <?php  echo $_SESSION['user_name'];?></strong> <a href="logout">(Cerrar Sesión)</a></h2>
                  <br/>
                  <form class="form-horizontal" method="post" id="codeForm" onsubmit="return false">
                      <div class="form-group">
                          <label class="control-label">Información: </label>
                          <input class="form-control col-xs-1" id="content" type="text" required="required">
                      </div>
                      <div class="form-group">
                          <label class="control-label">Nivel del código (ECC): </label>
                          <select class="form-control col-xs-10" id="ecc">
                              <option value="H">H - Mejor</option>
                              <option value="M">M</option>
                              <option value="Q">Q</option>
                              <option value="L">L - Peor</option>                         
                          </select>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Tamaño: </label>
                          <input type="number" min="1" max="10" step="1" class="form-control col-xs-10" id="size" value="5">
                      </div>
                      <div class="form-group">
                          <label class="control-label"></label>
                          <input type="submit" name="submit" id="submit" class="btn btn-success" value="Generar código QR">
                      </div>
                  </form>
                  <div class="row">
                    <div class="showQRCode"></div>
                </div>
              </div>            
            </div>
          </div>
        </section>
        <div class="insert-post-ads1" style="margin-top:20px;"></div>
      </body>
  </html>
  <?php  
}
?>