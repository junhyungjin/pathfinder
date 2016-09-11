<?php
require("config/config.php");
require("lib/db.php");

$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic");
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
      <form action="process.php" method="post">
        <p>
          제목: <input type="text" name="title">
        </p>
        <p>
          작성자: <input type="text" name="author">
        </p>
        <p>
          본문: <textarea name="description"></textarea>
        </p>
        <input type="submit" name="name">
        <?php
        echo '<a href="http://localhost:8080/list.php">목록</a>';
        ?>
    </article>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
