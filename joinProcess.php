<?php
include "connect_db.php";
include "password.php";

$userid=$_POST['userid'];
$password= password_hash($_POST['password'], PASSWORD_DEFAULT); //패스워드 암호화
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
		location.replace('join.php');
		</script>";
    exit;     //php 탈출
}

//id 중복체크
$sql="select count(*) from member where userid='$userid'";
$res=mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($res);
$num=$rs[0];

if($num>0){
    echo "<script>
		alert('존재하는 아이디입니다.');
		location.replace('join.php');
		</script>";
    exit;     //php 탈출
}

//회원 추가
$sql="insert into member(userid, password, name, email, phone, nickname, kakaoid)
			values ('$userid','$password','$name','$email','$phone','$nickname','$kakaoid')";

$res=mysqli_query($conn,$sql);

if($res>0){
    echo "<script>
                    alert('회원가입이 완료 되었습니다.');
					location.replace('login.php');
					</script>";
}else{
    echo "<script>
					alert('회원 등록 실패');
					location.replace('join.php');
					</script>";
}

?>


