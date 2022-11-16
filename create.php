<!--
  보안관련 이야기
  사용자가 입력받는 순간부터 보안의 요소가 매우 중요함 
  1-> 들어오는 정보에서 문제가 되는 정보를 막는것 (필터링) / 
  2-> 문제가 되는 정보를 사용자에게 노출되는것을 차단하는 것(이스케이핑)  
-->
<?php 
// DELETE * FROM topic; 
$conn = mysqli_connect(
    'localhost',
    'root',
    '111111',
    'opentutorials');

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href = \"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}

$article = array(
    'title' => 'WELCOME',
    'description' => 'HELLO, WEB'
);

if(isset($_GET['id'])){
  $filtered_id = mysqli_real_escape_string($conn,$_GET['id']); // 사용자가 sql을 주입하지 못하도록 : 
  $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = $row['title'];
  $article['description'] = $row['description'];
}

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
      <?=$list?>
    </ol>
    <a href="index.php">WEB</a>
    <form action="process_create.php" method="post">
        <p><input type="text" name="title" placeholder="title"></p>
        <p><textarea name="description" placeholder="description"></textarea></p>
        <p><input type="submit"></p>
    </form>
</body>
</html>