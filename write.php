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
          <form action="process.php" method="post">
            <div class="form-group">
              <label for="form-title">제목</label>
              <input type="text" class="form-control" name="title" id="form-title" placeholder="제목을 적어주세요">
            </div>
            <div class="form-group">
              <label for="form-author">작성자</label>
              <input type="text" class="form-control" name="author" id="form-author" placeholder="작성자를 적어주세요">
            </div>
            <div class="form-group">
              <label for="form-author">본문</label>
              <textarea class="form-control" rows="10" name="description" placeholder="본문을 적어 주세요"></textarea>
            </div>
            <hr>
            <input type="submit" name="name" class="btn btn-success">
            <?php
            echo '<a href="http://localhost:8080/list.php" class="btn btn-default">목록</a>';
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
