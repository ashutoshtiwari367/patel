<?php require_once __DIR__.'/../config/auth.php'; require_once __DIR__.'/../config/db.php';
$id=(int)($_POST['id']??0);$status=$_POST['status']??'new';$allowed=['new','contacted','in_progress','closed'];if($id>0&&in_array($status,$allowed,true)){$s=$db->prepare('UPDATE enquiries SET status=? WHERE id=?');$s->bind_param('si',$status,$id);$s->execute();}header('Location: index.php');exit;
