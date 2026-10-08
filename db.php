<?php
// InfinityFree Live Cloud Database Credentials
$host = 'sqlXXX.infinityfree.com'; // <-- Replace sqlXXX with your exact MySQL Hostname (e.g., sql105.infinityfree.com)
$user = 'if0_43120343';            
$pass = 'CEf8JKMIadU';             
$dbname = 'if0_43120343_lab_db';   

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>