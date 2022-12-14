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

//$data     = $app->viewUsersByAdmin($_SESSION['EMPRESA']);
$urlToken       = $app->urlToken();
$company=$_SESSION["EMPRESA"];
$permisos=$_SESSION['PERMISOS'];

if ( isset( $_GET['urlToken'] ) && isset( $_SESSION['urlToken'] ) && isset( $_GET['idu'] ) && isset( $_GET['sta'] ) )
{
    if ( $_SESSION['urlToken'] === $_GET['urlToken'] )
    {
        $app->updateStatusUser( $_GET['idu'], $_GET['sta'] );
        $_SESSION['urlToken'] = $urlToken;
    }
    else 
    {
        $_SESSION['urlToken'] = $urlToken;
    }
}
else 
{
    $_SESSION['urlToken'] = $urlToken;
}
$data     = $app->viewUsersByAdmin($company);

include 'header.php';

?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Usuarios</h4>
                        <p class="category">Vista general de usuarios de administrador.</p>
                        <p class="category">
                            </br>
                            <?php if ( $app->optSearch($permisos,'opt24')) { // opt de crear Usuarios Nivel admin?>
                            
                            <a href="create_users_profile?scr=13" class="btn btn-default btn-sm" >
                                <i class="pe-7s-plus" style="font-size:16px;"></i> Crear usuario
                            </a>
                            <?php } ?>
                        </p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped" id="Users">
                            <thead>
                                <th>Nombre</th>
                                <th>Logo</th>
                                <th>Telefono</th>
                                <th>Perfil</th>
                                <th>Estatus</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < count( $data ); $i += 6) {
                                    
                                ?>
                                <tr>
                                    <td><?php echo utf8_encode(substr(strtoupper($data[$i+2]),0,30)); ?></td>
                                    <td> <img src="assets/img/<?php echo $data[$i]; ?>" alt="" height="13" width="60"></td>
                                    <td><?php echo $data[$i + 3]; ?></td>
                                    <td><?php echo strtoupper($data[$i + 5]); ?></td>
                                    
                                    <td>
                                        <?php 
                                            $dato='INACTIVO';
                                            if ($data[$i+4]==='1' ){
                                             $dato='ACTIVO'; 
                                            }
                                            echo $dato;
                                        ?>
                                    </td>
                                    <?php if ( $app->optSearch($permisos,'opt25')) { // opt de Editar Usuarios Nivel admin?>
                            
                                    <td>
                                        <a href="edit_users?scr=13&idu=<?php echo $data[$i+1]; ?>" rel="tooltip" title="Actualizar" class="btn btn-default btn-sm">
                                            <i class="pe-7s-search" style="font-size:18px;"></i>
                                        </a>
                                        <?php 
                                            if( $data[$i + 4] === '1' )
                                            {
                                        ?>
                                                <a href="users_admin?scr=13&urlToken=<?php echo $urlToken; ?>&idu=<?php echo $data[$i+1]; ?>&sta=<?php echo $data[$i + 4]; ?>" rel="tooltip" title="Inactivo" class="btn btn-default btn-sm">
                                                    <i class="pe-7s-close-circle" style="font-size:18px;"></i>
                                                </a>
                                        <?php
                                            } 
                                            else
                                            {
                                        ?>
                                                <a href="users_admin?scr=13&urlToken=<?php echo $urlToken; ?>&idu=<?php echo $data[$i+1]; ?>&sta=<?php echo $data[$i + 4]; ?>" rel="tooltip" title="Activo" class="btn btn-default btn-sm">
                                                    <i class="pe-7s-refresh" style="font-size:18px;"></i>
                                                </a>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    
                                    <?php 
                                    } 
                                    else 
                                    {
                                    ?>
                                    <td></td>
                                    <?php 
                                    }
                                    ?>
                                </tr>
                                <?php      } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';