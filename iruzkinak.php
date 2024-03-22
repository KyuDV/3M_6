<form action="iruzkinak.php" method="post">
    izena: <input type="text" name="nombre"><br>
    Posta elektronikoa: <input type="email" name="correo"><br>
    Iruzkina: <textarea name="mensaje"></textarea><br>
    <input type="submit" value="Bidali">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $mensaje = $_POST["mensaje"];
    $pagina = $_SERVER["HTTP_REFERER"]; // Obtiene la URL de la página desde la cual se envió el formulario
    
    // Validación de datos (puedes implementar aquí tu lógica de validación)

    // Cargar el archivo XML
    $xml = simplexml_load_file("iruzkinak.xml");

    // Agregar nueva opinión
    $nueva_opinion = $xml->addChild('opinion');
    $nueva_opinion->addChild('nombre', $nombre);
    $nueva_opinion->addChild('correo', $correo);
    $nueva_opinion->addChild('mensaje', $mensaje);
    $nueva_opinion->addChild('pagina', $pagina); // Agrega la URL de la página al XML
    $nueva_opinion->addChild('fecha', date("Y-m-d H:i:s"));

    // Guardar el archivo XML actualizado
    $xml->asXML("opiniones.xml");
}
?>