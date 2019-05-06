<?php

if(!empty($_POST)){  //判斷是否有POST的值傳入

  //建立查詢帳號密碼的語法
  $sql="select count(*) from user where acc='" . $_POST['acc'] . "' && pw='".$_POST['pw']."'";
  
  //取得查詢結果的筆數
  $user=$pdo->query($sql)->fetchColumn();

  if($user){ //判斷帳號密碼是否正確
    $_SESSION['login']=true;
    $_SESSION['user']=$_POST['acc'];
    header("location:index.php?do=member"); //帳密符符合的話導向MEMEBER.PHP頁面,並帶入成功的訊息
  }else{
    echo "帳號或密碼錯誤，請重新登入";
  }
}

?>

  <?php 
if(empty($_SESSION['login'])){ //判斷是否有狀態值或GET值
?>
<form action="index.php?do=login" method="post">
<table class="login">
  <tr>
    <td>帳號:(mack)</td>
    <td><input type="text" name="acc" value=""></td>
  </tr>
  <tr>
    <td>密碼:(1234)</td>
    <td><input type="password" name="pw" value=""></td>
  </tr>
  <tr>
    <td><input type="submit" value="確認"></td>
    <td><input type="reset" value="清除"></td>
  </tr>
</table>
</form>
<?php 
}else{
  echo "你已登入過<br>";
  echo "<a href='index.php?do=member'>回到會員中心</a>";
}
?>
