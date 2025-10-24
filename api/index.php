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
            'description' => 'Obtiene lista de estudiantes del sistema'
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
            'description' => 'Obtiene lista de profesores del sistema'
        ]);
        break;
        
    case 'courses':
        echo json_encode([
            'success' => true,
            'data' => [
                ['id' => 1, 'name' => 'Matemáticas Avanzadas', 'teacher_id' => 1],
                ['id' => 2, 'name' => 'Historia Universal', 'teacher_id' => 2],
                ['id' => 3, 'name' => 'Ciencias Naturales', 'teacher_id' => 3]
            ],
            'endpoint' => 'GET /api/courses',
            'description' => 'Obtiene lista completa de cursos disponibles en el sistema'
        ]);
        break;

    case 'grades':
        echo json_encode([
            'success' => true,
            'data' => [
                ['id' => 1, 'student_id' => 1, 'course_id' => 1, 'grade' => 95],
                ['id' => 2, 'student_id' => 2, 'course_id' => 1, 'grade' => 87],
                ['id' => 3, 'student_id' => 1, 'course_id' => 2, 'grade' => 92]
            ],
            'endpoint' => 'GET /api/grades',
            'description' => 'Obtiene calificaciones de estudiantes por curso'
        ]);
        break;
        
    case 'attendance':
        echo json_encode([
            'success' => true,
            'data' => [
                ['id' => 1, 'student_id' => 1, 'date' => '2024-10-24', 'status' => 'present'],
                ['id' => 2, 'student_id' => 2, 'date' => '2024-10-24', 'status' => 'absent'],
                ['id' => 3, 'student_id' => 3, 'date' => '2024-10-24', 'status' => 'present']
            ],
            'endpoint' => 'GET /api/attendance',
            'description' => 'Obtiene registro de asistencia diaria de estudiantes'
        ]);
        break;
        
    case 'reports':
        echo json_encode([
            'success' => true,
            'data' => [
                ['type' => 'academic', 'period' => '2024-Q1', 'total_students' => 150],
                ['type' => 'attendance', 'period' => '2024-Q1', 'average_rate' => 92.5],
                ['type' => 'grades', 'period' => '2024-Q1', 'average_grade' => 89.3]
            ],
            'endpoint' => 'GET /api/reports',
            'description' => 'Genera reportes académicos y estadísticas del sistema'
        ]);
        break;
        
    default:
        echo json_encode([
            'success' => true,
            'message' => 'API Demo - Bit Technologies',
            'endpoints' => [
                'GET /api/?route=students',
                'GET /api/?route=teachers',
                'GET /api/?route=courses',
                'GET /api/?route=grades',
                'GET /api/?route=attendance',
                'GET /api/?route=reports'
            ],
            'generated_at' => date('Y-m-d H:i:s')
        ]);
}