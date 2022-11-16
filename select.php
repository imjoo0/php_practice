<?php 
// DELETE * FROM topic; 
$conn = mysqli_connect(
'localhost',
'root',
'111111',
'opentutorials');
$sql = "SELECT * FROM topic WHERE id = 19";
var_dump($result->num_rows);
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result); // 가져온 데이터를 php에서 '데이터 타입으로 변환해서' 활용 -> mysqli_fetch 하기 'fetch의 리턴값은 연관배열임 like json '
echo '<h1>'.$row['title'].'</h1>'; //echo $row['description'] 으로 하나의 행을 표현할 수 있게 됨. 하나의 행이 아닌경우, 즉 여러개인 경우는 어떻게 하나? 
echo $row['description']; 
?>

// 여러 개인 경우 
<?php
$conn = mysqli_connect(
'localhost',
'root',
'111111',
'opentutorials');
echo "<h1>single row</h1>";

$sql = "SELECT * FROM topic WHERE id = 19";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

echo '<h2>'.$row['title'].'</h2>';
echo $row['description'];

echo "<h1>multi row</h1>";
$sql = "SELECT * FROM topic";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)) { // php 에서 null을 false 로 취급 
    echo '<h2>'.$row['title'].'</h2>';
    echo $row['description'];
}
// 수요일 가서 -> 목요일 돌아온다
// 오후 9시 - 11시 ->  목요일 06시 - 09시 
// 12시 - 5시 30분 정도 
//  