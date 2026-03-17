<?php
header('Content-Type: application/json');

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/health') {
    echo json_encode(['status' => 'healthy', 'product' => 'Lucidity', 'version' => '1.0.0']);
} elseif ($path === '/risks') {
    echo json_encode([
        ['id' => 1, 'title' => 'Data breach risk assessment', 'likelihood' => 'Medium', 'impact' => 'High'],
        ['id' => 2, 'title' => 'Vendor compliance gap', 'likelihood' => 'High', 'impact' => 'Medium'],
    ]);
} elseif ($path === '/controls') {
    echo json_encode([
        ['id' => 1, 'name' => 'Access control policy', 'status' => 'Active', 'effectiveness' => '85%'],
        ['id' => 2, 'name' => 'Encryption at rest', 'status' => 'Active', 'effectiveness' => '95%'],
    ]);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Not found']);
}
