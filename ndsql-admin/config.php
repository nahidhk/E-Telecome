<?php 
date_default_timezone_set("Asia/Dhaka");
// Borwser Cache Control
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// MySQL Coon Info 
$db_name = 'ndsql_etelecome';
$db_uname = 'nahidtdx';
$db_pass = 'NAHID12345';

// DB Connection
define('DB_HOST', 'localhost'); /** MySQL hostname **/
define('DB_USER', $db_uname); /** MySQL database username **/
define('DB_NAME', $db_name); /** The name of the database  **/
define('DB_PASS', $db_pass); /** MySQL database password **/

/** Establish database connection */
try
{
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
 ?><div style="background: rgb(128 128 128 / 14%);padding: 10px;border-radius: 10px;text-align: center;max-width: 800px;width: 100%;font-weight: 700;font-family: sans-serif;margin: auto; ">  Database Connection Problem !  </div> <?php
}


// admin system 
$admin_name = "Ndsql Admin Panel";

include("function/function.php");


?>