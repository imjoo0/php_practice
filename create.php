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
    'description' => 'HELLO WEB'
);

if(isset($_GET['id'])){
    $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
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