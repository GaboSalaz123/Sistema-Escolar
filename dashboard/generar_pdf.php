<?php
// Incluir la biblioteca Dompdf
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// Crear una instancia de Dompdf
$dompdf = new Dompdf();

// Recuperar el ID de la boleta desde la solicitud GET
$boletaId = isset($_GET['id']) ? $_GET['id'] : null;

if ($boletaId) {
    // Aquí deberías recuperar los datos de la boleta desde la base de datos
    // y construir el contenido del PDF con esos datos
    $contenidoPdf = '<html><head><style>';
    // Aquí puedes incluir los estilos CSS necesarios para el PDF
    $contenidoPdf .= '</style></head><body>';
    // Aquí puedes incluir el contenido de la boleta en formato HTML
    // Recuerda adaptarlo según la estructura que deseas en el PDF
    $contenidoPdf .= '<h1>Boleta de Estudiante</h1>';
    $contenidoPdf .= '<p>Contenido de la boleta aquí...</p>';
    $contenidoPdf .= '</body></html>';

    // Cargar el contenido HTML en Dompdf
    $dompdf->loadHtml($contenidoPdf);

    // Renderizar el PDF
    $dompdf->render();

    // Enviar el PDF al navegador
    $dompdf->stream('boleta.pdf', array('Attachment' => true));
} else {
    // Si no se proporciona un ID de boleta válido, devolver un error
    http_response_code(400);
    echo json_encode(array('error' => 'ID de boleta no proporcionado'));
}
?>
