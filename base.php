<?php
  //連線資料庫
  $dsn="mysql:host=localhost;charset=utf8;dbname=shop";
  $pdo=new PDO($dsn,"root","");

  session_start();

?>
