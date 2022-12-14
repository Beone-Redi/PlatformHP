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
            <center><h3>Terminos y condiciones, Aviso de privacidad, pol??ticas de informaci??n</h3></center>
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
                                            AGMR, SAPI DE CV, una empresa que est?? comprometida a proteger su privacidad. Adem??s de lo dispuesto en la ley y
                                            su reglamento correspondiente en la materia, seguimos las mejores pr??cticas internacionales en el manejo y administraci??n
                                            de datos personales. En todo caso, manejaremos sus datos personales con altos est??ndares de ??tica, responsabilidad y profesionalismo.
                                       </p>
                                     
                                        <p align="justify" style="font-size:14px;">
                                            Estas terminos y condiciones son aplicables espec??ficamente a la informaci??n que recopilamos de usted a trav??s de nuestra
                                            aplicaci??n denominada HotPay y plataforma de AGMR, SAPI DE CV.
                                        </p>
                                   
                                        <p align="justify" style="font-size:14px;">
                                            En atenci??n a la Ley Federal de Protecci??n de Datos Personales en Posesi??n de Particulares y su reglamento (M??xico) en 
                                            nuestra calidad de responsables del tratamiento de sus datos personales, le informamos lo siguiente: 
                                        </p>
                                        <br>
                                        
                                        <h5><b>1. A trav??s de esta aplicaci??n y plataforma, recopilamos ??nicamente los datos que a continuaci??n se se??alan:</b></h5>
                                        
                                        <b>Datos Personales y Financieros:</b><br>
                                        <p align="justify" style="font-size:14px;">
                                            Nombre completo, g??nero, lugar y fecha de nacimiento, correo electr??nico, domicilio y n??mero celular.   
                                            <br>
                                            Informaci??n financiera concerniente al tipo de cuenta bancaria, ingresos y egresos.          </p>
                                        </p>
                                        <b>Datos de Uso:</b><br>
                                        <p align="justify" style="font-size:14px;">
                                            Navegaci??n, uso de caracter??sticas, clicks, visitas, conversiones.          
                                        </p>
                                        <p align="justify" style="font-size:14px;">        
                                            Usted se compromete a que los datos que proporciona a AGMR, SAPI DE CV sean ver??dicos, completos y exactos. 
                                            Cualquier dato falso, incompleto o inexacto al momento de recabarlos, ser?? de su exclusiva responsabilidad, 
                                            en caso de que requiera rectificar alguno de ellos, le ofrecemos que lo haga directamente a trav??s de su cuenta de 
                                            Usuario o bien al correo electr??nico: contacto@hotpay.mx
                                        </p>
                                        <br>

                                        <h5><b>2. Recopilamos la informaci??n se??alada en el punto anterior con los siguientes prop??sitos:</b></h5>
                                            <p align="justify" style="font-size:14px;">
                                            Fines de identificaci??n y verificaci??n de datos
                                            <br>
                                            Fines estad??sticos
                                            <br>
                                            Para informarle acerca de las actualizaciones de la aplicaci??n, as?? como enviarle informaci??n importante relativa a su cuenta 
                                            de usuario.
                                            <br>
                                            Para proporcionarle una mejor experiencia de uso de nuestra aplicaci??n, al conocer sus h??bitos de consumo y sus correspondientes 
                                            datos de ingresos y egresos, y as?? ofrecerle asesor??a financiera m??s precisa.
                                        </p>
                                        <br> 
                                        <h5><b>3. En la recolecci??n de datos personales seguimos todos los principios que marca la ley mexicana (art??culo 6):</b></h5>
                                       
                                        <p align="justify" style="font-size:14px;">
                                            Licitud, calidad, consentimiento, informaci??n, finalidad, lealtad, proporcionalidad y responsabilidad
                                        </p>
                                        <br>
                                        <p align="justify" style="font-size:14px;">
                                            4. En ning??n caso se vender??n, regalar??n, facilitar??n ni alquilar??n sus datos personales y/o financieros a terceros, salvo su expresa 
                                            autorizaci??n, a excepci??n de los partners involucrados en la operaci??n de nuestros sistemas, o cuando por medio de una 
                                            orden judicial se requiera para cumplir con ciertas disposiciones procesales. S??lo se podr?? difundir la informaci??n en casos especiales, como identificar, 
                                            localizar o realizar acciones legales contra aquellas personas que infrinjan las condiciones de servicio de la aplicaci??n, causen da??os a,
                                            o interfieran en, los derechos de AGMR, SAPI DE CV, sus propiedades, de otros Usuarios del portal o de cualquier persona que pudiese resultar perjudicada por dichas acciones.
                                        </p>
                                        <br>
                                        
                                        <p align="justify" style="font-size:14px;">
                                            5. La seguridad y la confidencialidad de los datos que los usuarios proporcionen al contratar un servicio o comprar un producto en l??nea estar??n protegidos 
                                            por un servidor seguro bajo el protocolo Secure Socket Layer (SSL), de tal forma que los datos enviados se transmitir??n encriptados para asegurar su resguardo.         
                                        </p>
                                        <br>
                                        <p align="justify" style="font-size:14px;">
                                            6. El usuario otorga su consentimiento a AGMR, SAPI DE CV para que le env??e todo tipo de publicidad, incluyendo promociones. 
                                            El usuario podr?? dejar de recibir los mensajes de promoci??n y publicidad enviando un correo a la direcci??n contacto@hotpay.mx pidiendo que se le elimine de la lista de correos para env??o de publicidad.
                                        </p>
                                        <br>

                                        <p align="justify" style="font-size:14px;">
                                            7. Las cookies son archivos de texto que son descargados autom??ticamente y almacenados en el disco duro del equipo de c??mputo del 
                                            Usuario al navegar en una p??gina de internet espec??fica, que permiten recordar al servidor de Internet algunos datos sobre los usuarios que acceden 
                                            a este portal electr??nico.
                                            <br><br>
                                            En AGMR, SAPI DE CV usamos las cookies para:
                                            <br>
                                            Su tipo de navegador y sistema operativo.
                                            <br>    
                                            Las p??ginas de internet que visita.
                                            <br>
                                            Los v??nculos que sigue.
                                            <br>
                                            Estas cookies y otras tecnolog??as pueden ser deshabilitadas. Para conocer c??mo hacerlo, consulte la informaci??n de su explorador de Internet.
                                            <br>
                                        </p>
                                        <br>
                                        <p align="justify" style="font-size:14px;">
                                            8. Este aviso de privacidad cumple con los requisitos que marca la ley (art??culos 15 y 16). AGMR, SAPI DE CV toma muy en cuenta la seguridad de 
                                            sus datos, por lo que contamos con mecanismos tecnol??gicos, f??sicos, administrativos y legales para proteger su informaci??n, tales como 
                                            servidores con los m??s altos niveles de seguridad inform??tica y el certificado SSL de conexi??n segura. 
                                            Adem??s nuestras bases de datos y toda la informaci??n que viaja a trav??s de ellas se encuentra bajo encriptaci??n de 128 bits 
                                            (el mismo est??ndar que utilizan los sitios bancarios) y debidamente resguardada en servidores que cuentan con m??s de 7 niveles de seguridad 
                                            tanto f??sica como inform??tica.  
                                        </p>
                                        <br>
                                        <p align="justify" style="font-size:14px;">
                                            9. AGMR, SAPI DE CV se reserva el derecho de cambiar este aviso de privacidad en cualquier momento, mediando la debida notificaci??n que exige la ley. 
                                            En caso de que exista alg??n cambio en este aviso de privacidad, AGMR, SAPI DE CV lo comunicar?? de la siguiente manera: (a) envi??ndole un correo electr??nico a la cuenta 
                                            que ha registrado en la aplicaci??n y/o (b) publicando una nota visible en nuestra aplicaci??n. AGMR, SAPI DE CV no ser?? responsable si usted no recibe la notificaci??n de 
                                            cambio en el aviso de privacidad si existiere alg??n problema con su cuenta de correo electr??nico o de transmisi??n de datos por internet. 
                                            Por su seguridad, revise en todo momento que as?? lo desee el contenido de estos terminos y condiciones de este portal 
                                            </p>
                                        <br>

                                        <p align="justify" style="font-size:14px;">
                                            10. Usted podr?? ejercer sus derechos ARCO (acceso, rectificaci??n, cancelaci??n y/u oposici??n) a partir del 1 de abril de 2016.
                                            <br>
                                            Domicilio: Av. Paseo de los Descubridores, Cumbres 4 Sector, Monterrey, Nuevo Le??n.
                                            <br>
                                            Correo Electr??nico: contacto@hotpay.mx
                                            <br>
                                            Tel??fono: (81) 3440 7450
                                            <br>
                                            La solicitud ARCO deber?? contener y acompa??ar lo que se??ala la ley en su art??culo 29 y el 89, 90, 92 y dem??s aplicables de su Reglamento.
                                        </p>
                                        <br>
                                        <p align="justify" style="font-size:14px;">
                                            11. En caso de que se presente una controversia que se derive del presente aviso de privacidad, 
                                            las partes intentar??n primero resolverla a trav??s de negociaciones de buena fe, pudiendo ser asistidos por un mediador profesional. 
                                            Si despu??s de un m??ximo de 30 d??as de negociaci??n las partes no llegaren a un acuerdo, se estar?? a lo dispuesto por la Ley Federal de Protecci??n de Datos Personales. 
                                            en Posesi??n de Particulares, aceptando las partes la intervenci??n que pudiere tener el Instituto Federal de Acceso a la Informaci??n y Protecci??n de Datos Personales.
                                        </p>
                                        <br>
                                        <p align="justify" style="font-size:14px;">
                                            12. Al hacer uso de la plataforma AGMR, SAPI DE CV, usted renuncia a cualquier otro fuero y legislaci??n que le pudiere corresponder. 
                                            Este portal y sus servicios est??n regidos por las leyes mexicanas, y cualquier controversia ser?? resuelta frente a las autoridades mexicanas competentes.
                                            
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="check1" id="check1" required>
                            <label class="form-check-label" for="exampleCheck1">He le??do y acepto los terminos y condiciones</label>
                        </div>
                        <br>
                        <a  href="logout" onclick="return checkSubmitBlock('crear_company');" class="btn btn-danger">
                            Cancelar
                        </a>                 
                        <input type="button" class="next-form btn btn-info" value="Siguiente" />                         
                </fieldset>
                <fieldset>
                    <h3> Pol??ticas de privacidad</h3>
                        <div id="scroll1">
                            <div class="content">
                                <p class="category">
                                        <p align="justify" style="font-size:14px;">
                                            (81) 3440 7450, con domicilio en Av. Paseo de los Descubridores, Cumbres 4 Sector, Monterrey, Nuevo Le??n, 
                                            es el responsable del uso y protecci??n de sus datos personales, y al respecto le informamos lo siguiente:
                                        </p>
                                        <br>
                                        <b>??Para qu?? fines utilizaremos sus datos personales?</b><br>
                                        <p align="justify" style="font-size:14px;">
                                            Los datos personales que recabamos de usted, los utilizaremos para las siguientes finalidades 
                                            que son necesarias para el servicio que le proporcionamos:          
                                            <br>
                                            <ul>
                                                <li>Verificar y confirmar su identidad en cualquier relaci??n jur??dico o de negocios.</li>
                                                <li>Administrar, operar y correcto funcionamiento de los servicios y productos de medios de pago de los que usted es beneficiario.</li>
                                                <li>Cumplir con los lineamientos y disposiciones de las autoridades que nos regulan.</li>
                                                <li>Fines estad??sticos para mejorar nuestros productos y servicios actuales y futuros.</li>
                                                <li>Atenci??n a dudas, comentarios y quejas que realice</li>
                                                <li>Para fines mercadot??cnicos, publicitarios, promocionales, telemarketing o de prospecci??n comercial.</li>
                                            </ul>
                                                
                                        </p>
                                        <br>
                                        <b>??Qu?? datos personales recabamos y utilizamos sobre usted?</b>
                                        <p align="justify" style="font-size:14px;">
                                            Para llevar a cabo las finalidades descritas en el presente aviso de privacidad, utilizaremos sus datos de identificaci??n,
                                            datos de contacto, y datos laborales. Estos datos pueden ser recabados de distintas formas: cuando usted nos los proporciona directamente; 
                                            cuando visita nuestro sitio de Internet o utiliza nuestros servicios en l??nea, incluyendo la autenticaci??n de datos; y cuando obtenemos informaci??n a trav??s de otras 
                                            fuentes que est??n permitidas por la Ley Federal de Datos Personales en Posesi??n de los Particulares (en adelante la Ley).  
                                        </p>
                                        <br>
                                        <b>??Qu?? datos personales sensibles utilizaremos?</b><br>
                                        <p align="justify" style="font-size:14px;">
                                            As?? mismo, le informamos que nuestra empresa no trata datos personales sensibles.          
                                        </p>
                                        <br>
                                        <b>??Con qui??n compartimos su informaci??n y para qu?? fines?</b>
                                        <p align="justify" style="font-size:14px;">        
                                         
                                            Sus datos personales pueden ser transferidos y tratados dentro y fuera del pa??s, por personas distintas a esta empresa, para (a) cumplir con las disposiciones legales vigentes; 
                                            (b) en acatamiento a mandamiento u orden judicial; y (c) siempre que sea necesario para la operaci??n y funcionamiento de la Organizaci??n. 
                                            En ese sentido, su informaci??n puede ser compartida con nuestras empresas filiales o subsidiarias. En caso de transferencia de los datos personales, esta siempre se llevar?? a cabo a trav??s de figuras e instrumentos legales que brinden el nivel de protecci??n y medidas de seguridad adecuados para dichos datos.
                                            <br><br> 
                                            En caso de que no se obtenga del Cliente y/o de los tarjetahabientes (trabajadores) beneficiarios o consumidores finales 
                                            su oposici??n expresa enviando un correo a la direcci??n electr??nica contacto@hotpay.mx para que sus datos personales sean tratados y transferidos en la forma y t??rminos antes descritos, se entender?? que han otorgado su consentimiento para ello.
                                        
                                                
                                        </p>
                                        <br>
                                        <b>??C??mo puede ejercer sus Derechos ARCO, revocar su consentimiento, o limitar el uso o divulgaci??n de sus datos personales?</b>
                                        <p align="justify" style="font-size:14px;">
                                            <br>Usted tiene derecho a conocer qu?? datos personales tenemos de usted, para qu?? los utilizamos y las condiciones del uso que les damos (Acceso).
                                            Asimismo, es su derecho solicitar la correcci??n de su informaci??n personal en caso de que est?? desactualizada, sea inexacta o incompleta (Rectificaci??n);
                                            que la eliminemos de nuestros registros o bases de datos cuando considere que la misma no est?? siendo utilizada conforme a los principios, deberes y obligaciones previstas en la normativa 
                                            (Cancelaci??n); as?? como oponerse al uso de sus datos personales para fines espec??ficos (Oposici??n). Estos derechos se conocen como derechos ARCO.
                                            <br><br>
                                            Usted puede revocar el consentimiento que, en su caso, nos haya otorgado para el tratamiento de sus datos personales. Sin embargo, es importante que tenga en cuenta 
                                            que no en todos los casos podremos atender su solicitud o concluir el uso de forma inmediata, ya que es posible que por alguna obligaci??n legal requiramos seguir tratando sus datos personales. 
                                            Asimismo, usted deber?? considerar que para ciertos fines, la revocaci??n de su consentimiento implicar?? que no le podamos 
                                            seguir prestando el servicio que nos solicit??, o la conclusi??n de su relaci??n con nosotros.
                                            <br><br>
                                            Usted pueda limitar el uso y divulgaci??n de su informaci??n personal mediante su inscripci??n en el Registro P??blico para Evitar Publicidad, que est?? a cargo de la Procuradur??a Federal del Consumidor, 
                                            con la finalidad de que sus datos personales no sean utilizados para recibir publicidad o promociones de empresas de bienes o servicios. Para mayor informaci??n sobre este registro, 
                                            usted puede consultar el portal de Internet de la PROFECO, o bien ponerse en contacto directo con ??sta.
                                            <br><br>
                                            Para el ejercicio de cualquiera de los derechos ARCO, revocar su consentimiento o limitar el uso y divulgaci??n de su informaci??n personal, usted deber?? mandar un correo a contacto@hotpay.mx con el t??tulo ???Derechos ARCO??? 
                                            y deber?? contener cuando menos lo siguiente: (i) Nombre del Titular de los Datos Personales; (ii) Domicilio, tel??fono y correo electr??nico para recibir comunicaciones (iii) Documentos que acrediten su identidad. En caso de ser Representante Legal, 
                                            el instrumento del que se desprendan sus facultades de representaci??n; (iv) Descripci??n clara y precisa de los datos personales respecto de los que se busca ejercer los derechos; (v) Descripci??n clara y preciso del derecho que busca ejercer; 
                                            (vi) Cualquier otro elemento o documento que facilite la localizaci??n de los datos personales, as?? como cualquier otro elemento que, de conformidad con la legislaci??n y al ??ltimo Aviso de Privacidad que se encuentren vigentes al momento de la presentaci??n de su solicitud.
                                            
                                        </p>
                                        <br> 
                                        <b>El uso de tecnolog??as de rastreo en nuestro portal de Internet</b>
                                        <p align="justify" style="font-size:14px;">
                                            <br>
                                            Le informamos que en nuestra p??gina de Internet utilizamos cookies para brindarle un mejor servicio y 
                                            experiencia de usuario al navegar en nuestra p??gina. Las Cookies son identificadores que nuestro servidor le puede enviar a su 
                                            computadora para identificar el equipo que ha sido utilizado durante la sesi??n. La mayor??a de exploradores de Internet est??n dise??ados para aceptar 
                                            estas Cookies autom??ticamente. Adicionalmente, usted podr?? desactivar el almacenamiento de Cookies o ajustar su explorador de Internet para que le sea 
                                            informado antes que las Cookies se almacenen en su computadora. Las Cookies pueden ser depuradas por usted de forma manual en cuanto usted lo decida.
                                        
                                            <br><br>
                                            Sus datos personales se podr??n transferir a terceros para (a) cumplir con las disposiciones legales vigentes; (b) en acatamiento a mandamiento u orden judicial; y (c) 
                                            siempre que sea necesario para la operaci??n y funcionamiento de la Organizaci??n. En caso de transferencia de los datos personales, esta siempre se llevar?? a cabo a trav??s de 
                                            figuras e instrumentos legales que brinden el nivel de protecci??n y medidas de seguridad adecuados para dichos datos.
                                        </p>
                                        
                                        <br>
                                        <b>??C??mo puede conocer los cambios a este aviso de privacidad?</b>
                                        <p align="justify" style="font-size:14px;">
                                            <br>
                                            El presente aviso de privacidad puede sufrir modificaciones, cambios o actualizaciones derivadas de nuevos requerimientos legales; de nuestras propias necesidades por los 
                                            productos o servicios que ofrecemos; de nuestras pr??cticas de privacidad; de cambios en nuestro modelo de negocio, o por otras causas.
                                            <br><br>
                                            Estas modificaciones se anunciar??n y estar??n disponibles al p??blico a trav??s de nuestra p??gina de internet www.hotpay.mx secci??n ???Aviso de Privacidad???
                                        </p>
                                        <br>
                                        <b>??Ante qui??n puede presentar sus quejas y denuncias por el tratamiento indebido de sus datos personales?</b>
                                        <p align="justify" style="font-size:14px;">
                                        Si usted considera que su derecho de protecci??n de datos personales ha sido lesionado por alguna conducta de nuestros empleados o de nuestras actuaciones o respuestas, presume que en el 
                                        tratamientos de sus datos personales existe alguna violaci??n a las disposiciones previstas en la Ley Federal de Protecci??n de Datos 
                                        Personales en Posesi??n de los Particulares, podr?? interponer la queja o denuncia correspondiente ante el IFAI, para mayor informaci??n visite www.ifai.org.mx
                                        </p>
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="check2" id="check2" required>
                            <label class="form-check-label" for="exampleCheck2">He le??do y acepto  las pol??ticas de privacidad</label>
                        </div>
                        <br>
                        <a  href="logout" onclick="return checkSubmitBlock('crear_company');" class="btn btn-danger">
                            Cancelar
                        </a>                 
                          <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                            <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                <h3> Pol??ticas de la informaci??n</h3>
                        <div id="scroll1">
                            <div class="content">
                                <p class="category">
                                    <b>Resumen de la pol??tica:</b>
                                        <p align="justify" style="font-size:14px;">
                                            La informaci??n debe ser siempre protegida, cualquiera que sea su forma de ser compartida, comunicada o almacenada.<br>
                                            Introducci??n: La informaci??n puede existir en diversas formas: impresa o escrita en papel, almacenada electr??nicamente, transmitida por correo o por medios electr??nicos, mostrada en proyecciones o en forma oral en las conversaciones.<br>
                                            La seguridad de la informaci??n es la protecci??n de la informaci??n contra una amplia gama de amenazas con el fin de garantizar la continuidad del negocio, minimizar los riesgos empresariales y maximizar el retorno de las inversiones y oportunidades de negocio.
                                       </p>
                                       <br>
                                        
                                        <b>Alcance:</b>
                                        <p align="justify" style="font-size:14px;">
                                            Esta pol??tica apoya la pol??tica general del Sistema de Gesti??n de Seguridad de la Informaci??n de la organizaci??n.<br>
                                            Esta pol??tica es de consideraci??n por parte de todos los miembros de la organizaci??n.
                                        </p>
                                        <br> 
                                        
                                        <b>Objetivos de seguridad de la informaci??n:</b><br>
                                        <p align="justify" style="font-size:14px;">
                                        
                                            Comprender y tratar los riesgos operacionales y estrat??gicos en seguridad de la informaci??n para que permanezcan en niveles aceptables para la organizaci??n.<br>
                                            La protecci??n de la confidencialidad de la informaci??n relacionada con los clientes y con los planes de desarrollo.<br>
                                            La conservaci??n de la integridad de los registros contables.<br>
                                            Los servicios Web de acceso p??blico y las redes internas cumplen con las especificaciones de disponibilidad requeridas.<br>
                                            Entender y dar cobertura a las necesidades de todas las partes interesadas.
                                        </p>
                                        <br>
                                        <b>Principios de seguridad de la informaci??n:</b><br>
                                        <p align="justify" style="font-size:14px;">
                                            Esta organizaci??n afronta la toma de riesgos y tolera aquellos que, en base a la informaci??n disponible, son comprensibles, controlados y tratados cuando es necesario. Los detalles de la metodolog??a adoptada para la evaluaci??n del riesgo y su tratamiento se encuentran descritos en la pol??tica del SGSI.<br>
                                            Todo el personal ser?? informado y responsable de la seguridad de la informaci??n, seg??n sea relevante para el desempe??o de su trabajo.<br>
                                            Se dispondr?? de financiaci??n para la gesti??n operativa de los controles relacionados con la seguridad de la informaci??n y en los procesos de gesti??n para su implantaci??n y mantenimiento.<br>
                                            Se tendr??n en cuenta aquellas posibilidades de fraude relacionadas con el uso abusivo de los sistemas de informaci??n dentro de la gesti??n global de los sistemas de informaci??n.<br>
                                            Se har??n disponibles informes regulares con informaci??n de la situaci??n de la seguridad.<br>
                                            Los riesgos en seguridad de la informaci??n ser??n objeto de seguimiento y se adoptar??n medidas relevantes cuando existan cambios que impliquen un nivel de riesgo no aceptable.<br>
                                            Los criterios para la clasificaci??n y la aceptaci??n del riesgo se encuentran referenciados en la pol??tica del SGSI.<br>
                                            Las situaciones que puedan exponer a la organizaci??n a la violaci??n de las leyes y normas legales no ser??n toleradas.
                                        </p>
                                        <br>
                                        <b>Responsabilidades:</b><br>
                                        <p align="justify" style="font-size:14px;">        
                                            El equipo directivo es el responsable de asegurar que la seguridad de la informaci??n se gestiona adecuadamente en toda la organizaci??n.<br>
                                            Cada gerente es responsable de garantizar que las personas que trabajan bajo su control protegen la informaci??n de acuerdo con las normas establecidas por la organizaci??n.<br>
                                            El responsable de seguridad asesora al equipo directivo, proporciona apoyo especializado al personal de la organizaci??n y garantiza que los informes sobre la situaci??n de la seguridad de la informaci??n est??n disponibles.<br>
                                            Cada miembro del personal tiene la responsabilidad de mantener la seguridad de informaci??n dentro de las actividades relacionadas con su trabajo.
                                        </p>
                                        <br>
                                        <b>Indicadores clave:</b><br>
                                        <p align="justify" style="font-size:14px;">
                                            Los incidentes en seguridad de la informaci??n no se traducir??n en costes graves e inesperados, o en una grave perturbaci??n de los servicios y actividades comerciales.<br>
                                            Las p??rdidas por fraude ser??n detectadas y permanecer??n dentro de unos niveles aceptables.<br>
                                            La aceptaci??n del cliente de los productos o servicios no se ver?? afectada negativamente por aspectos relacionados con la seguridad de la informaci??n.

                                        </p>
                                        <br> 
                                        <b>Pol??ticas relacionadas:</b><br> 
                                        <p align="justify" style="font-size:14px;">
                                            A continuaci??n, se detallan aquellas pol??ticas que proporcionan principios y gu??a en aspectos espec??ficos de la seguridad de la informaci??n:<br><br>
                                            Pol??tica del Sistema de Gesti??n de Seguridad de la Informaci??n (SGSI).
                                            Pol??tica de control de acceso f??sico.<br>
                                            Pol??tica de limpieza del puesto de trabajo.<br>
                                            Pol??tica de software no autorizado.<br>
                                            Pol??tica de descarga de ficheros (red externa/interna).<br>
                                            Pol??tica de copias de seguridad.<br>
                                            Pol??tica de intercambio de informaci??n con otras organizaciones.<br>
                                            Pol??tica de uso de los servicios de mensajer??a.<br>
                                            Pol??tica de retenci??n de registros.<br>
                                            Pol??tica sobre el uso de los servicios de red.<br>
                                            Pol??tica de uso de inform??tica y comunicaciones en movilidad.<br>
                                            Pol??tica de teletrabajo.<br>
                                            Pol??tica sobre el uso de controles criptogr??ficos.<br>
                                            Pol??tica de cumplimiento de disposiciones legales.<br>
                                            Pol??tica de uso de licencias de software.<br>
                                            Pol??tica de protecci??n de datos y privacidad.<br>
                                            En un nivel inferior, la pol??tica de seguridad de la informaci??n debe ser apoyada por otras normas o procedimientos sobre temas espec??ficos que obligan a??n m??s la aplicaci??n de los controles de seguridad de la informaci??n y se estructuran normalmente para tratar las necesidades de determinados grupos dentro de una organizaci??n o para cubrir ciertos temas.<br><br>
                                            <b>Ejemplo de estos temas de polit??ca incluyen:</b><br>
                                            Control de acceso.<br>
                                            Clasificaci??n de la informaci??n.<br>
                                            La seguridad f??sica y ambiental.<br><br>
                                            <b>Y m??s directamente dirigidas a usuarios:</b><br>
                                            El uso aceptable de los activos.<br>
                                            Escritorio limpio y claro de la pantalla.<br>
                                            La transferencia de informaci??n.<br>
                                            Los dispositivos m??viles y el teletrabajo.<br>
                                            Las restricciones a la instalaci??n de software y el uso.<br>
                                            Copia de seguridad.<br>
                                            La transferencia de informaci??n.<br>
                                            La protecci??n contra el malware.<br>
                                            La gesti??n de vulnerabilidades t??cnicas.<br>
                                            Controles criptogr??ficos.<br>
                                            Las comunicaciones de seguridad.<br>
                                            La intimidad y la protecci??n de la informaci??n personal identificable.<br><br>

                                            Estas pol??ticas/normas/procedimientos deben ser comunicadas a los empleados y partes externas interesadas. La necesidad de normas internas de seguridad de la informaci??n var??a dependiendo de las organizaciones.<br>
                                            Cuando algunas de las normas o pol??ticas de seguridad de la informaci??n se distribuyen fuera de la organizaci??n, se deber?? tener cuidado de no revelar informaci??n confidencial. Algunas organizaciones utilizan otros t??rminos para estos documentos de pol??tica, como: normas, directrices o reglas.
                                            Todas estas pol??ticas deben servir de apoyo para la identificaci??n de riesgos mediante la disposici??n de controles en relaci??n a un punto de referencia que pueda ser utilizado para identificar las deficiencias en el dise??o e implementaci??n de los sistemas, y el tratamiento de los riesgos mediante la posible identificaci??n de tratamientos adecuados para las vulnerabilidades y amenazas localizadas.
                                            Esta identificaci??n y tratamiento de los riesgos forman parte de los procesos definidos en la secci??n de Principios dentro de la pol??tica de seguridad o, como se referencia en el ejemplo, suelen formar parte de la propia pol??tica del SGSI, tal y como se observa a continuaci??n.
                                            <br><br>POL??TICA DE SGSI<br>
                                            En vista de la importancia para el correcto desarrollo de los procesos de negocio, los sistemas de informaci??n deben estar protegidos adecuadamente.
                                            Una protecci??n fiable permite a la organizaci??n percibir mejor sus intereses y llevar a cabo eficientemente sus obligaciones en seguridad de la informaci??n. La inadecuada protecci??n afecta al rendimiento general de una empresa y puede afectar negativamente a la imagen, reputaci??n y confianza de los clientes, pero, tambi??n, de los inversores que depositan su confianza, para el crecimiento estrat??gico de nuestras actividades a nivel internacional.
                                            El objetivo de la seguridad de la informaci??n es asegurar la continuidad del negocio en la organizaci??n y reducir al m??nimo el riesgo de da??o mediante la prevenci??n de incidentes de seguridad, as?? como reducir su impacto potencial cuando sea inevitable.
                                            Para lograr este objetivo, la organizaci??n ha desarrollado una metodolog??a de gesti??n del riesgo que permite analizar regularmente el grado de exposici??n de nuestros activos importantes frente a aquellas amenazas que puedan aprovechar ciertas vulnerabilidades e introduzcan impactos adversos a las actividades de nuestro personal o a los procesos importantes de nuestra organizaci??n.
                                            El ??xito en el uso de esta metodolog??a parte de la propia experiencia y aportaci??n de todos los empleados en materia de seguridad, y mediante la comunicaci??n de cualquier consideraci??n relevante a sus responsables directos en las reuniones semestrales establecidas por parte de la direcci??n, con el objeto de localizar posibles cambios en los niveles de protecci??n y evaluar las opciones m??s eficaces en coste/beneficio de gesti??n del riesgo en cada momento, y seg??n el caso.
                                            Los principios presentados en la pol??tica de seguridad que acompa??a a esta pol??tica fueron desarrollados por el grupo de gesti??n de la informaci??n de seguridad con el fin de garantizar que las futuras decisiones se basen en preservar la confidencialidad, integridad y disponibilidad de la informaci??n relevante de la organizaci??n. La organizaci??n cuenta con la colaboraci??n de todos los empleados en la aplicaci??n de las pol??ticas y directivas de seguridad propuestas.
                                            El uso diario de los ordenadores por el personal determina el cumplimiento de las exigencias de estos principios y un proceso de inspecci??n para confirmar que se respetan y cumplen por parte de toda la organizaci??n. Adicionalmente a esta pol??tica, y a la pol??tica de seguridad de la organizaci??n, se disponen de pol??ticas espec??ficas para las diferentes actividades.
                                            Todas las pol??ticas de seguridad vigentes permanecer??n disponibles en la intranet de la organizaci??n y se actualizar??n regularmente. El acceso es directo desde todas las estaciones de trabajo conectadas a la red de la organizaci??n y mediante un clic de rat??n desde la p??gina Web principal en el apartado Seguridad de la Informaci??n. El objetivo de la pol??tica es proteger los activos de informaci??n de la organizaci??n en contra de todas las amenazas y vulnerabilidades internas y externas, tanto si se producen de manera deliberada como accidental.
                                            LA DIRECCI??N EJECUTIVA DE LA EMPRESA ES LA RESPONSABLE DE APROBAR UNA POL??TICA DE SEGURIDAD DE LA INFORMACI??N QUE ASEGURE QUE:
                                            La informaci??n estar?? protegida contra cualquier acceso no autorizado.
                                            La confidencialidad de la informaci??n, especialmente aquella relacionada con los datos de car??cter personal de los empleados y clientes.
                                            La integridad de la informaci??n se mantendr?? en relaci??n a la clasificaci??n de la informaci??n (especialmente la de ???uso interno???).
                                            La disponibilidad de la informaci??n cumple con los tiempos relevantes para el desarrollo de los procesos cr??ticos de negocio.
                                            Se cumplen con los requisitos de las legislaciones y reglamentaciones vigentes, especialmente con la Ley de Protecci??n de Datos y de Firma Electr??nica.
                                            Los planes de continuidad de negocio ser??n mantenidos, probados y actualizados al menos con car??cter anual.
                                            La capacitaci??n en materia de seguridad se cumple y se actualiza suficientemente para todos los empleados.
                                            Todos los eventos que tengan relaci??n con la seguridad de la informaci??n, reales como supuestos, se comunicar??n al responsable de seguridad y ser??n investigados.
                                            <br>Adicionalmente, se dispone de procedimientos de apoyo que incluyen el modo espec??fico en que se deben acometer las directrices generales indicadas en las pol??ticas y por parte de los responsables designados.
                                            El cumplimiento de esta pol??tica, as?? como de la pol??tica de seguridad de la informaci??n y de cualquier procedimiento o documentaci??n incluida dentro del repositorio de documentaci??n del SGSI, es obligatorio y ata??e a todo el personal de la organizaci??n.
                                            Las visitas y personal externo que accedan a nuestras instalaciones no est??n exentas del cumplimiento de las obligaciones indiciadas en la documentaci??n del SGSI, y el personal interno observar?? su cumplimiento.
                                            En cualquier caso, de duda, aclaraci??n o para m??s informaci??n sobre el uso de esta pol??tica y la aplicaci??n de su contenido, por favor, consulte por tel??fono o e-mail al responsable del SGSI designado formalmente en el organigrama corporativo.
                                        </p>              
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="check3" id="check3" required/>
                            <label class="form-check-label" for="exampleCheck3">He le??do y acepto las pol??ticas de informaci??n</label>
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
                error_message+="<br>Por favor acepte las pol??ticas de privacidad";
            }
            if(!isChecked3){
                error_message+="<br>Por favor acepte las pol??ticas de la informacion";
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