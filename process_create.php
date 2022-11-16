<?php
$conn = mysqli_connect('localhost','root','1111','opentutorials');
$filtered = array(
    'title' => mysqli_real_escape_string($conn,$_POST['title']), // mysqli_real_escape_string
    'description' => mysqli_real_escape_string($conn,$_POST['description'])

);
$sql = "
    INSERT INTO topic (title,description,created)
    VALUES(
        '{$filtered['title']}',
        '{$filtered['description']}',
        NOW()
    )  
";
$result = mysqli_query($conn,$sql); // 복수 쿼리 명령 가능 

if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의 하세요';
    error_log(mysqli_error($conn));
} else {
    echo '성공했습니다. <a href="index.php"> 돌아가기 </a> ';
}
/* 
sql injection 관련 
-- SELECT * FROM topic ;
SELECT * FROM topic; -- WHERE id = 1;
티켓 예매 
$result = mysqli_multi_query()
INSERT INTO topic (title, description, created) VALUES( 'hehe', 'haha','2018-1-1 2019-1-1'); --',NOW);
/를 이용해서 데이터 공격을 일으킬 수 있음. 
멀티 쿼리라는 것도 sql을 쪼개서 공격하는 것이기 때문에 mysqli를 사용하는 것이 안전하다.( 보안 솔루션을 통해 자기)

crosssite scripting 기법 = script 공격 
<script> </script> 코드를 짜서 데이터 입력에서 주입하는 경우 
쿠키라던지 중요한 정보들을 공격자가 유출을 시켜 사용자 권한을 획득할 수 있다는 등의 보안 이슈가 존재 
&lt;script&gt;
이렇게 써서 php 에서
echo htmlspecialchars('<script>alert</script>');를 해주면 된다. 
*/
?>