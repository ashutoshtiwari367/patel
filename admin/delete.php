<?php require_once __DIR__.'/../config/auth.php'; require_once __DIR__.'/../config/db.php';
$id=(int)($_GET['id']??0);if($id>0){$s=$db->prepare('DELETE FROM enquiries WHERE id=?');$s->bind_param('i',$id);$s->execute();}header('Location: index.php');exit;
