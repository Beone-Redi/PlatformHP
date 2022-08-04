<?php

// Inicio la variables de sesion.
if (!isset($_SESSION)) 
{
    session_start();
}

if (isset($_SESSION['ACTIVO']) <> "2019") 
{
    header("Location: login");
}

include "include/coredata.php";
$app = new app();

include 'header.php';

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Manual de uso y referencias</h4>
                            <p class="category">Vista general del manual de uso de la plataforma.</p>
                                <p class="category">
                                    </br>
                                    <?php if($app->optSearch($_SESSION[ 'PERMISOS' ],'opt60')) { ?>
                                        <embed src="assets/Manual_admin.pdf" type="application/pdf" width="100%" height="500px" />
                                    <?php } ?>
                                    
                                    <?php if($app->optSearch($_SESSION[ 'PERMISOS' ],'opt62')) { ?>
                                        <embed src="assets/Manual_e.pdf" type="application/pdf" width="100%" height="500px" />
                                    <?php } ?>
                              
                                </p>
                            </div>
                            <br>
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
<?php
include 'footer.php';