<?php
$conn = mysqli_connect("localhost","root",111111);
mysqli_select_db($conn, 'opentutorials');
$result = mysqli_query($conn, "SELECT * FROM topic");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <img src="./img/pflogo.jpg" alt="logo">
      <h1><a href="index.php">공릉 패스파인더</a></h1>
    </header>
    <nav>
      <ol>
        <?php
          echo file_get_contents("nav.txt");
         ?>
      </ol>
    </nav>
    <article>
      <?php
      if ( empty($_GET['id']) == false && $_GET['id'] != 6 && $_GET['id'] != 7){
        echo file_get_contents($_GET['id'].".txt");
      }elseif ($_GET['id'] == 6) {
        header('Location: http://localhost:8080/list.php');
      }else {
        echo "
        <h2>
          공릉 패스파인더
        </h2>
        <ul>
          <li>패스파인더 표어: 그리스도의 사랑이 우리를 강권하시는 도다</li>
          <li>패스파인더 구호: 재림기별을 이시대 안으로 온세상에 전파하자</li>
          <li>패스파인더 서약</li>
          <ol>
            <li>하나님의 은혜를 힘입어 나는 순결하고 친절하고 참되겠다</li>
            <li>나는 패스파인더 규칙을 지키겠다</li>
            <li>나는 하나님의 종이되고 사람의 친구가 되겠다</li>
          </ol>
        </ul>";
      }
       ?>
    </article>
  </body>
</html>
