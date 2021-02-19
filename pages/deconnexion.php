<?php
$database = ("../functions/db.php");
require_once('../functions/db.php');
require_once('../class/user.php');
$user = new User;
$user->Disconnect();



?>