<?php

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

  <form action="index.php?do=reg" method="post">
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
