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
    'title' => $row['title'],
    'description' => $row['description']
);


$sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
// echo $sql;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="">WEB</a></h1>
    <ol>
      <?=$list?>
    </ol>
    <a href="create.php">create</a>
    <h2>Welcome</h2>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus natus libero sit ad, nemo iusto minus reiciendis cum suscipit commodi dolores eveniet similique asperiores doloribus dolore excepturi nostrum consectetur beatae.
  </body>
</html>