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
      <!-- <link rel="stylesheet" href="style.css"> -->
      <!-- Bootstrap -->
     <link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <header class="jumbotron text-center">
        <img src="./img/pflogo.jpg" alt="logo">
        <h1>공릉 패스파인더</h1>
      </header>
      <div class="row">
        <nav class="col-md-3">
          <ol class="nav nav-pills nav-stacked">
            <?php
              echo file_get_contents("nav.txt");
             ?>
          </ol>
        </nav>
      <div class="col-md-9">
        <article>
          <?php
          echo '<h2>의견 나눔방</h2>';
          while( $row = mysqli_fetch_assoc($result)){
          echo '<li><a href="http://localhost:8080/content.php?id='.$row['id'].'">'.$row['id'].' '.$row['title'].'</a></li>'."\n";
          }
          echo '<br>';
          echo '<a href="http://localhost:8080/write.php" class="btn btn-default">글쓰기</a>';
          ?>
        </article>
      </div>
    </div>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
