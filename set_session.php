<?php
session_start();

$_SESSION['name'] = 'Kathy Smith';
$_SESSION['user_id'] = 3;

echo '<h1>Session Set</h1>';
