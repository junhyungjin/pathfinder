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
      <h2>의견 나눔방3</h2>
      <?php
      while( $row = mysqli_fetch_assoc($result)){
      echo '<li><a href="http://localhost:8080/content.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
      }
      echo '<br>';
      echo '<a href="http://localhost:8080/write.php">글쓰기</a>';
      ?>
    </article>
  </body>
</html>
