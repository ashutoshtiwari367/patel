<?php
require_once __DIR__ . '/config.php';

mysqli_report(MYSQLI_REPORT_OFF);

$port = defined('DB_PORT') ? (int)DB_PORT : 3306;

// 1. Try detected environment credentials
$db = @new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, $port);
if ($db->connect_error) {
    $db = @new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
}

// 2. If first attempt fails, auto-fallback to alternate environment (Local <-> Live)
if ($db->connect_error) {
    if (DB_USER === 'root') {
        // Local failed -> Try Live credentials
        $db = @new mysqli('localhost', LIVE_DB_USER, LIVE_DB_PASS, LIVE_DB_NAME, $port);
        if ($db->connect_error) {
            $db = @new mysqli('localhost', LIVE_DB_USER, LIVE_DB_PASS, LIVE_DB_NAME);
        }
    } else {
        // Live failed -> Try Local credentials
        $db = @new mysqli('localhost', LOCAL_DB_USER, LOCAL_DB_PASS, LOCAL_DB_NAME, $port);
        if ($db->connect_error) {
            $db = @new mysqli('localhost', LOCAL_DB_USER, LOCAL_DB_PASS, LOCAL_DB_NAME);
        }
    }
}

if ($db->connect_error) {
    http_response_code(500);
    error_log("Database connection error: " . $db->connect_error);
    die('<div style="font-family:sans-serif;padding:30px;background:#fff1f0;border:1px solid #ffa39e;border-radius:8px;max-width:600px;margin:40px auto;color:#cf1322">
        <h3 style="margin-top:0">Database Connection Failed</h3>
        <p>Could not connect to MySQL database on <strong>' . htmlspecialchars(DB_HOST) . '</strong>.</p>
        <p><small>Error: ' . htmlspecialchars($db->connect_error) . '</small></p>
        <p>Please ensure MySQL is running in XAMPP (Local) or database user permissions are granted in Hostinger cPanel (Live).</p>
    </div>');
}

$db->set_charset('utf8mb4');
