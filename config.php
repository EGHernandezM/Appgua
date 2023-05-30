<?php

session_start();

$host = "localhost"; /* Host name */
$user = "heimwebpue_root"; /* User */
$password = "SHELAS10$2022"; /* Password */
$dbname = "heimwebpue_v2"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
