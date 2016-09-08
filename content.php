<?php
$conn = mysqli_connect("localhost","root",111111);
mysqli_select_db($conn, 'pathfinder');
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
      $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo $row['id'];

            $num = mysql_num_rows($result);
            echo $num;

            $next = $row['id']+1;
            $before = $row['id']-1;

            echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
            echo '<p>'.htmlspecialchars($row['name']).'</p>';
            echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
            echo '<br>';
            echo '<a href="http://localhost:8080/list.php">목록</a>'.'<p>';
            if( $next == $num ){
              echo "마지막 글 입니다";
            }else{
              echo '<a href="http://localhost:8080/content.php?id='.$next.'">다음'.'</a>'.'      ';
            }
            if( $$row['id'] == 1 ){
              echo "첫번째 글 입니다";
            }else{
              echo '<a href="http://localhost:8080/content.php?id='.$before.'">이전'.'</a>';
            }
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
  </body>
</html>
