<?php
include_once '../config/db.php';
include_once '../src/User.php';
include_once '../src/Authentication.php';

$database = new Database();
$db = $database->getConnection();