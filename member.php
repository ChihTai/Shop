<?php
  include_once "base.php";
  
//判斷是否為登入成功的狀態
  if(empty($_SESSION['login'])){
    header("location:index.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>會員中心</title>
</head>
<body>

 登入成功<br>
 <?php
  $sql="select name from user where acc='". $_SESSION['user'] ."'";
  $name=$pdo->query($sql)->fetchColumn();
  echo "歡迎 ".$name." 光臨會員中心";
 ?>


<!----帶入登入狀態值---->
 <a href="index.php">回到首頁</a><br>
 <a href="logout.php">登出</a>

</body>
</html>