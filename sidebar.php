<div id="sidebar">
  <?php
//echo $_SESSION['user'];
if(!empty($_SESSION['user'])){
//  echo $_SESSION['user'];
  $sql="select * from user where acc='".$_SESSION['user']."'";
  $user=$pdo->query($sql)->fetch();
 // echo $user['permission'];

  $pr=unserialize($user['permission']);
 // print_r($pr);
}else{
  $pr=[1,2,3,4,5,6];
}
?>
  <ul class="menu">
  <?php 
/*     
    if(in_array(1,$pr)){ 
    echo "<li>關於我們</li>";
    }
    if(in_array(2,$pr)){ 
    echo "<li>最新消息</li>";
    }
    if(in_array(3,$pr)){  
    echo "<li>活動資訊</li>";
    }
    if(in_array(4,$pr)){  
    echo "<li>產品訂購</li>";
    }
    if(in_array(5,$pr)){  
    echo "<li>留言板</li>";
    }
    if(in_array(6,$pr)){  
    echo "<li>生活留影</li>";
    }
 */
?>
    <?php
    echo (in_array(1,$pr))?"<li>關於我們</li>":"";
    echo (in_array(2,$pr))?"<li>最新消息</li>":"";    
    echo (in_array(3,$pr))?"<li>活動資訊</li>":"";
    echo (in_array(4,$pr))?"<li>產品訂購</li>":"";
    echo (in_array(5,$pr))?"<li>留言板</li>":"";
    echo (in_array(6,$pr))?"<li>生活留影</li>":"";    
    ?>
  </ul>
</div>