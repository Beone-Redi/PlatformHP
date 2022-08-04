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
$app    = new app();
$msg    = FALSE;
$msg_layout=FALSE;

if ( $_SESSION['PERFIL'] === 'EMPRESA' ) 
{
    $administradoraBalance  = ( $empresaMonto = $app->viewCompany( $_SESSION[ 'EMPRESA' ] ) )? $empresaMonto[11] : 0;
    $Empleados              = $app->viewEmployees( $_SESSION['EMPRESA'] );
}

$Registros=$Registros_fallos=0;

if ( isset( $_FILES['uploadfile'] ) )
{
    // Layout de carga
    $dir_subida = './uploads/';
    //$fichero_subido = $dir_subida . basename( $_FILES['uploadfile']['name'] );
    $fichero_subido = $dir_subida.'CEC'.date('dmyhis').'.csv';
    $csv_end = "\r\n";
    $csv_sep = ",";
    $csv = "";
    $csv .= 'tarjeta,cuenta,cliente,fecha,comercio,autorizacion,cargo,abono,disponible,Status'. $csv_end; // formato de respuesta
    $FileName = "uploads/RCEC".date('dmyhis').".csv"; // CSV de respuesta
    $extension = strtolower(substr($_FILES['uploadfile']['name'], -4));
    $msg = ( move_uploaded_file( $_FILES['uploadfile']['tmp_name'], $fichero_subido ) )? TRUE: FALSE;

    if($extension=='.csv')
    {
        $fila=0;
      
        if (($gestor = fopen($fichero_subido, "r")) !== FALSE) 
        {  
            while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) 
            {
                $fila++; // numero de filas del archivo csv
            }
        }
        if($fila>1 and $fila<5000)
        {
            if ( ( $fichero = fopen( $fichero_subido, 'r' ) ) !== FALSE ) 
            {
                $Depositos  = 0;
                $Total      = 0;
                $Registros  = 0;
                $Registros_fallos=0;
                $NumFilas=0;
                while ( ( $datos = fgetcsv( $fichero, 1000 ) ) !== FALSE ) 
                {
                    if ($NumFilas>0) 
                    {
                        if(sizeof($datos)==11) // Si solo trae un dato
                        {
                                 //$administradoraBalance obtiene el monto actual de la empresa
                               
                                    $tarjeta=str_pad($datos[0],6,"0",STR_PAD_LEFT);
                                    $cuenta=str_pad($datos[1],8,"0",STR_PAD_LEFT);
                                    $cliente=$datos[2];//$Respuesta  = $app->applyFunds( $_SESSION['EMPRESA'] , $tarjeta, $datos[2] );
                                    $fecha=$datos[3];
                                    $comercio=$datos[4];
                                    $autorizacion=$datos[5];
                                    $cargo=$datos[8];
                                    $abono=$datos[9];
                                    $disponible=$datos[10];

                                $data=[$tarjeta,$cuenta,$cliente,$fecha,$comercio,$autorizacion,$cargo,$abono,$disponible];
                                $Respuesta=$app->insertMovementCard($data);
                                //$Respuesta='00DEMO';
                                $csv.=$tarjeta.$csv_sep.$cuenta.$csv_sep.$cliente.$csv_sep.$fecha.$csv_sep.'"'.$comercio.'"'.$csv_sep.$autorizacion.$csv_sep.$cargo.$csv_sep.$cargo.$csv_sep.$abono.$disponible.$csv_sep.substr( $Respuesta , 2 ).$csv_end;

                            if ( substr( $Respuesta, 0, 2 ) == '00' )
                            {

                                $Registros  = $Registros + 1;

                            }
                            else
                            {
                                $Registros_fallos  = $Registros_fallos + 1;
                            }   
                        }
                        else
                        {
                        $csv.=$datos[0].$csv_sep.$datos[1].',,,,,,,'.'ERROR EN EL NUMERO DE CAMPOS'.$csv_end;                
                        }
                    
                    }
                    $NumFilas++;
                }
            }

            if (!$handle = fopen($FileName, "w")) {
                echo "Cannot open file.";
                exit;
            }
    
            if (fwrite($handle, utf8_decode($csv)) === FALSE) {
                echo "Cannot write to file.";
                exit;
            }
            fclose($handle);
        
            if ( $Registros > 0 )
            {
                $msg    = 'Hecho!';
                $texto  = '00Se ingresaron ' . $Registros .' registros';
            }
            else
            {
                $msg    = 'Error';
                $texto  = '01No se ingresaron ' . $Registros_fallos .' registros';
            }
    
            $Data_layout=[$_SESSION["EMPRESA"],$fichero_subido,$FileName];
            $app->insertMovementLayout($Data_layout);
    
            $msg_layout = 
            '<div class="alert alert-success">
                <span><b> Atenci&oacute;n:</b><br>
                    <a class="btn btn-success btn-fill" href="' . $FileName . '" >Reporte de Carga
                    </a><br>
                    El archivo se subio de forma exitosa al servidor.
                </span>
            </div>';      
        }
        else
        {
            $msg    = 'Error';
            $texto  = '01Se excede e numero de columnas del archivo';    
        }
    
     
    }
    else
    {
        $msg    = 'Error';
        $texto  = '01Extensión de archivo no valido';
    
    }
}

include 'header.php';
?>

<div class="content">
    <div class="container-fluid">
       
        <div class="row">

            <?php if ( strlen( $msg ) == 6 ) { ?> 
            <div class="alert alert-success">
                <button type="button" aria-hidden="true" class="close">×</button>
                <span><?php echo 'CARGA EXITOSA #' . substr( $texto , 2 ); ?></span>
            </div>
            <?php } elseif ( strlen( $msg ) == 5 ) { ?>
            <div class="alert alert-danger">
                <button type="button" aria-hidden="true" class="close">×</button>
                <span><b> Error - </b> <?php echo substr( $texto, 2 ); ?></span>
            </div>
            <?php } ?>
            <?php if (isset( $msg_layout ) ) {
                echo $msg_layout;} ?> 
            
            
            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Fondeo Masivo de Tarjetas</h4>
                        <p>Fondea de forma masiva atreves de formato de carga(Max. 50 registros por carga).</p>
                    </div>
                    <div class="content">
                        <form action="loadestadoscuentas?scr=4" method="POST" enctype="multipart/form-data" id="form1" onsubmit="return checkSubmit('btsubmit3');">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Cargar Archivo</label>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                                        <input type="file" name="uploadfile" class="form-control" required >
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="btsubmit3" class="btn btn-info btn-fill pull-right" form="form1">Actualizar</button>
                            <a class="btn btn-default btn-fill pull-left" href="./downloads/layout_founds.csv">Descargar Layout</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';