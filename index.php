<?php
if (!empty($_GET["url"])) {
    require_once ('phpqrcode/qrlib.php'); // Asegúrate de incluir el archivo QRcode.php o la ruta correcta

    // Generar la imagen QR en memoria
    ob_start();
    QRcode::png($_GET["url"], null, QR_ECLEVEL_L, 10, 2);
    $imageData = ob_get_clean();

    // Configurar los encabezados de respuesta HTTP para una imagen PNG
    header('Content-Type: image/png');
    header('Content-Length: ' . strlen($imageData));

    // Imprimir la imagen en el navegador
    echo $imageData;
} else {
    include ('qr-presentation.html');
}



?>