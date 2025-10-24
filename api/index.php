<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$route = $_GET['route'] ?? '';

switch ($route) {
    case 'students':
        echo json_encode([
            'success' => true,
            'data' => [
                ['id' => 1, 'name' => 'Juan Pérez', 'grade' => 5],
                ['id' => 2, 'name' => 'María García', 'grade' => 3]
            ],
            'endpoint' => 'GET /api/students',
            'description' => 'Obtiene lista de estudiantes'
        ]);
        break;
        
    case 'teachers':
        echo json_encode([
            'success' => true,
            'data' => [
                ['id' => 1, 'name' => 'Prof. García', 'subject' => 'Matemáticas'],
                ['id' => 2, 'name' => 'Prof. López', 'subject' => 'Historia']
            ],
            'endpoint' => 'GET /api/teachers',
            'description' => 'Obtiene lista de profesores'
        ]);
        break;
        
    default:
        echo json_encode([
            'success' => true,
            'message' => 'API Demo - Bit Technologies',
            'endpoints' => [
                'GET /api/?route=students',
                'GET /api/?route=teachers'
            ],
            'generated_at' => date('Y-m-d H:i:s')
        ]);
}