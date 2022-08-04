<?php

// Inicio la variables de sesion.
if ( !isset( $_SESSION ) ) 
{
    session_start();
}

if ( isset( $_SESSION['ACTIVO'] ) <> "2019" ) 
{
    header( "Location: login" );
}

// Inicio el aplicativo.
include "include/coredata.php";
include 'header.php';

$app    = new app();
$msg    = FALSE;
$msg_layout=FALSE;
include_once 'email.php';
$email= new sendmail();
include_once 'msjs_mails.php';
$msjs_mails=new msjs_mails;        
$permisos_user= $_SESSION[ 'PERMISOS' ];           

if ( isset( $_POST['inputEmpresa'] ) && isset( $_POST['amount'] ) ) // reverso y fondeo a empresas
{
    $idempresaadmin=$_SESSION['EMPRESA'];
    $user=$_SESSION['USER'];
    $dataadmin=$app->viewDataCompanysById($idempresaadmin); //info de la empresa
    $datacompany=$app->viewDataCompanysById($_POST['inputEmpresa']); // info de administrador
    $Saldoadmin=$dataadmin[5];// Saldo de la empresa
    $saldoempresa=$datacompany[5];
    $comentario='';
    $transferencia=$_POST['amount']; // transferencia reciba
    $comision=$_POST['comision_calculada']; // comision cobrada
    $porcentajecomision=$_POST['comision_porcentaje']; // porcentaje de comision
    $ivacomision=$_POST['IVA']; // iva comision
    $fondeo=$_POST['monto_fondear']; //fondeo final
    $saldo_master=$_POST['saldo_master'];// saldo master
    if($_POST["inputAccion"]=='FONDEAR')
    {
        if ( $Saldoadmin >= $fondeo  )
        {
            $data=[$dataadmin[1],$saldo_master,$Saldoadmin,$fondeo,$datacompany[1],$datacompany[5],$_POST['inputAccion']]; // datos del mensaje
            $msj_aplicacion_pagos=$msjs_mails->Found_company($data); // construye el mensaje a enviar
            $texto = $app->applyFundsCompany( 1, $_POST['inputEmpresa'],$fondeo,$user,$comentario,$transferencia,$comision,$porcentajecomision,$ivacomision );// aplicacion del pago   
            $titulo_correo='NOTIFICACION DE FONDEO A EMPRESA';
            $respuesta_mail=$email->enviarmail($msj_aplicacion_pagos,$titulo_correo);
            $datalogmail=[1,$msj_aplicacion_pagos,$respuesta_mail];
            $app->insertlogemail($datalogmail);
            $mail_notificacion_company=$app->GetMailsNotificationsByIdCompany($_POST['inputEmpresa']);
            if($mail_notificacion_company!='')
            {
                $titulo_correo='NOTIFICACION DE FONDEO RECIBIDO';
                $dataempresa=[$datacompany[1],$datacompany[5],$fondeo,($datacompany[5]+$fondeo),'Fondeo recibido'];
                $msj_aplicacion_pagos=$msjs_mails->Found_company_Notifications($dataempresa); // construye el mensaje a enviar        
                $respuesta_mail=$email->enviarmailcompany($msj_aplicacion_pagos,$titulo_correo,$mail_notificacion_company);
                $datalogmail=[1,$msj_aplicacion_pagos,$respuesta_mail];
                $app->insertlogemail($datalogmail);
            }      
        }
        else
        {
            $texto='01EL FONDEO A REALIZAR EXCEDE EL MONTO EXISTENTE';
        }
        if ( substr( $texto, 0, 2 ) === '00' )
        {
            $msg = "Hecho!";
        }
        else
        {
            $msg = "Error";
        }
    }
    elseif($_POST["inputAccion"]=='REVERSAR')
    {
        if($_POST["amount"]<=$datacompany[5])
        {
            $data=[$dataadmin[1],$saldo_master,$Saldoadmin,-1*$_POST['amount'],$datacompany[1],$datacompany[5],$_POST['inputAccion']]; // datos del mensaje
            $texto=$app->ReturnFundsCompany(1,$_POST["inputEmpresa"],-1*$_POST["amount"],$user,$comentario); // aplicacion del reverso
            $msj_aplicacion_pagos=$msjs_mails->Found_company($data); // construye el mensaje a enviar           
            $titulo_correo='NOTIFICACION DE REVERSO A EMPRESA';
            $respuesta_mail=$email->enviarmail($msj_aplicacion_pagos,$titulo_correo);
            $datalogmail=[1,$msj_aplicacion_pagos,$respuesta_mail];
            $app->insertlogemail($datalogmail);
            $mail_notificacion_company=$app->GetMailsNotificationsByIdCompany($_POST['inputEmpresa']);
            if($mail_notificacion_company!='')
            {
                $titulo_correo='NOTIFICACION DE REVERSO EFECTUADO';
                $dataempresa=[$datacompany[1],$datacompany[5],$fondeo,($datacompany[5]+$fondeo),'Reverso a la empresa'];
                $msj_aplicacion_pagos=$msjs_mails->Found_company_Notifications($dataempresa); // construye el mensaje a enviar
                $respuesta_mail=$email->enviarmailcompany($msj_aplicacion_pagos,$titulo_correo,$mail_notificacion_company);
                $datalogmail=[1,$msj_aplicacion_pagos,$respuesta_mail];
                $app->insertlogemail($datalogmail);
            }
        }
        else
        {
            $texto='01EL REVERSO NO SE PUEDE REALIZAR EL MONTO SOLICITADO EXCEDE EL EXISTENTE EN LA EMPRESA';
        }
        if ( substr( $texto, 0, 2 ) === '00' )
        {
            $msg = "Hecho!";
        }
        else
        {
            $msg = "Error";
        }
      
    }
}

$Empresas     = $app->viewAllCompanysByPerfil('EMPRESA');
$administradoraBalance  = ( $empresaMonto = $app->viewCompany( $_SESSION['EMPRESA'] ) )? $empresaMonto[11] : 0;

?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card ">
                    <div class="header">
                        <h1 class="title"><i class="pe pe-7s-safe pe-2x pull-left pe-border"></i></h1>
                        <p class="category"><br><span style="font-size:18px;"><b>&nbsp;&nbsp;$ <?php echo number_format( floatval( $administradoraBalance ), 2, '.', ',' ); ?></b></span><br><span style="font-size:18px;">Total Disponible</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <?php if ( strlen( $msg ) == 6 ) { ?> 
            <div class="alert alert-success">
                <button type="button" aria-hidden="true" class="close">×</button>
                <span><?php echo substr( $texto , 2 ); ?></span>
            </div>
            <?php } elseif ( strlen( $msg ) == 5 ) { ?>
            <div class="alert alert-danger">
                <button type="button" aria-hidden="true" class="close">×</button>
                <span><b> Error - </b> <?php echo substr( $texto, 2 ); ?></span>
            </div>
            <?php } ?>
            <?php if (isset( $msg_layout ) ) {
                echo $msg_layout;} ?> 
            
      
        <?php if ( $app->optSearch($_SESSION[ 'PERMISOS' ],'opt23') ) {?>
        <form action="reload_funds_company?scr=4" method="POST" id="form3" onsubmit="return checkSubmitBlock('btsubmit2');">
                        
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Fondeo a Empresas</h4>
                        <p>Fondea a las empresas de forma individual.</p>
                    </div>
                    <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputEmpresa">Empresa</label>

                                        <select class="form-control companias2" id="inputEmpresa" name="inputEmpresa" required onChange="getComisiones(this.value)">
                                            <option value=""></option>
                                        <?php for ( $i = 0; $i <= count( $Empresas ); $i += 7 ) {
                                            if ( isset( $Empresas[ $i ] ) ) {
                                        ?>
                                            <option value="<?php echo $Empresas[ $i ]; ?>"><?php echo utf8_encode(strtoupper($Empresas[ $i + 1 ])); ?></option>
                                        <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputAccion">Acción a realizar</label>
                                        <select class="form-control" name="inputAccion" id="inputAccion" required>
                                            <option value=""></option>
                                            <option value="FONDEAR">FONDEAR</option>
                                            <option value="REVERSAR">REVERSAR </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputAccion">Comision a aplicar(Fondeo)</label>
                                        <input class="form-control" type="number" min="0" name="inputComision" id="inputComision" value="0.00" step="0.01" required onkeyup="calcularComision('amountcompany','inputComision');">
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputPerfil">Monto de la transferencia</label>
                                        <input class="form-control" type="number" min="1" name="amount" id="amountcompany" value="0.00" step="0.01" required onkeyup="calcularComision('amountcompany','inputComision');"/> <!-- Checa que el monto anotado sea menor o igual al que tiene la empresa. -->
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="btsubmit2" onclick="confirm_val_company('amountcompany');" class="btn btn-info btn-fill pull-right" form="form3">Fondear</button>
                            <div class="clearfix"></div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Datos de comisiones</h4>
                        <p>Se muestra el cobro de comision, IVA y el fondeo final (Aplica solo para fondeo).</p>
                    </div>
                    <div class="content">
                            <div class="row">
                            <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="inputAccion"> Nonto de la transferencia recibida </label>
                                        <input class="form-control" type="text" disabled name="monto_transferencia" id="monto_transferencia" value="0.00" step="0.01" required /> <!-- Checa que el monto anotado sea menor o igual al que tiene la empresa. -->
                                    </div>
                                </div>
                           
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="inputAccion"> Comision </label>
                                        <input class="form-control" type="text" disabled  id="comision_calculada" value="0.00" step="0.01" required /> <!-- Checa que el monto anotado sea menor o igual al que tiene la empresa. -->
                                        <input class="form-control" type="hidden" name="comision_calculada" id="comision_calculada_value" value="0.00"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAccion"> Comisión % </label>
                                        <input class="form-control" type="text" disabled  id="comision_porcentaje" value="0.00" step="0.01" required /> <!-- Checa que el monto anotado sea menor o igual al que tiene la empresa. -->
                                        <input class="form-control" type="hidden" name="comision_porcentaje" id="comision_porcentaje_value" value="0.00"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="inputAccion"> IVA Comisión</label>
                                        <input class="form-control" type="text" disabled id="IVA" value="0.00" step="0.01" required /> <!-- Checa que el monto anotado sea menor o igual al que tiene la empresa. -->
                                        <input class="form-control" type="hidden" name="IVA" id="IVA_value" value="0.00"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputAccion"> IVA % Comisión</label>
                                        <input class="form-control" type="text" disabled name="IVA_porcentaje" id="IVA_porcentaje" value="16.00" step="0.01" required /> <!-- Checa que el monto anotado sea menor o igual al que tiene la empresa. -->
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="inputPerfil">Monto a fondear</label>
                                        <input class="form-control" type="text" disabled id="monto_fondear" value="0.00" step="0.01" required /> <!-- Checa que el monto anotado sea menor o igual al que tiene la empresa. -->
                                        <input class="form-control" type="hidden" name="monto_fondear" id="monto_fondear_value" value="0.00"/>
                                        <input class="form-control" type="hidden" name="saldo_master"  value="0.0"/>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        
                    </div>
                </div>
            </div>
        </div>
        </form>
        <?php } ?>

    </div>
</div>

<?php
echo "<script type='text/javascript'> $('.companias2').select2();</script>";
include 'footer.php';