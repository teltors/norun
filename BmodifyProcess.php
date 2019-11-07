<?php
include 'connect_db.php';

$number = $_GET['number'];
$title = $_GET['title'];
$content = $_GET['content'];
$date = date('Y-m-d H:i:s');
$query = "update board set title='$title', content='$content', date='$date' where number=$number";
$result = $conn->query($query);

if($result>0){
    echo "<script>
                    alert('수정이 완료 되었습니다.');
					location.replace('Bmain.php');
					</script>";
}else{
    echo "<script>
					alert('수정 실패');
					location.replace('Bmain.php');
					</script>";
}
?>


