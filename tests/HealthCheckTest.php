<?php

declare(strict_types=1);

class HealthCheckTest
{
    public function testHealthEndpointReturnsJson(): void
    {
        $_SERVER['REQUEST_URI'] = '/health';
        ob_start();
        include __DIR__ . '/../src/index.php';
        $output = ob_get_clean();

        $data = json_decode($output, true);
        assert($data['status'] === 'healthy', 'Health status should be healthy');
        assert($data['product'] === 'Lucidity', 'Product should be Lucidity');
        echo "PASSED: Health endpoint returns correct JSON\n";
    }

    public function testRisksEndpointReturnsList(): void
    {
        $_SERVER['REQUEST_URI'] = '/risks';
        ob_start();
        include __DIR__ . '/../src/index.php';
        $output = ob_get_clean();

        $data = json_decode($output, true);
        assert(count($data) === 2, 'Should return 2 risks');
        echo "PASSED: Risks endpoint returns list\n";
    }
}

// Run tests
$test = new HealthCheckTest();
$test->testHealthEndpointReturnsJson();
$test->testRisksEndpointReturnsList();
echo "All tests passed!\n";
