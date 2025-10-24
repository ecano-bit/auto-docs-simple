<?php
// Script para generar documentación automática desde el código

echo "📚 Generando documentación desde código fuente...\n";

// Leer el archivo API
$apiContent = file_get_contents('api/index.php');

// Extraer endpoints del código
preg_match_all("/case '([^']+)':/", $apiContent, $matches);
$endpoints = $matches[1];

// Extraer descripciones
preg_match_all("/'description' => '([^']+)'/", $apiContent, $descriptions);
$endpointDescriptions = $descriptions[1];

// Generar HTML dinámico
$html = '<!DOCTYPE html>
<html>
<head>
    <title>Documentación API - Bit Technologies</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f8f9fa; }
        .container { max-width: 1000px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { text-align: center; margin-bottom: 30px; }
        .endpoint { background: #f8f9fa; padding: 20px; margin: 15px 0; border-radius: 8px; border-left: 4px solid #28a745; }
        .method { background: #28a745; color: white; padding: 4px 12px; border-radius: 4px; font-weight: bold; }
        .auto-generated { background: #d4edda; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .timestamp { color: #666; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📚 API Documentation</h1>
            <p class="timestamp"><strong>Generada automáticamente:</strong> ' . date('Y-m-d H:i:s') . '</p>
        </div>
        
        <div class="auto-generated">
            <strong>✅ Documentación Generada Automáticamente</strong><br>
            Esta documentación se extrajo directamente del código fuente y se actualiza en cada merge a main.
        </div>';

// Agregar endpoints encontrados
foreach ($endpoints as $index => $endpoint) {
    $description = isset($endpointDescriptions[$index]) ? $endpointDescriptions[$index] : 'Endpoint de la API';
    
    $html .= '
        <div class="endpoint">
            <h3><span class="method">GET</span> /api/?route=' . $endpoint . '</h3>
            <p>' . $description . '</p>
            <strong>Ejemplo de uso:</strong>
            <pre>curl "https://api.bit-technologies.com/?route=' . $endpoint . '"</pre>
        </div>';
}

$html .= '
        <hr>
        <div style="text-align: center; color: #666; margin-top: 30px;">
            <p><strong>Endpoints encontrados:</strong> ' . count($endpoints) . '</p>
            <p><em>Esta documentación se actualiza automáticamente cada vez que se hace merge a main.</em></p>
            <p><strong>Equipo Bit Technologies:</strong> Emmanuel, Josué, Jonathan, Edgar, Edin</p>
        </div>
    </div>
</body>
</html>';

// Crear directorio y guardar
if (!is_dir('docs-output')) {
    mkdir('docs-output', 0755, true);
}

file_put_contents('docs-output/index.html', $html);

echo "✅ Documentación generada con " . count($endpoints) . " endpoints\n";
echo "📁 Archivo creado: docs-output/index.html\n";
?>