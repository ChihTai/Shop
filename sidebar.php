<!---左側選單欄--->
<div id="sidebar">
<?php
//利用session內的使用者帳號來取出使用者的資料
if(!empty($_SESSION['user'])){
  
  $sql="select * from user where acc='".$_SESSION['user']."'";
  $user=$pdo->query($sql)->fetch();
    
  //將權限還原成為陣列
  $pr=unserialize($user['permission']);

}else{
  $pr=[1]; //預設的權限，未登入的人只能看到第一個選單的項目
}
?>
      <ul class="menu">
    <?php
      
    /*
      //利用in_array函式來替代迴圈判斷
       if(in_array(1,$pr)){ 
        echo "<li>關於我們</li>";
      }

    */
      ?>
    <?php
      //利用三元運算子來簡化
      echo (in_array(1,$pr))?"<li>關於我們</li>":"";
      echo (in_array(2,$pr))?"<li>最新消息</li>":"";
      echo (in_array(3,$pr))?"<li>活動資訊</li>":"";
      echo (in_array(4,$pr))?"<li>產品訂購</li>":"";
      echo (in_array(5,$pr))?"<li>留言板</li>":"";
      echo (in_array(6,$pr))?"<li>生活留影</li>":"";
      ?>      
    </ul>
  </div>