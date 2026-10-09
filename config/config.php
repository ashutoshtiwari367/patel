<?php

// Database Configuration - Auto-detect Local vs Live (Hostinger)
$http_host = $_SERVER['HTTP_HOST'] ?? '';
$is_local_env = (
    strpos($http_host, 'localhost') !== false ||
    strpos($http_host, '127.0.0.1') !== false ||
    php_sapi_name() === 'cli'
);

if ($is_local_env) {
    // 💻 LOCAL XAMPP Credentials
    define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
    define('DB_PORT', (int)(getenv('DB_PORT') ?: 3306));
    define('DB_NAME', getenv('DB_NAME') ?: 'patel_construction');
    define('DB_USER', getenv('DB_USER') ?: 'root');
    define('DB_PASS', getenv('DB_PASS') !== false ? getenv('DB_PASS') : '');
} else {
    // 🌐 LIVE HOSTINGER Credentials
    define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
    define('DB_PORT', (int)(getenv('DB_PORT') ?: 3306));
    define('DB_NAME', getenv('DB_NAME') ?: 'u447123054_patel');
    define('DB_USER', getenv('DB_USER') ?: 'u447123054_patel');
    define('DB_PASS', getenv('DB_PASS') !== false ? getenv('DB_PASS') : 'Abhi$hek@123');
}

// Fallback credentials for auto-recovery
define('LIVE_DB_NAME', 'u447123054_patel');
define('LIVE_DB_USER', 'u447123054_patel');
define('LIVE_DB_PASS', 'Abhi$hek@123');
define('LOCAL_DB_NAME', 'patel_construction');
define('LOCAL_DB_USER', 'root');
define('LOCAL_DB_PASS', '');

// Business & Website Details
define('SITE_NAME', 'Patel Construction');
define('SITE_TAGLINE', 'Building Spaces. Creating Lifestyles.');
define('SITE_PHONE', '+91 79852 30018');
define('SITE_PHONE_RAW', '+917985230018');
define('SITE_EMAIL', 'info@patelconstruction.in');
define('ADMIN_EMAIL', 'patelarts.kanpur@gmail.com');   // Main admin - yahan enquiry email aayegi
define('INFO_EMAIL',  'info@patelconstruction.in');    // CC copy - is mailbox mein bhi copy jayegi
define('SITE_ADDRESS_KANPUR', '128/95 Y Block, Ground Floor, Near Naubasta Chauraha, Anand Nagar, Kanpur - 208011, Uttar Pradesh');
define('SITE_ADDRESS_LUCKNOW', 'Shop 14, Commercial Hub, Sector 7, Gomti Nagar Extension, Lucknow - 226010, Uttar Pradesh');

// SMTP Email Configuration (Hostinger Webmail)
define('SMTP_HOST',       getenv('SMTP_HOST')       ?: 'smtp.hostinger.com');
define('SMTP_PORT',       (int)(getenv('SMTP_PORT') ?: 465));
define('SMTP_USERNAME',   getenv('SMTP_USERNAME')   ?: 'info@patelconstruction.in');
define('SMTP_PASSWORD',   getenv('SMTP_PASSWORD')   ?: 'Abhi$hek@123');
define('SMTP_ENCRYPTION', getenv('SMTP_ENCRYPTION') ?: 'ssl');
define('SMTP_FROM_EMAIL', getenv('SMTP_FROM_EMAIL') ?: 'info@patelconstruction.in');
define('SMTP_FROM_NAME',  'Patel Construction');