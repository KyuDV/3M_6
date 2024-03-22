<?php
// Obtener la URL de la página actual
$pagina_actual = $_SERVER["REQUEST_URI"];

// Cargar el archivo XML
$xml = simplexml_load_file("iruzkinak.xml");

// Mostrar las opiniones
foreach ($xml->opinion as $opinion) {
    // Verificar si la página de origen coincide con la página actual
    if ($opinion->pagina == $pagina_actual) {
        echo "<div>";
        echo "<p><strong>Nombre:</strong> " . $opinion->nombre . "</p>";
        echo "<p><strong>Correo:</strong> " . $opinion->correo . "</p>";
        echo "<p><strong>Mensaje:</strong> " . $opinion->mensaje . "</p>";
        echo "<p><strong>Fecha:</strong> " . $opinion->fecha . "</p>";
        echo "</div>";
    }
}
?>