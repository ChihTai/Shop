<?php
  include_once "base.php";

  if(!empty($_POST)){
    $acc=$_POST['acc'];
    $pw=$_POST['pw'];
    $name=$_POST['name'];

  
  //建立新增資料的語法
  $sql="insert into user (`acc`,`pw`,`name`) values('$acc','$pw','$name')";
  
  //送出新增語法
  $res=$pdo->query($sql);
    if($res){
      echo "新增成功";
    }else{
      echo "新增異常";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>我的店</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrap">
  <div id="header">
  <?php include_once "nav.php" ;?>
    <div id="banner"></div>
  </div>
  <?php include "sidebar.php" ;?>
  <div id="content">
  <?php
    if(!empty($_GET['do'])){
      echo $_GET['do'];
      if($_GET['do']=='reg'){
        include "reg.php";
      }
    }else{
      echo "沒事";
    }
  ?>
  <form action="?" method="post">
  <table>
    <tr>
      <td>帳號</td>
      <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
      <td>密碼</td>
      <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
      <td>本名</td>
      <td><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
      <td><input type="submit" value="新增"></td>
      <td><input type="reset" value="重置"></td>
    </tr>
  </table>
</form>

  </div>
  <?php include "footer.php" ;?>
</div>  
</body>
</html>