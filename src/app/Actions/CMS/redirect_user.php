<?php

require_once __DIR__ . '/../../../vendor/autoload.php';


use App\Models\AUTH\Authentication;

session_start();

if(isset($_GET['cuser']) && !empty($_GET['cuser'])) {
	$_SESSION['uname'] = $_GET['cuser'];
	header('Location: ../../../../cms/news');
	exit();
}