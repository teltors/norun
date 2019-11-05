<?php
include "connect_db.php";
$nickname = $_GET["nickname"];
$sql = "select * from member where nickname='".$nickname."'";
$res=mysqli_query($conn,$sql);
$member = $res->fetch_array();

if($member==0)
{
    ?>

	<div style='font-family:"malgun gothic"';><?php echo $nickname; ?>는 사용가능한 닉네임입니다.</div>
<?php 
	}else{
?>
	<div style='font-family:"malgun gothic"; color:red;'><?php echo $nickname; ?>중복된 닉네임입니다.<div>
<?php
	}
?>
<button value="닫기" onclick="window.close()">닫기</button>
<script>
</script>