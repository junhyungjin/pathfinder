<?php
$conn = mysqli_connect("localhost","root",111111);
mysqli_select_db($conn, 'opentutorials');
$result = mysqli_query($conn, "SELECT * FROM topic");

$sql = 'SELECT * FROM topic WHERE id='.$_GET['id'];
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      echo '<h2>'.$row['title'].'</h2>';
      echo $row['description'];
?>
