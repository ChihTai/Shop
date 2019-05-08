<?php
  include_once "base.php";

  //檢查是否有透過POST傳遞過來的值
  if(!empty($_POST)){

    //將POST過的值存入相應的變數
    $acc=$_POST['acc'];
    $pw=$_POST['pw'];
    $name=$_POST['name'];

    //建立一個錯誤訊息的字串陣列
    $errMeg=[
      1=>"欄位請勿空白",
      2=>"欄位長度請在4-12之間",
      3=>"欄位全是數字，請至少一個以上的英文字",
      4=>"欄位全是英文，請至少一個以上的數字",
      5=>"欄位請勿使用英數字以外的符號"
    ];

  /*********************檢查密碼************************************* */
    $accErr=""; //建立一個存放錯誤訊息的空字串

    //逐一檢查各項錯誤，並累加各項錯誤訊息
    if(chkSpace($acc)){
      $accErr=$accErr . $errMeg[1];
    }
    if(!chkLength($acc)){
      $accErr=$accErr . $errMeg[2];
    }
    if(chkSym($acc)){
      $accErr=$accErr . $errMeg[5];
    }


  /*********************檢查密碼************************************* */
    $pwErr="";
    if(chkSpace($pw)){
      $pwErr=$pwErr . $errMeg[1];
    }
    if(!chkLength($pw)){
      $pwErr=$pwErr . $errMeg[2];
    }
    if(chkNum($pw)){
      $pwErr=$pwErr . $errMeg[3];
    }    
    if(chkEng($pw)){
      $pwErr=$pwErr . $errMeg[4];
    }    
    if(chkSym($pw)){
      $pwErr=$pwErr . $errMeg[5];
    }    

  /*********************檢查名稱************************************* */
  $nameErr="";
  if(chkSpace($name)){
    $nameErr=$nameErr . $errMeg[1];
  }
  if(chkSym($name)){
    $nameErr=$nameErr . $errMeg[5];
  }  
  /*******檢查帳號是否已存在 */

  $sql="select acc from user where acc='$acc'";
  $chkAcc=$pdo->query($sql)->fetch();
  if($chkAcc){
    $chkAccount=true;
    echo "帳號重覆";
  }else{
    $chkAccount=false;
  }

  if($accErr=="" && $pwErr=="" && $nameErr=="" && $chkAccount==false){
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
}
?>

  <style>
    .errmeg{
      color:red;
      font-size:12px;
      font-family:"微軟正黑體";
      text-align:left;
    }
  </style>
  <form action="index.php?do=reg" method="post">
  <table>
    <tr>
      <td>帳號</td>
      <td>
        <input type="text" name="acc" id="acc">
        <p class="errmeg">
        <?php
          if(!empty($accErr)){
            echo $accErr;
          }
        ?>
        </p>

      </td>
    </tr>
    <tr>
      <td>密碼</td>
      <td><input type="password" name="pw" id="pw">
      <p class="errmeg">
        <?php
          if(!empty($pwErr)){
            echo $pwErr;
          }
        ?>
        </p>
        </td>      
    </tr>
    <tr>
      <td>本名

      </td>
      <td>
        <input type="text" name="name" id="name">
        <p class="errmeg">
          <?php
            if(!empty($nameErr)){
              echo $nameErr;
            }
          ?>
          </p>
      </td>
    </tr>
    <tr>
      <td><input type="submit" value="新增"></td>
      <td><input type="reset" value="重置"></td>
    </tr>
  </table>
</form>

