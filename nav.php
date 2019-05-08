<!---上方導覽列--->
<div id="nav">
      <ul class="nav">
        <li><a href="index.php">首頁</a></li>
        <li><a href="index.php?do=login">登入</a></li>
        <li><a href="index.php?do=reg">註冊會員</a></li>
        <li>徵才訊息</li>

        <?php 
        //利用session來判斷使用者的登入狀態用以決定是不是要顯示登出的功能
        if(!empty($_SESSION['login'])){
          echo "<li><a href='logout.php'>登出</a></li>";
      }
      ?>
      <?php 
        //利用session來判斷使用者是否為管理者，如果是管理者就顯示管理頁面的連結
        if(!empty($_SESSION['login']) && $_SESSION['user']=='admin'){
          echo "<li><a href='index.php?do=admin'>管理頁面</a></li>";
      }
      ?>
      </ul>
    </div>