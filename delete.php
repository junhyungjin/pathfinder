<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);

$sql = "SELECT * FROM topic";
$sql_del = "DELETE FROM topic WHERE id=".$_GET['id'];

$result_del = mysqli_query($conn, $sql_del);
$result = mysqli_query($conn, $sql);
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
      echo '<h2>의견 나눔방</h2>';
      while( $row = mysqli_fetch_assoc($result)){
      echo '<li><a href="http://localhost:8080/content.php?id='.$row['id'].'">'.$row['id'].' '.$row['title'].'</a></li>'."\n";
      }
      echo '<br>';
      echo '<a href="http://localhost:8080/write.php">글쓰기</a>';
      ?>
    </article>
  </body>
</html>
