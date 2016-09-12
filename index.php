<?php
require("config/config.php");
require("lib/db.php");

$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic");
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
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
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
