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
      $sql = "SELECT topic.b_no,b_title,name,b_content, b_created FROM topic LEFT JOIN user ON topic.b_author = user.id WHERE topic.b_no=".$_GET['id'];
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $sql_count = "SELECT * FROM topic";
            $result_count = mysqli_query($conn, $sql_count);
            $num = mysqli_num_rows($result_count);

            $next = $row['b_no']+1;
            $before = $row['b_no']-1;

            echo '<h2>'.htmlspecialchars($row['b_title']).'</h2>';
            echo '<p>'.htmlspecialchars($row['name']).'     '.htmlspecialchars($row['b_created']).'</p>';
            echo strip_tags($row['b_content'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
            echo '<br>';
            echo '<hr>';
            echo '<a href="http://localhost:8080/list.php" class="btn btn-default">목록</a>'.'      ';
            if( $row['b_no'] == $num ){
              echo "";
            }else{
              echo '<a href="http://localhost:8080/content.php?id='.$next.'" class="btn btn-default">다음'.'</a>'.'      ';
            }
            if( $row['b_no'] == 1 ){
              echo "";
            }else{
              echo '<a href="http://localhost:8080/content.php?id='.$before.'" class="btn btn-default">이전'.'</a>'.'      ';
            }
            echo '<a href="http://localhost:8080/delete.php?id='.$row['b_no'].'" class="btn btn-danger">삭제'.'</a>'.'      ';
      ?>
      <div id="disqus_thread"></div>
      <script>

      /**
       *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
       *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
      /*
      var disqus_config = function () {
          this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
          this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
      };
      */
      (function() { // DON'T EDIT BELOW THIS LINE
          var d = document, s = d.createElement('script');
          s.src = '//gongreungpaeseupaindeo.disqus.com/embed.js';
          s.setAttribute('data-timestamp', +new Date());
          (d.head || d.body).appendChild(s);
      })();
      </script>
      <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
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
