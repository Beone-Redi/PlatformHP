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
                        <h4 class="title">Políticas de la Información</h4>
                            <p class="category">Vista general de la información relacionada con políticas y uso de la información.</p>
                                <p class="category">
                                    </br>
                                    <?php if ( $_SESSION['EMPRESA'] === '1' )
                                    {?>

                                    <a href="create_company?scr=2" class="btn btn-default btn-sm" >
                                        <i class="pe-7s-plus" style="font-size:16px;"></i> Empresa
                                    </a>
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="content">
                                <p class="category">
                                    <h1>POLÍTICA DE SEGURIDAD DE LA INFORMACIÓN</h1>
                                    <br>
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
                                            Firmado Sr./Sra. xxxxxxx, Director ejecutivo.
 


                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<?php
include 'footer.php';