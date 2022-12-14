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

$msg = '';

if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" )
{
    
    $dUsuario = $app->viewUser( $_GET['idu'] );
    $inputNombreCompleto    = $app->validoInput( $_POST['inputNombreCompleto'] );
    $inputEmail             = '';
    $inputTel               = $app->validoInput( $_POST['inputTelefono'] );
    $inputDireccion         = $app->validoInput( $_POST['inputDireccion'] );
    $inputPerfil            = '';
    $inputCodigoPostal      = $dUsuario[5];
    $inputCiudad            = $dUsuario[4];
    $inputEstado            = $dUsuario[10];

    $inputObservaciones     = $app->validoInput( $_POST['inputObservaciones'] );
    $update                 = date( 'Y-m-d H:i:s' );

    $aCompany =
    [
        utf8_decode($inputNombreCompleto),   // 0
        $inputEmail,            // 1
        $inputTel,              // 2
        utf8_decode($inputDireccion),        // 3
        $inputCodigoPostal,     // 4
        $inputCiudad,           // 5
        $inputPerfil,           // 6
        utf8_decode($inputObservaciones),    // 7
        $inputEstado,           // 8
        $update,                // 9
        $_GET['idu']            // 10
    ];

    if ( $app->updateUser( $aCompany ) )
    {
        $msg = 'Hecho!';
    }
    else 
    {
        $msg = 'Error';
    }
}

/**
 * Variables de intercambio.
 *  a.`ide`, a.`email`, c.`company`, a.`fullname`, a.`address`, a.`city`, a.`zip`, a.`aboutme`, a.`picture`, b.`idcard`, a.`perfil`
 */
$dUsuario = $app->viewUser( $_GET['idu'] );
$states=$app->GetAllState();
$dEmpresas = $app->viewCompany($_SESSION['EMPRESA']);
include 'header.php';
?>

<div class="content">
            <div class="container-fluid">
                <div class="row">

                    <?php if ( strlen( $msg ) == 6 ) { ?> 
                        <div class="alert alert-success">
                            <button type="button" aria-hidden="true" class="close">??</button>
                            <span><b> EXITOSO - </b> Los datos han sido actualizados correctamente.</span>
                        </div>
                    <?php } elseif ( strlen( $msg ) == 5 ) { ?>
                        <div class="alert alert-danger">
                            <button type="button" aria-hidden="true" class="close">??</button>
                            <span><b> Error - </b> Fallo en la actualizaci??n, Intente mas tarde.</span>
                        </div>
                    <?php } ?>

                    <div class="col-md-8">  
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Editar datos del usuario</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="edit_users?scr=13&idu=<?php echo $_GET['idu']; ?>" onsubmit="return checkSubmit('btsubmit');">
                                    

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nombre Completo</label>
                                                <input type="text" class="form-control" name="inputNombreCompleto" value="<?php echo utf8_encode($dUsuario[2]); ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Correo</label>
                                                <input type="email" disabled class="form-control" name="inputEmail" value="<?php echo $dUsuario[1]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputTel">Telefono</label>
                                                <input type="number" min="2400000000" max="9999999999" class="form-control" name="inputTelefono" value="<?php echo $dUsuario[9]; ?>" maxlength="10" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Direcci??n</label>
                                                <input type="text" class="form-control" name="inputDireccion" value="<?php echo utf8_encode($dUsuario[3]); ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <input type="text" class="form-control" value="<?php echo utf8_encode($dUsuario[10]);?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ciudad</label>
                                                <input type="text" class="form-control" name="inputCiudad" value="<?php echo utf8_encode($dUsuario[4]);?>" disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Codigo Postal</label>
                                                <input type="number" disabled min="10000" max="99998" class="form-control" name="inputCodigoPostal" value="<?php echo $dUsuario[5]; ?>" maxlength="5" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Observaciones</label>
                                                <textarea rows="5" class="form-control" name="inputObservaciones" placeholder="" ><?php echo utf8_encode($dUsuario[6]); ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" id="btsubmit" class="btn btn-info btn-fill pull-right">Actualizar</button>
                                    &nbsp;
                                    <a href="users_admin?scr=13" class="btn btn-default btn-sm" >
                                        <i class="pe-7s-back" style="font-size:16px;"></i> Volver
                                    </a>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="./assets/img/<?php echo $dEmpresas[9]; ?>" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="<?php echo $dUsuario[7]; ?>" alt="..."/>
                                        <h4 class="title"><?php echo strtoupper($dUsuario[2]); ?><br />
                                            <small><?php if($dUsuario[10]=='EMPLEADO'){
                                                echo 'EMPLEADO';
                                            } ?></small>
                                        </h4>
                                    </a>
                                </div>
                                <p class="description text-center"></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

<?php
include 'footer.php';