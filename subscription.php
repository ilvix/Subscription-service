<?php
if(isset($_POST['email'])){
require_once 'class/database.php';
require_once 'class/manager.php';
require_once 'class/email.php';
require_once 'class/domain.php';

$email = new email();
if(!$email->setAddress($_POST['email'])){
	// wrong email address
	// redirect
  exit;
}
$db = (new database())->connection();
$manager = new manager($db);
$manager->saveDomain($email->getDomain());
$manager->saveEmail($email->getAddress());

$db->destroy();
header('Location: index.php?success=true');
exit;
}
header('Location: index.php');
?>