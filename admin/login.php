<?php
session_start();
if (!empty($_SESSION['admin_id'])) { header('Location: index.php'); exit; }
require_once __DIR__ . '/../config/db.php';
$error='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
 $email=trim($_POST['email']??''); $password=$_POST['password']??'';
 $stmt=$db->prepare('SELECT id,name,email,password_hash FROM admins WHERE email=? LIMIT 1'); $stmt->bind_param('s',$email); $stmt->execute(); $admin=$stmt->get_result()->fetch_assoc();
 if($admin && password_verify($password,$admin['password_hash'])){session_regenerate_id(true);$_SESSION['admin_id']=$admin['id'];$_SESSION['admin_name']=$admin['name'];header('Location: index.php');exit;}
 $error='Invalid email or password.';
}
?><!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Admin Login | Patel Construction</title><link rel="stylesheet" href="admin.css"></head><body class="login-page"><form class="login-card" method="post"><div class="logo">PC</div><h1>Patel Construction</h1><p>Admin Dashboard</p><?php if($error):?><div class="error"><?=htmlspecialchars($error)?></div><?php endif;?><input type="email" name="email" placeholder="Admin email" required><input type="password" name="password" placeholder="Password" required><button>Sign In →</button><small>Default: admin@patelconstruction.local / Admin@12345<br>Change this immediately for production.</small></form></body></html>
