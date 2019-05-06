<?php
  include_once "base.php";

  if(!empty($_POST)){
    $acc=$_POST['acc'];
    $pw=$_POST['pw'];
    $name=$_POST['name'];

  //檢查資料空白
        
  if($acc=="" || $pw=="" || $name==""){

    echo "請輸入資料，不可空白";
    $chk1=false;

  }else{

    $chk1=true;
  }

  /*********************檢查帳號************************************* */
  //檢查資料長度
  if(strlen($acc) < 4 || strlen($acc) > 12 ){

    echo "帳號請在4-12碼之間";
    $chk2=false;

  }else{
   
    $chk2=true;
  
  }

  //檢查全為數字
  $chkNum=0;
  for($i=0;$i<strlen($acc);$i++){

    $str=substr($acc,$i,1);
    if(ord($str) >= 48 && ord($str) <= 57){
      $chkNum++;
    }
  }

//檢查全為英文
  $chkEng=0;
  for($i=0;$i<strlen($acc);$i++){

    $str=substr($acc,$i,1);
    if((ord($str) >= 65 && ord($str) <= 90) || (ord($str) >= 97 && ord($str) <= 122) ){
      $chkEng++;
    }
  }

  //檢查特殊符號
  $chkSym=0;
  for($i=0;$i<strlen($acc);$i++){

    $str=substr($acc,$i,1);
    if(!(ord($str) >= 65 && ord($str) <= 90) && !(ord($str) >= 97 && ord($str) <= 122) && !(ord($str) >= 48 && ord($str) <= 57) ){
      $chkSym++;
    }

  }

  //英數字與特殊符號綜合判定
  if($chkSym > 0 || $chkEng==strlen($acc) || $chkNum==strlen($acc) ){
    echo "有特殊符號，而且全英文或數字";
    $chk3=false;
  }else{
    $chk3=true;
  }

  /*********************檢查密碼************************************* */
  //檢查資料長度
  if(strlen($pw) < 4 || strlen($pw) > 12 ){

    echo "帳號請在4-12碼之間";
    $chkPw1=false;

  }else{
   
    $chkPw1=true;
  
  }

  //檢查全為數字
  $chkNum=0;
  for($i=0;$i<strlen($pw);$i++){

    $str=substr($pw,$i,1);
    if(ord($str) >= 48 && ord($str) <= 57){
      $chkNum++;
    }
  }

//檢查全為英文
  $chkEng=0;
  for($i=0;$i<strlen($pw);$i++){

    $str=substr($pw,$i,1);
    if((ord($str) >= 65 && ord($str) <= 90) || (ord($str) >= 97 && ord($str) <= 122) ){
      $chkEng++;
    }
  }

  //檢查特殊符號
  $chkSym=0;
  for($i=0;$i<strlen($pw);$i++){

    $str=substr($pw,$i,1);
    if(!(ord($str) >= 65 && ord($str) <= 90) && !(ord($str) >= 97 && ord($str) <= 122) && !(ord($str) >= 48 && ord($str) <= 57) ){
      $chkSym++;
    }

  }

  //英數字與特殊符號綜合判定
  if($chkSym > 0 || $chkEng==strlen($pw) || $chkNum==strlen($pw) ){
    echo "密碼有特殊符號，或全英文或數字";
    $chkPw2=false;
  }else{
    $chkPw2=true;
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



  if($chk1==true && $chk2==true && $chk3==true && $chkPw1==true && $chkPw2==true && $chkAccount==false){
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

