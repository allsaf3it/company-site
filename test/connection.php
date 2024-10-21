<?php 

$username = "begroupcom_admin";
$password = "Egybet00@@@";

$database = new 
PDO("mysql:host=https://www.webdental.online; dbname=webdental; charset=utf8;" ,$username,$password);

if($database){
   echo 'تم اتصال بقاعدة بيانات'; 
}
?>