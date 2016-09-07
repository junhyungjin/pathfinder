<?php
echo '<h2>의견 나눔방</h2>';
while( $row = mysqli_fetch_assoc($result)){
echo '<li><a href="http://localhost:8080/index.php?id='.$row['id'].'">'.$row['id'].' '$row['title'].'</a></li>'."\n";
}
echo '<br>';
echo '<a href="http://localhost:8080/write.php">글쓰기</a>';
?>
