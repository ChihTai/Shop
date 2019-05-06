<?php include_once "base.php";?>
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
      $do=$_GET['do'];
    }else{
      $do="";
    }

    //$do=(!empty($_GET['do']))?$_GET['do']:"";

    switch($do){
      case "login":
         include "login.php";
      break;
      case "reg":
        include "reg.php";
      break;
      case "member":
        include "member.php";
      break;
      default:

      break;
    }

  ?>
  
  </div>
  <?php include "footer.php" ;?>
</div>  
</body>
</html>