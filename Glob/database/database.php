<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
date_default_timezone_set('Africa/Nairobi');
$conn = new mysqli($server, $username, $password, $db);




 


?>
