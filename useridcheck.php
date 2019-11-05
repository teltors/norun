<?php
include "connect_db.php";
$userid = $_GET["userid"];
$sql = "select * from member where userid='".$userid."'";
$res=mysqli_query($conn,$sql);
$member = $res->fetch_array();

if($member==0)
{
    ?>

	<div style='font-family:"malgun gothic"';><?php echo $userid; ?>는 사용가능한 아이디입니다.</div>
<?php 
	}else{
?>
	<div style='font-family:"malgun gothic"; color:red;'><?php echo $userid; ?>중복된 아이디입니다.<div>
<?php
	}
?>
<button value="닫기" onclick="window.close()">닫기</button>
<script>
</script>