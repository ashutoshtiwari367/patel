<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Generate a fresh mathematical CAPTCHA challenge
 */
function generate_captcha() {
    $a = random_int(3, 12);
    $b = random_int(1, 9);
    $op = (random_int(0, 1) === 1 && $a > $b) ? '-' : '+';
    
    $expected = ($op === '+') ? ($a + $b) : ($a - $b);
    
    $_SESSION['captcha_a'] = $a;
    $_SESSION['captcha_b'] = $b;
    $_SESSION['captcha_op'] = $op;
    $_SESSION['captcha_expected'] = $expected;
    
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    
    return [
        'question' => "{$a} {$op} {$b} = ?",
        'csrf_token' => $_SESSION['csrf_token']
    ];
}

/**
 * Verify user submitted CAPTCHA
 */
function verify_captcha($user_answer) {
    if (!isset($_SESSION['captcha_expected'])) {
        return false;
    }
    $expected = (int)$_SESSION['captcha_expected'];
    return (int)$user_answer === $expected;
}

/**
 * Helper to ensure captcha exists in session
 */
if (!isset($_SESSION['captcha_expected'])) {
    generate_captcha();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
