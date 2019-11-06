<?php
include "connect_db.php";
include "password.php";

$no=$_POST['no'];
$userid=$_POST['userid'];
$password= $_POST['password']; //패스워드 암호화
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$nickname=$_POST['nickname'];
$kakaoid=$_POST['kakaoid'];

//닉네임 중복체크
$sql="select count(*) from member where nickname='$nickname'";
$res=mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($res);
$num=$rs[0];

if($num>0){
    echo "<script>
		alert('존재하는 닉네임입니다.');
		location.replace('myinfo.php');
		</script>";
    exit;     //php 탈출
}

//회원 수정
$sql="update member set userid='$userid', password='$password', 
                        name='$name', email='$email', phone='$phone', 
                        nickname='$nickname', kakaoid='$kakaoid' where no=$no";
        
$res=mysqli_query($conn,$sql);

if($res>0){
    echo "<script>
                    alert('수정이 완료 되었습니다.');
					location.replace('intro.php');
					</script>";
}else{
    echo "<script>
					alert('수정 실패');
					location.replace('myinfo.php');
					</script>";
}

?>


