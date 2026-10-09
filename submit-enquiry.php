<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/includes/captcha.php';

$is_ajax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
           || (isset($_POST['ajax']) && $_POST['ajax'] === '1')
           || (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false);

function respond($success, $message, $is_ajax) {
    if ($is_ajax) {
        header('Content-Type: application/json');
        echo json_encode(['success' => $success, 'message' => $message]);
        exit;
    }
    if ($success) {
        header('Location: thank-you');
        exit;
    } else {
        $_SESSION['form_error'] = $message;
        $referer = $_SERVER['HTTP_REFERER'] ?? 'contact';
        header('Location: ' . $referer);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index');
    exit;
}

// 1. Verify CSRF Token
$csrf_post = $_POST['csrf_token'] ?? '';
$csrf_session = $_SESSION['csrf_token'] ?? '';
if (empty($csrf_post) || !hash_equals($csrf_session, $csrf_post)) {
    respond(false, 'Invalid security session. Please refresh the page and try again.', $is_ajax);
}

// 2. Extract and Sanitize Form Inputs
$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '');
$city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$service = trim(filter_input(INPUT_POST, 'service', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$captcha_answer = $_POST['captcha_answer'] ?? null;

// Combine service with city for clear admin view
$full_service = $service;
if (!empty($city)) {
    $full_service = !empty($service) ? "{$service} [{$city}]" : "General Enquiry [{$city}]";
}

// 3. Validation
if (empty($name)) {
    respond(false, 'Please enter your full name.', $is_ajax);
}
if (empty($phone) || strlen(preg_replace('/[^0-9]/', '', $phone)) < 10) {
    respond(false, 'Please enter a valid 10-digit phone number.', $is_ajax);
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(false, 'Please enter a valid email address.', $is_ajax);
}
if (empty($message)) {
    respond(false, 'Please provide details about your project or query.', $is_ajax);
}

// 4. Verify CAPTCHA
if ($captcha_answer === null || !verify_captcha($captcha_answer)) {
    respond(false, 'Incorrect security captcha answer. Please try again.', $is_ajax);
}

// 5. Insert Record into Database
$ip = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
$stmt = $db->prepare('INSERT INTO enquiries (name, phone, email, service, message, status, ip_address, created_at) VALUES (?, ?, ?, ?, ?, "new", ?, NOW())');

if (!$stmt) {
    error_log('Database prepare failed: ' . $db->error);
    respond(false, 'An unexpected server error occurred. Please call us directly.', $is_ajax);
}

$stmt->bind_param('ssssss', $name, $phone, $email, $full_service, $message, $ip);
$executed = $stmt->execute();

if (!$executed) {
    error_log('Database execute failed: ' . $stmt->error);
    respond(false, 'Failed to save your enquiry. Please try again or call us directly.', $is_ajax);
}
$stmt->close();

// 6. Optional Email Notification via PHPMailer
$autoload = __DIR__ . '/vendor/autoload.php';
if (!file_exists($autoload)) $autoload = __DIR__ . '/PHPMailer/vendor/autoload.php';
if (file_exists($autoload)) {
    require_once $autoload;
} else {
    foreach ([__DIR__.'/PHPMailer/src/Exception.php', __DIR__.'/PHPMailer/src/PHPMailer.php', __DIR__.'/PHPMailer/src/SMTP.php'] as $file) {
        if (file_exists($file)) require_once $file;
    }
}

if (class_exists('PHPMailer\PHPMailer\PHPMailer')) {
    // --- 1. ADMIN ENQUIRY ALERT EMAIL ---
    try {
        $adminMail = new PHPMailer\PHPMailer\PHPMailer(true);
        $adminMail->isSMTP();
        $adminMail->Host       = SMTP_HOST;
        $adminMail->SMTPAuth   = true;
        $adminMail->Username   = SMTP_USERNAME;
        $adminMail->Password   = SMTP_PASSWORD;
        $adminMail->SMTPSecure = SMTP_ENCRYPTION;
        $adminMail->Port       = SMTP_PORT;
        $adminMail->Timeout    = 10;
        $adminMail->CharSet    = 'UTF-8';

        $adminMail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
        $adminMail->addAddress(ADMIN_EMAIL, 'Patel Arts Admin');
        if (defined('INFO_EMAIL') && !empty(INFO_EMAIL) && INFO_EMAIL !== ADMIN_EMAIL) {
            $adminMail->addCC(INFO_EMAIL, 'Patel Construction Info');
        }
        $adminMail->addReplyTo($email, $name);

        $adminMail->isHTML(true);
        $adminMail->Subject = 'New Enquiry: ' . $name . ' | ' . ($city ?: 'Kanpur') . ' | ' . date('d M Y');
        $adminMail->Body =
            '<div style="font-family:Arial,sans-serif;max-width:600px;margin:auto;border:1px solid #e0e0e0;border-radius:8px;overflow:hidden;">'
          . '<div style="background:#1a237e;padding:20px;text-align:center;color:#fff;">'
          . '<h2 style="margin:0;font-size:20px;">New Website Enquiry</h2>'
          . '<p style="margin:5px 0 0;color:#bbdefb;font-size:13px;">Patel Construction | ' . date('d M Y, h:i A') . '</p>'
          . '</div>'
          . '<div style="padding:20px;background:#fff;">'
          . '<table style="width:100%;border-collapse:collapse;font-size:14px;">'
          . '<tr><td style="padding:8px 12px;background:#f5f7fa;font-weight:bold;width:32%;">Name:</td><td style="padding:8px 12px;">' . htmlspecialchars($name) . '</td></tr>'
          . '<tr><td style="padding:8px 12px;background:#f5f7fa;font-weight:bold;">Phone:</td><td style="padding:8px 12px;"><a href="tel:' . htmlspecialchars($phone) . '" style="color:#1a237e;font-weight:bold;">' . htmlspecialchars($phone) . '</a></td></tr>'
          . '<tr><td style="padding:8px 12px;background:#f5f7fa;font-weight:bold;">Email:</td><td style="padding:8px 12px;"><a href="mailto:' . htmlspecialchars($email) . '" style="color:#1a237e;">' . htmlspecialchars($email) . '</a></td></tr>'
          . '<tr><td style="padding:8px 12px;background:#f5f7fa;font-weight:bold;">City:</td><td style="padding:8px 12px;">' . htmlspecialchars($city ?: 'Not specified') . '</td></tr>'
          . '<tr><td style="padding:8px 12px;background:#f5f7fa;font-weight:bold;">Service:</td><td style="padding:8px 12px;">' . htmlspecialchars($service ?: 'General Enquiry') . '</td></tr>'
          . '<tr><td style="padding:8px 12px;background:#f5f7fa;font-weight:bold;">Message:</td><td style="padding:8px 12px;">' . nl2br(htmlspecialchars($message)) . '</td></tr>'
          . '<tr><td style="padding:8px 12px;background:#f5f7fa;font-weight:bold;">IP Address:</td><td style="padding:8px 12px;color:#888;">' . htmlspecialchars($ip) . '</td></tr>'
          . '</table>'
          . '<div style="margin-top:18px;padding:12px;background:#e8f5e9;border-left:4px solid #4caf50;border-radius:4px;">'
          . '<strong style="color:#2e7d32;">Follow Up:</strong> Please connect with the customer within 24 hours.'
          . '</div>'
          . '</div>'
          . '<div style="background:#f4f4f4;padding:10px;text-align:center;font-size:12px;color:#888;">'
          . 'Sent to ' . ADMIN_EMAIL . ' (Copy: ' . (defined('INFO_EMAIL') ? INFO_EMAIL : '') . ')'
          . '</div>'
          . '</div>';
        $adminMail->AltBody = "New Enquiry\nName: $name\nPhone: $phone\nEmail: $email\nCity: $city\nService: $service\nMessage:\n$message\nTime: " . date('d M Y, h:i A');
        $adminMail->send();
    } catch (Throwable $e) {
        error_log('Admin mail error: ' . $e->getMessage());
    }

    // --- 2. CUSTOMER CONFIRMATION EMAIL ---
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            $custMail = new PHPMailer\PHPMailer\PHPMailer(true);
            $custMail->isSMTP();
            $custMail->Host       = SMTP_HOST;
            $custMail->SMTPAuth   = true;
            $custMail->Username   = SMTP_USERNAME;
            $custMail->Password   = SMTP_PASSWORD;
            $custMail->SMTPSecure = SMTP_ENCRYPTION;
            $custMail->Port       = SMTP_PORT;
            $custMail->Timeout    = 10;
            $custMail->CharSet    = 'UTF-8';

            $custMail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
            $custMail->addAddress($email, $name);
            $custMail->addReplyTo(SMTP_FROM_EMAIL, SMTP_FROM_NAME);

            $custMail->isHTML(true);
            $custMail->Subject = 'Thank You for Contacting Patel Construction - Enquiry Received';
            $custMail->Body =
                '<div style="font-family:Arial,sans-serif;max-width:600px;margin:auto;border:1px solid #e0e0e0;border-radius:8px;overflow:hidden;">'
              . '<div style="background:#1a237e;padding:24px;text-align:center;color:#fff;">'
              . '<h2 style="margin:0;font-size:22px;">Thank You, ' . htmlspecialchars($name) . '!</h2>'
              . '<p style="margin:6px 0 0;color:#bbdefb;font-size:14px;">We have received your enquiry.</p>'
              . '</div>'
              . '<div style="padding:24px;background:#fff;line-height:1.7;color:#333;">'
              . '<p style="margin-top:0;">Dear <strong>' . htmlspecialchars($name) . '</strong>,</p>'
              . '<p>Thank you for reaching out to <strong>Patel Construction</strong>. Our team has received your enquiry and will contact you within <strong>24 hours</strong>.</p>'
              . '<div style="background:#f0f4ff;border-left:4px solid #1a237e;padding:14px 18px;border-radius:4px;margin:18px 0;">'
              . '<p style="margin:0 0 8px;font-weight:bold;color:#1a237e;">Your Enquiry Details:</p>'
              . '<p style="margin:4px 0;font-size:13px;color:#555;"><strong>Service:</strong> ' . htmlspecialchars($service ?: 'General Enquiry') . '</p>'
              . (!empty($city) ? '<p style="margin:4px 0;font-size:13px;color:#555;"><strong>City:</strong> ' . htmlspecialchars($city) . '</p>' : '')
              . '<p style="margin:4px 0;font-size:13px;color:#555;"><strong>Message:</strong> ' . nl2br(htmlspecialchars($message)) . '</p>'
              . '</div>'
              . '<p>If you have any immediate questions, feel free to call us directly:</p>'
              . '<p style="font-size:17px;font-weight:bold;color:#1a237e;margin:6px 0;">📞 +91 79852 30018</p>'
              . '<p style="margin:4px 0;color:#666;font-size:13px;">📧 info@patelconstruction.in &nbsp;|&nbsp; 📍 Kanpur / Lucknow</p>'
              . '</div>'
              . '<div style="background:#f4f4f4;padding:12px;text-align:center;font-size:12px;color:#999;">'
              . '© ' . date('Y') . ' Patel Construction. All rights reserved.'
              . '</div>'
              . '</div>';
            $custMail->AltBody = "Dear $name,\n\nThank you for reaching out to Patel Construction. We have received your enquiry and will contact you within 24 hours.\n\nService: " . ($service ?: 'General Enquiry') . "\nPhone: +91 79852 30018\nEmail: info@patelconstruction.in\n\nBest Regards,\nPatel Construction Team";
            $custMail->send();
        } catch (Throwable $e) {
            error_log('Customer mail error: ' . $e->getMessage());
        }
    }
}

// Reset Captcha session after successful submission
unset($_SESSION['captcha_a'], $_SESSION['captcha_b'], $_SESSION['captcha_expected']);
generate_captcha();

// Respond Success
respond(true, 'Your enquiry has been received successfully! Our engineer will call you shortly.', $is_ajax);
