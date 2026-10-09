<?php
require_once __DIR__ . '/includes/captcha.php';

header('Content-Type: application/json');
$captcha = generate_captcha();

echo json_encode([
    'success' => true,
    'question' => $captcha['question'],
    'csrf_token' => $captcha['csrf_token']
]);
exit;
