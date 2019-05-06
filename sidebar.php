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
      for($i=0;$i<count($pr);$i++){
        if($pr[$i]=='1'){
    ?>
    <li>關於我們</li>
    <?php
             }
            }
      ?>
    <?php
      for($i=0;$i<count($pr);$i++){
        if($pr[$i]=='2'){
    ?>
    <li>最新消息</li>
    <?php
             }
            }
      ?>
    <?php
      for($i=0;$i<count($pr);$i++){
        if($pr[$i]=='3'){
    ?>
    <li>活動資訊</li>
    <?php
             }
            }
      ?>
    <?php
      for($i=0;$i<count($pr);$i++){
        if($pr[$i]=='1'){
    ?>
    <li>產品訂購</li>
    <?php
             }
            }
      ?>
    <?php
      for($i=0;$i<count($pr);$i++){
        if($pr[$i]=='1'){
    ?>
    <li>留言板</li>
    <?php
             }
            }
      ?>
    <?php
      for($i=0;$i<count($pr);$i++){
        if($pr[$i]=='1'){
    ?>
    <li>生活留影</li>
    <?php
             }
            }
      ?>
  </ul>
</div>