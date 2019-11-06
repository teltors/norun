<?php
include "connect_db.php";
include "password.php";

$no=$_POST['no'];

$password= password_hash($_POST['password'], PASSWORD_DEFAULT); //패스워드 암호화



//회원 수정
$sql="update member set password='$password' where no=$no";
        
$res=mysqli_query($conn,$sql);

if($res>0){
    echo "<script>
                    alert('수정이 완료 되었습니다.');
					location.replace('intro.php');
					</script>";
}else{
    echo "<script>
					alert('수정 실패');
					location.replace('intro.php');
					</script>";
}

?>


