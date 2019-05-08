<?php
  //連線資料庫
  //$dsn="mysql:host=localhost;charset=utf8;dbname=shop";
  $dsn="mysql:host=localhost;charset=utf8;dbname=108_php_01";
  $pdo=new PDO($dsn,"root","");

  session_start();

//檢查字串是否空白
function chkSpace($str){
  if($str==""){
    return true;
  }
}

//檢查字串長度是否符合規定
function chkLength($str){
  $min=4;
  $max=12;
  if(strlen($str) >= $min || strlen($str) <= $max ){
    return true;
  }
}

//檢查字串是否全是數字
  function chkNum($str){
    $chkNum=0;
    for($i=0;$i<strlen($str);$i++){
  
      $part=substr($str,$i,1);   //依照$i的值逐一取出單一字元

      //判斷利用ord()函式來判斷$part的值是否在數字的ascii範圍內
      if(ord($part) >= 48 && ord($part) <= 57){
        $chkNum++;
      }
    }
    //如果檢查的結果，$chkNum的值和$str的長度一樣，表示整個字串都是數字，回傳true值
    if($chkNum==strlen($str)){
      return true;
    }

  }

//檢查字串是否全是英文
  function chkEng($str){
    $chkEng=0;
    for($i=0;$i<strlen($str);$i++){
  
      $part=substr($str,$i,1); //依照$i的值逐一取出單一字元

      //判斷利用ord()函式來判斷$part的值是否在英文的ascii範圍內
      if((ord( $part) >= 65 && ord( $part) <= 90) || (ord( $part) >= 97 && ord($part) <= 122) ){
        $chkEng++;
      }
    }

    //如果檢查的結果，$chkEng的值和$str的長度一樣，表示整個字串都是英文，回傳true值
    if($chkEng==strlen($str)){
      return true;
    }
  }

//檢查字串是否含有特殊字元  
  function chkSym($str){
    $chkSym=0;
    for($i=0;$i<strlen($str);$i++){
  
      $part=substr($str,$i,1);//依照$i的值逐一取出單一字元

      //判斷利用ord()函式來判斷$part的值是否在英文及數字的ascii範圍外
      if(!(ord($part) >= 65 && ord($part) <= 90) && !(ord($part) >= 97 && ord($part) <= 122) && !(ord($part) >= 48 && ord($part) <= 57) ){
        $chkSym++;
      }
  
    }

    //如果檢查的結果，$chkSym的值大於0，表示字串內容含有至少一個特殊符號，回傳true值
    if($chkSym>0){
      return true;
    }
  }
?>