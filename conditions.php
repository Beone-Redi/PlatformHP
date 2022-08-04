<?php

// Inicio la variables de sesion.
if (!isset($_SESSION)) 
{
    session_start();
}
$MSG='';
if(isset($_POST["id"]))
{
    if(isset($_POST["check1"]) && isset($_POST["check2"]) && isset($_POST["check3"]))
    {
        //var_dump($_SESSION);
        include "include/coredata.php";
        $app                    = new app();
        $id=$_SESSION['EMAIL'];
        $clave=$_SESSION['PASS'];
        $aUser=  $aUser = [ $id, $clave ];
        $valido = $app->login( $aUser );
        $app->new_User_Term_Conditions( $valido[0] );
        
        /*$_SESSION['EMPRESA']    = $valido[1];
        $_SESSION['ACTIVO']     = "2019";
        $_SESSION['TIEMPOIN']   = date("Y-m-d H:i:s");
        $_SESSION['USER']       = $valido[0];
        $_SESSION['PERFIL']     = $valido[2];
        $_SESSION['PERMISOS'] 	= $app->getoptionsUser( $valido[2] );*/

        $_SESSION['ACTIVO']     = "2019";
        $_SESSION['TIEMPOIN']   = date("Y-m-d H:i:s");
        $_SESSION['USER']       = $valido[0];
        $_SESSION['EMPRESA']    = $valido[1];
        $_SESSION['NCOMPANY']   = $valido[2];
        $_SESSION['PERFIL']     = $valido[3];
        $_SESSION['FULLNAME']   = $valido[4];
        $_SESSION['PERMISOS']   = $valido[5];
        // Envia al cliente al Dashboard.
        header( 'Location:dashboard' );

 
    }
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
<!--	<link rel="icon" type="image/png" href="assets/img/favicon.ico"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>HotPay</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--  CSS -->
    <link href="assets/css/demo.css" rel="stylesheet" /> 

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <!-- Grafica -->
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- <script src="assets/js/funciones.js"></script> -->
 
    <!-- Fancybox -->
    <link  href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
    
    <!-- Need to use datatables.net -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      
    <!-- Mini-extra style to be apply to tables with the dataTable plugin  -->
    <!-- Funciones en javascript -->
    <script type='text/javascript' src="assets/js/funciones.js?filever=<?=filesize('assets/js/funciones.js')?>"></script>
    
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
    <!-- Selected 2 -->
    <!-- JS Files -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
     
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
      <!-- selected 2-->
   <style type="text/css">
#register_form fieldset:not(:first-of-type) {
display: none;
}
#scroll1 {
	height: 300px;
	overflow-y: scroll;
}

</style>
</head>

<body>
    <br>
    <div class="content">
        <div class="container">
            <center><h3>Terminos y condiciones, Aviso de privacidad, políticas de información</h3></center>
            <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="alert alert-success hide"></div>
            <form id="register_form" novalidate action="conditions" method="post" onsubmit="return checkSubmit('submit');">
                <fieldset>  
                    <h3>Terminos y condiciones de uso de la plataforma</h3>
                        <div id="scroll1">
                            <div class="content">
                                <p class="category"> 
                                        <p align="justify" style="font-size:14px;">
                                            AGMR, SAPI DE CV, una empresa que está comprometida a proteger su privacidad. Además de lo dispuesto en la ley y
                                            su reglamento correspondiente en la materia, seguimos las mejores prácticas internacionales en el manejo y administración
                                            de datos personales. En todo caso, manejaremos sus datos personales con altos estándares de ética, responsabilidad y profesionalismo.
                                       </p>
                                     
                                        <p align="justify" style="font-size:14px;">
                                            Estas terminos y condiciones son aplicables específicamente a la información que recopilamos de usted a través de nuestra
                                            aplicación denominada HotPay y plataforma de AGMR, SAPI DE CV.
                                        </p>
                                   
                                        <p align="justify" style="font-size:14px;">
                                            En atención a la Ley Federal de Protección de Datos Personales en Posesión de Particulares y su reglamento (México) en 
                                            nuestra calidad de responsables del tratamiento de sus datos personales, le informamos lo siguiente: 
                                        </p>
                                        <br>
                                        
                                        <h5><b>1. A través de esta aplicación y plataforma, recopilamos únicamente los datos que a continuación se señalan:</b></h5>
                                        
                                        <b>Datos Personales y Financieros:</b><br>
                                        <p align="justify" style="font-size:14px;">
                                            Nombre completo, género, lugar y fecha de nacimiento, correo electrónico, domicilio y número celular.   
                                            <br>
                                            Información financiera concerniente al tipo de cuenta bancaria, ingresos y egresos.          </p>
                                        </p>
                                        <b>Datos de Uso:</b><br>
                                        <p align="justify" style="font-size:14px;">
                                            Navegación, uso de características, clicks, visitas, conversiones.          
                                        </p>
                                        <p align="justify" style="font-size:14px;">        
                                            Usted se compromete a que los datos que proporciona a AGMR, SAPI DE CV sean verídicos, completos y exactos. 
                                            Cualquier dato falso, incompleto o inexacto al momento de recabarlos, será de su exclusiva responsabilidad, 
                                            en caso de que requiera rectificar alguno de ellos, le ofrecemos que lo haga directamente a través de su cuenta de 
                                            Usuario o bien al correo electrónico: contacto@hotpay.mx
                                        </p>
                                        <br>

                                        <h5><b>2. Recopilamos la información señalada en el punto anterior con los siguientes propósitos:</b></h5>
                                            <p align="justify" style="font-size:14px;">
                                            Fines de identificación y verificación de datos
                                            <br>
                                            Fines estadísticos
                                            <br>
                                            Para informarle acerca de las actualizaciones de la aplicación, así como enviarle información importante relativa a su cuenta 
                                            de usuario.
                                            <br>
                                            Para proporcionarle una mejor experiencia de uso de nuestra aplicación, al conocer sus hábitos de consumo y sus correspondientes 
                                            datos de ingresos y egresos, y así ofrecerle asesoría financiera más precisa.
                                        </p>
                                        <br> 
                                        <h5><b>3. En la recolección de datos personales seguimos todos los principios que marca la ley mexicana (artículo 6):</b></h5>
                                       
                                        <p align="justify" style="font-size:14px;">
                                            Licitud, calidad, consentimiento, información, finalidad, lealtad, proporcionalidad y responsabilidad
                                        </p>
                                        <br>
                                        <p align="justify" style="font-size:14px;">
                                            4. En ningún caso se venderán, regalarán, facilitarán ni alquilarán sus datos personales y/o financieros a terceros, salvo su expresa 
                                            autorización, a excepción de los partners involucrados en la operación de nuestros sistemas, o cuando por medio de una 
                                            orden judicial se requiera para cumplir con ciertas disposiciones procesales. Sólo se podrá difundir la información en casos especiales, como identificar, 
                                            localizar o realizar acciones legales contra aquellas personas que infrinjan las condiciones de servicio de la aplicación, causen daños a,
                                            o interfieran en, los derechos de AGMR, SAPI DE CV, sus propiedades, de otros Usuarios del portal o de cualquier persona que pudiese resultar perjudicada por dichas acciones.
                                        </p>
                                        <br>
                                        
                                        <p align="justify" style="font-size:14px;">
                                            5. La seguridad y la confidencialidad de los datos que los usuarios proporcionen al contratar un servicio o comprar un producto en línea estarán protegidos 
                                            por un servidor seguro bajo el protocolo Secure Socket Layer (SSL), de tal forma que los datos enviados se transmitirán encriptados para asegurar su resguardo.         
                                        </p>
                                        <br>
                                        <p align="justify" style="font-size:14px;">
                                            6. El usuario otorga su consentimiento a AGMR, SAPI DE CV para que le envíe todo tipo de publicidad, incluyendo promociones. 
                                            El usuario podrá dejar de recibir los mensajes de promoción y publicidad enviando un correo a la dirección contacto@hotpay.mx pidiendo que se le elimine de la lista de correos para envío de publicidad.
                                        </p>
                                        <br>

                                        <p align="justify" style="font-size:14px;">
                                            7. Las cookies son archivos de texto que son descargados automáticamente y almacenados en el disco duro del equipo de cómputo del 
                                            Usuario al navegar en una página de internet específica, que permiten recordar al servidor de Internet algunos datos sobre los usuarios que acceden 
                                            a este portal electrónico.
                                            <br><br>
                                            En AGMR, SAPI DE CV usamos las cookies para:
                                            <br>
                                            Su tipo de navegador y sistema operativo.
                                            <br>    
                                            Las páginas de internet que visita.
                                            <br>
                                            Los vínculos que sigue.
                                            <br>
                                            Estas cookies y otras tecnologías pueden ser deshabilitadas. Para conocer cómo hacerlo, consulte la información de su explorador de Internet.
                                            <br>
                                        </p>
                                        <br>
                                        <p align="justify" style="font-size:14px;">
                                            8. Este aviso de privacidad cumple con los requisitos que marca la ley (artículos 15 y 16). AGMR, SAPI DE CV toma muy en cuenta la seguridad de 
                                            sus datos, por lo que contamos con mecanismos tecnológicos, físicos, administrativos y legales para proteger su información, tales como 
                                            servidores con los más altos niveles de seguridad informática y el certificado SSL de conexión segura. 
                                            Además nuestras bases de datos y toda la información que viaja a través de ellas se encuentra bajo encriptación de 128 bits 
                                            (el mismo estándar que utilizan los sitios bancarios) y debidamente resguardada en servidores que cuentan con más de 7 niveles de seguridad 
                                            tanto física como informática.  
                                        </p>
                                        <br>
                                        <p align="justify" style="font-size:14px;">
                                            9. AGMR, SAPI DE CV se reserva el derecho de cambiar este aviso de privacidad en cualquier momento, mediando la debida notificación que exige la ley. 
                                            En caso de que exista algún cambio en este aviso de privacidad, AGMR, SAPI DE CV lo comunicará de la siguiente manera: (a) enviándole un correo electrónico a la cuenta 
                                            que ha registrado en la aplicación y/o (b) publicando una nota visible en nuestra aplicación. AGMR, SAPI DE CV no será responsable si usted no recibe la notificación de 
                                            cambio en el aviso de privacidad si existiere algún problema con su cuenta de correo electrónico o de transmisión de datos por internet. 
                                            Por su seguridad, revise en todo momento que así lo desee el contenido de estos terminos y condiciones de este portal 
                                            </p>
                                        <br>

                                        <p align="justify" style="font-size:14px;">
                                            10. Usted podrá ejercer sus derechos ARCO (acceso, rectificación, cancelación y/u oposición) a partir del 1 de abril de 2016.
                                            <br>
                                            Domicilio: Av. Paseo de los Descubridores, Cumbres 4 Sector, Monterrey, Nuevo León.
                                            <br>
                                            Correo Electrónico: contacto@hotpay.mx
                                            <br>
                                            Teléfono: (81) 3440 7450
                                            <br>
                                            La solicitud ARCO deberá contener y acompañar lo que señala la ley en su artículo 29 y el 89, 90, 92 y demás aplicables de su Reglamento.
                                        </p>
                                        <br>
                                        <p align="justify" style="font-size:14px;">
                                            11. En caso de que se presente una controversia que se derive del presente aviso de privacidad, 
                                            las partes intentarán primero resolverla a través de negociaciones de buena fe, pudiendo ser asistidos por un mediador profesional. 
                                            Si después de un máximo de 30 días de negociación las partes no llegaren a un acuerdo, se estará a lo dispuesto por la Ley Federal de Protección de Datos Personales. 
                                            en Posesión de Particulares, aceptando las partes la intervención que pudiere tener el Instituto Federal de Acceso a la Información y Protección de Datos Personales.
                                        </p>
                                        <br>
                                        <p align="justify" style="font-size:14px;">
                                            12. Al hacer uso de la plataforma AGMR, SAPI DE CV, usted renuncia a cualquier otro fuero y legislación que le pudiere corresponder. 
                                            Este portal y sus servicios están regidos por las leyes mexicanas, y cualquier controversia será resuelta frente a las autoridades mexicanas competentes.
                                            
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="check1" id="check1" required>
                            <label class="form-check-label" for="exampleCheck1">He leído y acepto los terminos y condiciones</label>
                        </div>
                        <br>
                        <a  href="logout" onclick="return checkSubmitBlock('crear_company');" class="btn btn-danger">
                            Cancelar
                        </a>                 
                        <input type="button" class="next-form btn btn-info" value="Siguiente" />                         
                </fieldset>
                <fieldset>
                    <h3> Políticas de privacidad</h3>
                        <div id="scroll1">
                            <div class="content">
                                <p class="category">
                                        <p align="justify" style="font-size:14px;">
                                            (81) 3440 7450, con domicilio en Av. Paseo de los Descubridores, Cumbres 4 Sector, Monterrey, Nuevo León, 
                                            es el responsable del uso y protección de sus datos personales, y al respecto le informamos lo siguiente:
                                        </p>
                                        <br>
                                        <b>¿Para qué fines utilizaremos sus datos personales?</b><br>
                                        <p align="justify" style="font-size:14px;">
                                            Los datos personales que recabamos de usted, los utilizaremos para las siguientes finalidades 
                                            que son necesarias para el servicio que le proporcionamos:          
                                            <br>
                                            <ul>
                                                <li>Verificar y confirmar su identidad en cualquier relación jurídico o de negocios.</li>
                                                <li>Administrar, operar y correcto funcionamiento de los servicios y productos de medios de pago de los que usted es beneficiario.</li>
                                                <li>Cumplir con los lineamientos y disposiciones de las autoridades que nos regulan.</li>
                                                <li>Fines estadísticos para mejorar nuestros productos y servicios actuales y futuros.</li>
                                                <li>Atención a dudas, comentarios y quejas que realice</li>
                                                <li>Para fines mercadotécnicos, publicitarios, promocionales, telemarketing o de prospección comercial.</li>
                                            </ul>
                                                
                                        </p>
                                        <br>
                                        <b>¿Qué datos personales recabamos y utilizamos sobre usted?</b>
                                        <p align="justify" style="font-size:14px;">
                                            Para llevar a cabo las finalidades descritas en el presente aviso de privacidad, utilizaremos sus datos de identificación,
                                            datos de contacto, y datos laborales. Estos datos pueden ser recabados de distintas formas: cuando usted nos los proporciona directamente; 
                                            cuando visita nuestro sitio de Internet o utiliza nuestros servicios en línea, incluyendo la autenticación de datos; y cuando obtenemos información a través de otras 
                                            fuentes que están permitidas por la Ley Federal de Datos Personales en Posesión de los Particulares (en adelante la Ley).  
                                        </p>
                                        <br>
                                        <b>¿Qué datos personales sensibles utilizaremos?</b><br>
                                        <p align="justify" style="font-size:14px;">
                                            Así mismo, le informamos que nuestra empresa no trata datos personales sensibles.          
                                        </p>
                                        <br>
                                        <b>¿Con quién compartimos su información y para qué fines?</b>
                                        <p align="justify" style="font-size:14px;">        
                                         
                                            Sus datos personales pueden ser transferidos y tratados dentro y fuera del país, por personas distintas a esta empresa, para (a) cumplir con las disposiciones legales vigentes; 
                                            (b) en acatamiento a mandamiento u orden judicial; y (c) siempre que sea necesario para la operación y funcionamiento de la Organización. 
                                            En ese sentido, su información puede ser compartida con nuestras empresas filiales o subsidiarias. En caso de transferencia de los datos personales, esta siempre se llevará a cabo a través de figuras e instrumentos legales que brinden el nivel de protección y medidas de seguridad adecuados para dichos datos.
                                            <br><br> 
                                            En caso de que no se obtenga del Cliente y/o de los tarjetahabientes (trabajadores) beneficiarios o consumidores finales 
                                            su oposición expresa enviando un correo a la dirección electrónica contacto@hotpay.mx para que sus datos personales sean tratados y transferidos en la forma y términos antes descritos, se entenderá que han otorgado su consentimiento para ello.
                                        
                                                
                                        </p>
                                        <br>
                                        <b>¿Cómo puede ejercer sus Derechos ARCO, revocar su consentimiento, o limitar el uso o divulgación de sus datos personales?</b>
                                        <p align="justify" style="font-size:14px;">
                                            <br>Usted tiene derecho a conocer qué datos personales tenemos de usted, para qué los utilizamos y las condiciones del uso que les damos (Acceso).
                                            Asimismo, es su derecho solicitar la corrección de su información personal en caso de que esté desactualizada, sea inexacta o incompleta (Rectificación);
                                            que la eliminemos de nuestros registros o bases de datos cuando considere que la misma no está siendo utilizada conforme a los principios, deberes y obligaciones previstas en la normativa 
                                            (Cancelación); así como oponerse al uso de sus datos personales para fines específicos (Oposición). Estos derechos se conocen como derechos ARCO.
                                            <br><br>
                                            Usted puede revocar el consentimiento que, en su caso, nos haya otorgado para el tratamiento de sus datos personales. Sin embargo, es importante que tenga en cuenta 
                                            que no en todos los casos podremos atender su solicitud o concluir el uso de forma inmediata, ya que es posible que por alguna obligación legal requiramos seguir tratando sus datos personales. 
                                            Asimismo, usted deberá considerar que para ciertos fines, la revocación de su consentimiento implicará que no le podamos 
                                            seguir prestando el servicio que nos solicitó, o la conclusión de su relación con nosotros.
                                            <br><br>
                                            Usted pueda limitar el uso y divulgación de su información personal mediante su inscripción en el Registro Público para Evitar Publicidad, que está a cargo de la Procuraduría Federal del Consumidor, 
                                            con la finalidad de que sus datos personales no sean utilizados para recibir publicidad o promociones de empresas de bienes o servicios. Para mayor información sobre este registro, 
                                            usted puede consultar el portal de Internet de la PROFECO, o bien ponerse en contacto directo con ésta.
                                            <br><br>
                                            Para el ejercicio de cualquiera de los derechos ARCO, revocar su consentimiento o limitar el uso y divulgación de su información personal, usted deberá mandar un correo a contacto@hotpay.mx con el título “Derechos ARCO” 
                                            y deberá contener cuando menos lo siguiente: (i) Nombre del Titular de los Datos Personales; (ii) Domicilio, teléfono y correo electrónico para recibir comunicaciones (iii) Documentos que acrediten su identidad. En caso de ser Representante Legal, 
                                            el instrumento del que se desprendan sus facultades de representación; (iv) Descripción clara y precisa de los datos personales respecto de los que se busca ejercer los derechos; (v) Descripción clara y preciso del derecho que busca ejercer; 
                                            (vi) Cualquier otro elemento o documento que facilite la localización de los datos personales, así como cualquier otro elemento que, de conformidad con la legislación y al último Aviso de Privacidad que se encuentren vigentes al momento de la presentación de su solicitud.
                                            
                                        </p>
                                        <br> 
                                        <b>El uso de tecnologías de rastreo en nuestro portal de Internet</b>
                                        <p align="justify" style="font-size:14px;">
                                            <br>
                                            Le informamos que en nuestra página de Internet utilizamos cookies para brindarle un mejor servicio y 
                                            experiencia de usuario al navegar en nuestra página. Las Cookies son identificadores que nuestro servidor le puede enviar a su 
                                            computadora para identificar el equipo que ha sido utilizado durante la sesión. La mayoría de exploradores de Internet están diseñados para aceptar 
                                            estas Cookies automáticamente. Adicionalmente, usted podrá desactivar el almacenamiento de Cookies o ajustar su explorador de Internet para que le sea 
                                            informado antes que las Cookies se almacenen en su computadora. Las Cookies pueden ser depuradas por usted de forma manual en cuanto usted lo decida.
                                        
                                            <br><br>
                                            Sus datos personales se podrán transferir a terceros para (a) cumplir con las disposiciones legales vigentes; (b) en acatamiento a mandamiento u orden judicial; y (c) 
                                            siempre que sea necesario para la operación y funcionamiento de la Organización. En caso de transferencia de los datos personales, esta siempre se llevará a cabo a través de 
                                            figuras e instrumentos legales que brinden el nivel de protección y medidas de seguridad adecuados para dichos datos.
                                        </p>
                                        
                                        <br>
                                        <b>¿Cómo puede conocer los cambios a este aviso de privacidad?</b>
                                        <p align="justify" style="font-size:14px;">
                                            <br>
                                            El presente aviso de privacidad puede sufrir modificaciones, cambios o actualizaciones derivadas de nuevos requerimientos legales; de nuestras propias necesidades por los 
                                            productos o servicios que ofrecemos; de nuestras prácticas de privacidad; de cambios en nuestro modelo de negocio, o por otras causas.
                                            <br><br>
                                            Estas modificaciones se anunciarán y estarán disponibles al público a través de nuestra página de internet www.hotpay.mx sección “Aviso de Privacidad”
                                        </p>
                                        <br>
                                        <b>¿Ante quién puede presentar sus quejas y denuncias por el tratamiento indebido de sus datos personales?</b>
                                        <p align="justify" style="font-size:14px;">
                                        Si usted considera que su derecho de protección de datos personales ha sido lesionado por alguna conducta de nuestros empleados o de nuestras actuaciones o respuestas, presume que en el 
                                        tratamientos de sus datos personales existe alguna violación a las disposiciones previstas en la Ley Federal de Protección de Datos 
                                        Personales en Posesión de los Particulares, podrá interponer la queja o denuncia correspondiente ante el IFAI, para mayor información visite www.ifai.org.mx
                                        </p>
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="check2" id="check2" required>
                            <label class="form-check-label" for="exampleCheck2">He leído y acepto  las políticas de privacidad</label>
                        </div>
                        <br>
                        <a  href="logout" onclick="return checkSubmitBlock('crear_company');" class="btn btn-danger">
                            Cancelar
                        </a>                 
                          <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                            <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                <h3> Políticas de la información</h3>
                        <div id="scroll1">
                            <div class="content">
                                <p class="category">
                                    <b>Resumen de la política:</b>
                                        <p align="justify" style="font-size:14px;">
                                            La información debe ser siempre protegida, cualquiera que sea su forma de ser compartida, comunicada o almacenada.<br>
                                            Introducción: La información puede existir en diversas formas: impresa o escrita en papel, almacenada electrónicamente, transmitida por correo o por medios electrónicos, mostrada en proyecciones o en forma oral en las conversaciones.<br>
                                            La seguridad de la información es la protección de la información contra una amplia gama de amenazas con el fin de garantizar la continuidad del negocio, minimizar los riesgos empresariales y maximizar el retorno de las inversiones y oportunidades de negocio.
                                       </p>
                                       <br>
                                        
                                        <b>Alcance:</b>
                                        <p align="justify" style="font-size:14px;">
                                            Esta política apoya la política general del Sistema de Gestión de Seguridad de la Información de la organización.<br>
                                            Esta política es de consideración por parte de todos los miembros de la organización.
                                        </p>
                                        <br> 
                                        
                                        <b>Objetivos de seguridad de la información:</b><br>
                                        <p align="justify" style="font-size:14px;">
                                        
                                            Comprender y tratar los riesgos operacionales y estratégicos en seguridad de la información para que permanezcan en niveles aceptables para la organización.<br>
                                            La protección de la confidencialidad de la información relacionada con los clientes y con los planes de desarrollo.<br>
                                            La conservación de la integridad de los registros contables.<br>
                                            Los servicios Web de acceso público y las redes internas cumplen con las especificaciones de disponibilidad requeridas.<br>
                                            Entender y dar cobertura a las necesidades de todas las partes interesadas.
                                        </p>
                                        <br>
                                        <b>Principios de seguridad de la información:</b><br>
                                        <p align="justify" style="font-size:14px;">
                                            Esta organización afronta la toma de riesgos y tolera aquellos que, en base a la información disponible, son comprensibles, controlados y tratados cuando es necesario. Los detalles de la metodología adoptada para la evaluación del riesgo y su tratamiento se encuentran descritos en la política del SGSI.<br>
                                            Todo el personal será informado y responsable de la seguridad de la información, según sea relevante para el desempeño de su trabajo.<br>
                                            Se dispondrá de financiación para la gestión operativa de los controles relacionados con la seguridad de la información y en los procesos de gestión para su implantación y mantenimiento.<br>
                                            Se tendrán en cuenta aquellas posibilidades de fraude relacionadas con el uso abusivo de los sistemas de información dentro de la gestión global de los sistemas de información.<br>
                                            Se harán disponibles informes regulares con información de la situación de la seguridad.<br>
                                            Los riesgos en seguridad de la información serán objeto de seguimiento y se adoptarán medidas relevantes cuando existan cambios que impliquen un nivel de riesgo no aceptable.<br>
                                            Los criterios para la clasificación y la aceptación del riesgo se encuentran referenciados en la política del SGSI.<br>
                                            Las situaciones que puedan exponer a la organización a la violación de las leyes y normas legales no serán toleradas.
                                        </p>
                                        <br>
                                        <b>Responsabilidades:</b><br>
                                        <p align="justify" style="font-size:14px;">        
                                            El equipo directivo es el responsable de asegurar que la seguridad de la información se gestiona adecuadamente en toda la organización.<br>
                                            Cada gerente es responsable de garantizar que las personas que trabajan bajo su control protegen la información de acuerdo con las normas establecidas por la organización.<br>
                                            El responsable de seguridad asesora al equipo directivo, proporciona apoyo especializado al personal de la organización y garantiza que los informes sobre la situación de la seguridad de la información están disponibles.<br>
                                            Cada miembro del personal tiene la responsabilidad de mantener la seguridad de información dentro de las actividades relacionadas con su trabajo.
                                        </p>
                                        <br>
                                        <b>Indicadores clave:</b><br>
                                        <p align="justify" style="font-size:14px;">
                                            Los incidentes en seguridad de la información no se traducirán en costes graves e inesperados, o en una grave perturbación de los servicios y actividades comerciales.<br>
                                            Las pérdidas por fraude serán detectadas y permanecerán dentro de unos niveles aceptables.<br>
                                            La aceptación del cliente de los productos o servicios no se verá afectada negativamente por aspectos relacionados con la seguridad de la información.

                                        </p>
                                        <br> 
                                        <b>Políticas relacionadas:</b><br> 
                                        <p align="justify" style="font-size:14px;">
                                            A continuación, se detallan aquellas políticas que proporcionan principios y guía en aspectos específicos de la seguridad de la información:<br><br>
                                            Política del Sistema de Gestión de Seguridad de la Información (SGSI).
                                            Política de control de acceso físico.<br>
                                            Política de limpieza del puesto de trabajo.<br>
                                            Política de software no autorizado.<br>
                                            Política de descarga de ficheros (red externa/interna).<br>
                                            Política de copias de seguridad.<br>
                                            Política de intercambio de información con otras organizaciones.<br>
                                            Política de uso de los servicios de mensajería.<br>
                                            Política de retención de registros.<br>
                                            Política sobre el uso de los servicios de red.<br>
                                            Política de uso de informática y comunicaciones en movilidad.<br>
                                            Política de teletrabajo.<br>
                                            Política sobre el uso de controles criptográficos.<br>
                                            Política de cumplimiento de disposiciones legales.<br>
                                            Política de uso de licencias de software.<br>
                                            Política de protección de datos y privacidad.<br>
                                            En un nivel inferior, la política de seguridad de la información debe ser apoyada por otras normas o procedimientos sobre temas específicos que obligan aún más la aplicación de los controles de seguridad de la información y se estructuran normalmente para tratar las necesidades de determinados grupos dentro de una organización o para cubrir ciertos temas.<br><br>
                                            <b>Ejemplo de estos temas de politíca incluyen:</b><br>
                                            Control de acceso.<br>
                                            Clasificación de la información.<br>
                                            La seguridad física y ambiental.<br><br>
                                            <b>Y más directamente dirigidas a usuarios:</b><br>
                                            El uso aceptable de los activos.<br>
                                            Escritorio limpio y claro de la pantalla.<br>
                                            La transferencia de información.<br>
                                            Los dispositivos móviles y el teletrabajo.<br>
                                            Las restricciones a la instalación de software y el uso.<br>
                                            Copia de seguridad.<br>
                                            La transferencia de información.<br>
                                            La protección contra el malware.<br>
                                            La gestión de vulnerabilidades técnicas.<br>
                                            Controles criptográficos.<br>
                                            Las comunicaciones de seguridad.<br>
                                            La intimidad y la protección de la información personal identificable.<br><br>

                                            Estas políticas/normas/procedimientos deben ser comunicadas a los empleados y partes externas interesadas. La necesidad de normas internas de seguridad de la información varía dependiendo de las organizaciones.<br>
                                            Cuando algunas de las normas o políticas de seguridad de la información se distribuyen fuera de la organización, se deberá tener cuidado de no revelar información confidencial. Algunas organizaciones utilizan otros términos para estos documentos de política, como: normas, directrices o reglas.
                                            Todas estas políticas deben servir de apoyo para la identificación de riesgos mediante la disposición de controles en relación a un punto de referencia que pueda ser utilizado para identificar las deficiencias en el diseño e implementación de los sistemas, y el tratamiento de los riesgos mediante la posible identificación de tratamientos adecuados para las vulnerabilidades y amenazas localizadas.
                                            Esta identificación y tratamiento de los riesgos forman parte de los procesos definidos en la sección de Principios dentro de la política de seguridad o, como se referencia en el ejemplo, suelen formar parte de la propia política del SGSI, tal y como se observa a continuación.
                                            <br><br>POLÍTICA DE SGSI<br>
                                            En vista de la importancia para el correcto desarrollo de los procesos de negocio, los sistemas de información deben estar protegidos adecuadamente.
                                            Una protección fiable permite a la organización percibir mejor sus intereses y llevar a cabo eficientemente sus obligaciones en seguridad de la información. La inadecuada protección afecta al rendimiento general de una empresa y puede afectar negativamente a la imagen, reputación y confianza de los clientes, pero, también, de los inversores que depositan su confianza, para el crecimiento estratégico de nuestras actividades a nivel internacional.
                                            El objetivo de la seguridad de la información es asegurar la continuidad del negocio en la organización y reducir al mínimo el riesgo de daño mediante la prevención de incidentes de seguridad, así como reducir su impacto potencial cuando sea inevitable.
                                            Para lograr este objetivo, la organización ha desarrollado una metodología de gestión del riesgo que permite analizar regularmente el grado de exposición de nuestros activos importantes frente a aquellas amenazas que puedan aprovechar ciertas vulnerabilidades e introduzcan impactos adversos a las actividades de nuestro personal o a los procesos importantes de nuestra organización.
                                            El éxito en el uso de esta metodología parte de la propia experiencia y aportación de todos los empleados en materia de seguridad, y mediante la comunicación de cualquier consideración relevante a sus responsables directos en las reuniones semestrales establecidas por parte de la dirección, con el objeto de localizar posibles cambios en los niveles de protección y evaluar las opciones más eficaces en coste/beneficio de gestión del riesgo en cada momento, y según el caso.
                                            Los principios presentados en la política de seguridad que acompaña a esta política fueron desarrollados por el grupo de gestión de la información de seguridad con el fin de garantizar que las futuras decisiones se basen en preservar la confidencialidad, integridad y disponibilidad de la información relevante de la organización. La organización cuenta con la colaboración de todos los empleados en la aplicación de las políticas y directivas de seguridad propuestas.
                                            El uso diario de los ordenadores por el personal determina el cumplimiento de las exigencias de estos principios y un proceso de inspección para confirmar que se respetan y cumplen por parte de toda la organización. Adicionalmente a esta política, y a la política de seguridad de la organización, se disponen de políticas específicas para las diferentes actividades.
                                            Todas las políticas de seguridad vigentes permanecerán disponibles en la intranet de la organización y se actualizarán regularmente. El acceso es directo desde todas las estaciones de trabajo conectadas a la red de la organización y mediante un clic de ratón desde la página Web principal en el apartado Seguridad de la Información. El objetivo de la política es proteger los activos de información de la organización en contra de todas las amenazas y vulnerabilidades internas y externas, tanto si se producen de manera deliberada como accidental.
                                            LA DIRECCIÓN EJECUTIVA DE LA EMPRESA ES LA RESPONSABLE DE APROBAR UNA POLÍTICA DE SEGURIDAD DE LA INFORMACIÓN QUE ASEGURE QUE:
                                            La información estará protegida contra cualquier acceso no autorizado.
                                            La confidencialidad de la información, especialmente aquella relacionada con los datos de carácter personal de los empleados y clientes.
                                            La integridad de la información se mantendrá en relación a la clasificación de la información (especialmente la de “uso interno”).
                                            La disponibilidad de la información cumple con los tiempos relevantes para el desarrollo de los procesos críticos de negocio.
                                            Se cumplen con los requisitos de las legislaciones y reglamentaciones vigentes, especialmente con la Ley de Protección de Datos y de Firma Electrónica.
                                            Los planes de continuidad de negocio serán mantenidos, probados y actualizados al menos con carácter anual.
                                            La capacitación en materia de seguridad se cumple y se actualiza suficientemente para todos los empleados.
                                            Todos los eventos que tengan relación con la seguridad de la información, reales como supuestos, se comunicarán al responsable de seguridad y serán investigados.
                                            <br>Adicionalmente, se dispone de procedimientos de apoyo que incluyen el modo específico en que se deben acometer las directrices generales indicadas en las políticas y por parte de los responsables designados.
                                            El cumplimiento de esta política, así como de la política de seguridad de la información y de cualquier procedimiento o documentación incluida dentro del repositorio de documentación del SGSI, es obligatorio y atañe a todo el personal de la organización.
                                            Las visitas y personal externo que accedan a nuestras instalaciones no están exentas del cumplimiento de las obligaciones indiciadas en la documentación del SGSI, y el personal interno observará su cumplimiento.
                                            En cualquier caso, de duda, aclaración o para más información sobre el uso de esta política y la aplicación de su contenido, por favor, consulte por teléfono o e-mail al responsable del SGSI designado formalmente en el organigrama corporativo.
                                        </p>              
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="check3" id="check3" required/>
                            <label class="form-check-label" for="exampleCheck3">He leído y acepto las políticas de información</label>
                        </div>
                        <br>
                        <a  href="logout" onclick="return checkSubmitBlock('crear_company');" class="btn btn-danger">
                            Cancelar
                        </a>
                        <input type="hidden" name="id" value="1">                 
                            <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                            <input type="submit" name="submit" class="submit btn btn-success" value="Terminar" />
                </fieldset> 
            </form>
        </div>
    </div>


</body>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    
    <!-- Light Bootstrap Table Core javascript and methods -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Fancybox -->
    <script src="assets/js/jquery.fancybox.min.js"></script>

	<script type="text/javascript">
    $(document).ready(function(){
        var form_count = 1, previous_form, next_form, total_forms;
        total_forms = $("fieldset").length;
        $(".next-form").click(function(){
            previous_form = $(this).parent();
            next_form = $(this).parent().next();
            next_form.show();
            previous_form.hide();
            setProgressBarValue(++form_count);
        });
        $(".previous-form").click(function(){
            previous_form = $(this).parent();
            next_form = $(this).parent().prev();
            next_form.show();
            previous_form.hide();
            setProgressBarValue(--form_count);
        });
        setProgressBarValue(form_count);
        function setProgressBarValue(value){
            var percent = parseFloat(100 / total_forms) * value;
            percent = percent.toFixed();
            $(".progress-bar")
            .css("width",percent+"%")
            .html(percent+"%");
            }
        // Handle form submit and validation
        $( "#register_form" ).submit(function(event) {
            var error_message = '';
            var isChecked1 = document.getElementById('check1').checked;
            var isChecked2 = document.getElementById('check2').checked;
            var isChecked3 = document.getElementById('check3').checked;
            
            if(!isChecked1){
                error_message+="Por favor acepte los terminos y condiciones. \t";
            }
            if(!isChecked2){
                error_message+="<br>Por favor acepte las políticas de privacidad";
            }
            if(!isChecked3){
                error_message+="<br>Por favor acepte las políticas de la informacion";
            }
            // Display error if any else submit form
            if(error_message) {
                $('.alert-success').removeClass('hide').html(error_message);
            return false;
            } 
            else {
                return true;
            }
        });
    });

	</script>
    
   
</html>

</body>