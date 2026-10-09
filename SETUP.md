# Patel Construction - PHP Upgrade

## 1. Database
Create/import `database.sql` in phpMyAdmin. The project expects MySQL on port `3307`.

## 2. Config
Edit `config/config.php` with database and SMTP credentials.

## 3. PHPMailer
Recommended:
`composer install`

Or manually download PHPMailer and place it in `/PHPMailer`, keeping `/PHPMailer/src/` available. The code supports both Composer and manual loading.

## 4. Website
Open `http://localhost/patel-construction/` after putting this folder in `C:\xampp\htdocs\patel-construction\`.

## 5. Admin
Open `/admin/login.php`.
Default development login:
- Email: `admin@patelconstruction.local`
- Password: `Admin@12345`

CHANGE THIS PASSWORD before production.

## 6. CAPTCHA
This version uses a server-side math CAPTCHA, so no third-party key is required. For stronger anti-bot protection, replace it with Google reCAPTCHA/hCaptcha after the production domain is ready.

## 7. Email
Set SMTP_HOST, SMTP_PORT, SMTP_USERNAME, SMTP_PASSWORD and ADMIN_EMAIL in `config/config.php`. Do not commit SMTP passwords to public Git repositories.
