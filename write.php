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
    </article>
  </body>
</html>
