<?php

// Inicio la variables de sesion.
if ( !isset( $_SESSION ) ) 
{
    session_start();
}

if ( isset( $_SESSION['ACTIVO'] ) <> "2019" or $_SESSION['EMPRESA'] === '0' ) 
{
    header( "Location: login" );
}

include "include/coredata.php";

include 'header.php';

$app        = new app();
$msg        = FALSE;
$bandera    = FALSE;
$Empresas   = $app->viewAllCompanysByPerfil('EMPRESA');
$Mes        = date( 'Y-m-' );
$Dia        = date( 'd' ) - 1;
$minDate    = $Mes . '01';
$maxDate    = date( 'Y-m-d' );
$maxDateFin = $Mes . str_pad( $Dia, 2, '0', STR_PAD_LEFT );

$Consulta   = false;
$fechaI  = $maxDate; 
$fechaF  = $maxDate;
$result=[];
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{

      if(!isset($_POST[ 'ConsultaF' ]))
    {
        $Consulta=true;
        $fechaI  = $_POST["inputFechaInicio"]; 
        $fechaF  = $_POST["inputFechaFinal"];
    }

    $fecha_ini=$_POST["inputFechaInicio"].' 00:00:00';
    $fecha_fin=$_POST["inputFechaFinal"].' 23:59:59';
    $card=substr($_POST["inputCard"],-8);
    $ide_empresa=$_SESSION['EMPRESA'];
   
    $diferencia = (strtotime($_POST["inputFechaFinal"]) - strtotime($_POST["inputFechaInicio"]))/86400; // diferencia entre fecha final e inicial 
    if($diferencia<0) // si se invirtieron la fecha minima y maxima
    {
        $msg    = 'Error';
        $dEmpresasI  = [];
        $mensaje='No se encontraron movimientos con fechas : '.substr($fecha_ini,8,2).'/'.substr($fecha_ini,5,2).'/'.substr($fecha_ini,0,4) . ' y ' . substr($fecha_fin,8,2).'/'.substr($fecha_fin,5,2).'/'.substr($fecha_fin,0,4);  
    }
    else
    {
        $data=$app->getMovementsCardNew($card,$fecha_ini,$fecha_fin);
            if(isset($data['TicketMessage']))
            {
                $msg    = 'Hecho!';
                $result=$data['TicketMessage'];
            }elseif(isset($data['ErrorMessage']))
            {
                $mensaje=$data['ErrorMessage'];
                $app->insertlogEstadoCuenta($ide_empresa,$card,1,$mensaje);   
                $mensaje='No se encontraron movimientos con fechas : '.substr($fecha_ini,8,2).'/'.substr($fecha_ini,5,2).'/'.substr($fecha_ini,0,4) . ' y ' . substr($fecha_fin,8,2).'/'.substr($fecha_fin,5,2).'/'.substr($fecha_fin,0,4);
                $msg    = 'Error';
            }
            else
            {
                $mensaje='01NO ESTA DECLARADO TICKETMESSAGE Y ERRORMESSAGE';
                $app->insertlogEstadoCuenta($ide_empresa,$card,1,$mensaje); 
                $mensaje='No se encontraron movimientos con fechas : '.substr($fecha_ini,8,2).'/'.substr($fecha_ini,5,2).'/'.substr($fecha_ini,0,4) . ' y ' . substr($fecha_fin,8,2).'/'.substr($fecha_fin,5,2).'/'.substr($fecha_fin,0,4);
                $msg    = 'Error';
            }
    }
} 
else 
{
    $result = [];    
}

?>

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <?php if ( strlen( $msg ) == 6 ) { ?> 
            <div class="alert alert-success">
                <button type="button" aria-hidden="true" class="close">×</button>
                <span><b> Exitoso - </b> Rangos solicitados: <?php echo substr($fecha_ini,8,2).'/'.substr($fecha_ini,5,2).'/'.substr($fecha_ini,0,4) . ' y ' . substr($fecha_fin,8,2).'/'.substr($fecha_fin,5,2).'/'.substr($fecha_fin,0,4); ?></span>
            </div>
            <?php } elseif ( strlen( $msg ) == 5 ) { ?>
            <div class="alert alert-success">
                <button type="button" aria-hidden="true" class="close">×</button>
                <span> <?php echo $mensaje;?>.</span>
            </div>
            <?php } ?>

            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Reporte de movimientos de las tarjetas </h4>
                        <p class="category">Vista general de reporte de movimientos de tarjeta habientes.</p>
                        <form action="movements_cards?scr=55" method="POST" onsubmit="return checkSubmitBlock('btnsubmit');">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="inputCodigoPostal">Fecha Inicio</label>
                                        <input type="date" class="form-control" name="inputFechaInicio" min="2021-01-01" max="<?php echo $maxDate; ?>" value="<?php echo $fechaI;?>" required >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="inputCiudad">Fecha Final</label>
                                        <input type="date" class="form-control" name="inputFechaFinal" min="2021-01-01" max="<?php echo $maxDate; ?>" value="<?php echo $fechaF;?>" required >
                                    </div>
                                </div>
                           
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputEmpresa">Empresa</label>
                                        <select class="form-control transactions2" name="inputEmpresa" required onChange="getCards(this.value)">
                                        <option value=""></option>
                                        <option value="TODOS">TODOS</option>
                                        
                                        <?php for ($i = 0; $i < count( $Empresas ); $i += 7) {
                                            if ( isset( $Empresas[ $i ] ) ) {
                                        ?>
                                            <option value="<?php echo $Empresas[ $i ]; ?>"><?php echo utf8_encode(strtoupper($Empresas[ $i + 1 ])); ?></option>
                                        <?php } } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="inputCiudad">Tarjeta</label>
                                        <select class="form-control cards2" name="inputCard" id="cards" required=""></select>
                       
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="inputCiudad">&nbsp;</label>
                                        <button type="submit" class="form-control btn btn-primary" id="btnsubmit" name="ConsultaF"><b><i style="font-size: 21px;" class="pe-7s-search"></i></b></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="content table-responsive ">
                        <table id="CardsMovements" class="table table-hover table-striped display">
                            <thead>
                                <th>Tarjeta</th>
                                <th>Fecha</th>
                                <th>Descripcion</th>
                                <th>Autorizacion</th>
                                <th style="text-align:right">Cargo</th>
                                <th style="text-align:right">Abono</th>
                                <th style="text-align:right">Disponible</th>
                            </thead>
                            <tbody>
                            <?php 
                                foreach( $result as $arreglo ) 
                                {
                                    $ACard  = '****-****-'.str_pad(substr($card, 0,-4),4, "**", STR_PAD_LEFT).'-'.substr($card, -4);
                                    $AFecha = substr($arreglo['Date'],8,2).'/'.substr($arreglo['Date' ],5,2).'/'.substr($arreglo[ 'Date' ],0,4).substr($arreglo[ 'Date' ],10,9);
                            ?>
                            <tr>
                                <td><?php echo $ACard;?></td>
                                <td><?php echo $AFecha;?></td>                                    
                                <td><?php echo $arreglo['Merchant'];?></td>
                                <td class="cantidad"><?php echo $arreglo['Auth_Code'];?></td>             
                                <td style="text-align:right"><?php echo number_format($arreglo['charge'],2,'.',',');?></td>
                                <td style="text-align:right"><?php echo number_format($arreglo['Accredit'],2,'.',',');?></td>
                                <td style="text-align:right"><?php echo number_format($arreglo['Vailable'],2,'.',',');?></td>
                            </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

echo "<script type='text/javascript'> $('.transactions2').select2();</script>";
echo "<script type='text/javascript'> $('.cards2').select2();</script>";


include 'footer.php';