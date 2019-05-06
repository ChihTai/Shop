<?php
  //連線資料庫
  $dsn="mysql:host=localhost;charset=utf8;dbname=shop";
  //$dsn="mysql:host=localhost;charset=utf8;dbname=108_php_01";
  $pdo=new PDO($dsn,"root","");

  session_start();

  function chkNum($str){
    $chkNum=0;
    for($i=0;$i<strlen($str);$i++){
  
      $part=substr($str,$i,1);
      if(ord($part) >= 48 && ord($part) <= 57){
        $chkNum++;
      }
    }

    if($chkNum==strlen($str)){
      return true;
    }

  }

  function chkEng($str){
    $chkEng=0;
    for($i=0;$i<strlen($str);$i++){
  
      $part=substr($str,$i,1);
      if((ord( $part) >= 65 && ord( $part) <= 90) || (ord( $part) >= 97 && ord($part) <= 122) ){
        $chkEng++;
      }
    }
    if($chkEng==strlen($str)){
      return true;
    }
  }

  function chkSym($str){
    $chkSym=0;
    for($i=0;$i<strlen($str);$i++){
  
      $part=substr($str,$i,1);
      if(!(ord($str) >= 65 && ord($str) <= 90) && !(ord($str) >= 97 && ord($str) <= 122) && !(ord($str) >= 48 && ord($part) <= 57) ){
        $chkSym++;
      }
  
    }
    if($chkSym>0){
      return true;
    }
  }
?>