<?php
  
//判斷是否為登入成功的狀態
  if(empty($_SESSION['login'])){
    header("location:index.php");
    exit();
  }
?>

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