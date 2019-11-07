<?php
include 'connect_db.php';

$pw = $_POST['pw'];
$number = $_POST['number'];

//번호에 따른 패스워드 확인
$query = "select * from board where number=$number";
$result = $conn->query($query);
$rows = mysqli_fetch_assoc($result);
$password = $rows['password'];

if($password == $pw) {

//글 삭제
$query = "delete from board where number=$number";
$res=mysqli_query($conn,$query);
 ?>
    				<script> 
                    alert('삭제가 완료 되었습니다.');
					location.replace('Bmain.php');
					</script>";
<?php }else{ ?>
    				<script>   
					alert ('비밀번호가 다릅니다.');
					location.replace('Bmain.php');
					</script>";
<?php } 
?>
