<?php

//取出所有的使用者
$sql="select * from user ";
$users=$pdo->query($sql)->fetchAll();

echo "<ul>";
foreach ($users as $key => $value) {
  echo "<li><a href='?do=admin&per=".$value['id']."'>".$value['acc']."-".$value['name']."</a></li>";
}
echo "</ul>";

echo "<br><br>";

if(!empty($_GET['per'])){
  $sql="select * from user where id='".$_GET['per']."'";
  $user=$pdo->query($sql)->fetch();
  echo "acc=".$user['acc']."<br>";
  echo "name=".$user['name']."<br>";
  echo "permission=".$user['permission']."<br>";
?>
  <form action="index.php?do=admin" method="post">
    <input type="checkbox" name="per[]" value="1">關於我們<br>
    <input type="checkbox" name="per[]" value="2">最新資訊<br>
    <input type="checkbox" name="per[]" value="3">活動資訊<br>
    <input type="checkbox" name="per[]" value="4">產品訂購<br>
    <input type="checkbox" name="per[]" value="5">留言板<br>
    <input type="checkbox" name="per[]" value="6">生活留影<br>
    <input type="hidden" name="id" value="<?=$user['id'];?>">
    <input type="submit" value="確認送出">
  </form>
<?php
}

if(!empty($_POST['per']) && !empty($_POST['id'])){
  $per=serialize($_POST['per']);
  $id=$_POST['id'];
  $sql="update user set permission='$per' where id='".$id."'";
  $result=$pdo->query($sql);
  if($result){
    echo "更新成功";
  }else{
    echo "更新失敗";
  }


}

?>
