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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <link rel="stylesheet" href="style.css">
      <!-- Bootstrap -->
     <link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
