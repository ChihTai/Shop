<div id="nav">
      <ul class="nav">
        <li><a href="index.php?do=login">登入</a></li>
        <li><a href="index.php?do=reg">註冊會員</a></li>
        <li>徵才訊息</li>
        <?php
          if(!empty($_SESSION['login'])){
            
            echo "<li> <a href='logout.php'>登出</a></li>";
            
          }
        ?>
      </ul>
    </div>