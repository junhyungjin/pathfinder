<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);

$result = mysqli_query($conn, $sql = "SELECT topic.id, title, name, created FROM topic LEFT JOIN user ON topic.author = user.id order by topic.id desc");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/board.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <!-- <link rel="stylesheet" href="style.css"> -->
      <!-- Bootstrap -->
     <link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <article class="boardArticle">
    <h2>의견 나눔방</h2>
    <table>
      <thead>
        <tr>
          <th scope="col" class="no">번호</th>
          <th scope="col" class="title">제목</th>
          <th scope="col" class="author">작성자</th>
          <th scope="col" class="date">작성일</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while( $row = $result->fetch_assoc()){
          $datetime = explode(' ', $row['created']);
					$date = $datetime[0];
					$time = $datetime[1];
					if($date == Date('Y-m-d'))
						$row['created'] = $time;
					else
						$row['created'] = $date;
        ?>
        <tr>
          <td class="no"><?php echo $row['id']?></td>
          <td class="title"><?php echo '<a href="http://localhost:8080/content.php?id='.$row['id'].'">'.$row['title'].'</a>'?></td>
          <td class="author"><?php echo $row['name']?></td>
          <td class="date"><?php echo $row['created']?></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <br>
    <a href="http://localhost:8080/write.php" class="btn btn-default">글쓰기</a>
  </article>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
