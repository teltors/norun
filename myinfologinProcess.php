<meta charset="utf-8" />
<?php	
    
	include "connect_db.php";
	include "password.php";
	
	

	//POST로 받아온 아이다와 비밀번호가 비었다면 알림창을 띄우고 전 페이지로 돌아갑니다.
	if($_POST["userid"] == "" || $_POST["password"] == "" || $_POST["sessionid"] != $_POST["userid"]){
		echo '<script> alert("아이디나 패스워드 입력하세요") ; history.back(); </script>';
	}else{

	//password변수에 POST로 받아온 값을 저장하고 sql문으로 POST로 받아온 아이디값을 찾습니다.
	$password = $_POST['password'];
	$sql = "select * from member where userid='".$_POST['userid']."'";
	$res=mysqli_query($conn,$sql);
	$member = $res->fetch_array();
	$hash_pw = $member['password']; //$hash_pw에 POSt로 받아온 아이디열의 비밀번호를 저장합니다. 
	$userid_member=$member["userid"];
	
	if(password_verify($password, $hash_pw)) //만약 password변수와 hash_pw변수가  알림창을 띄운후 main.php파일로 넘어갑니다.
	{
	    
		echo "<script>alert('확인되었습니다.'); location.href='/norun/myinfo.php';</script>";
	}else{ // 비밀번호가 같지 않다면 알림창을 띄우고 전 페이지로 돌아갑니다
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
	}

} 
?>