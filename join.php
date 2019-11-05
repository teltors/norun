<?php
include "header.php";
?>
<?php  
	include "connect_db.php";
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<style>
@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('./image/join.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 620px;
margin-top: auto;
margin-bottom: auto;
width: 500px;
background-color: rgba(0,0,0,0.5) !important;
}


.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}


.input-group-prepend span{
width: 120px;
background-color: #A6C2CE;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: white;
background-color: red;
width: 150px;
border:5 ;
background-color: rgba(30,100,120,0.5) ;
}

.login_btn:hover{
color: balck;
background-color: white;
}




</style>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>회원가입</h3>
				
			</div>
			<div class="card-body">
				<form name="joinform" role="joinform" action="joinProcess.php" method="post" onsubmit="return chk_input()">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text">닉네임</span>
						</div>
						<input type="text" name="nickname" id="nickname" class="form-control" placeholder="닉네임">	
						<input type="button" class="btn float-center login_btn"  onclick="checknick();" value="중복확인">					
					</div>
				<hr>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text">KAKAO ID</span>
						</div>
						<input type="text" name="kakaoid" class="form-control" placeholder="카카오 배그 아이디">						
					</div>
				<hr>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text">아이디</span>
						</div>
						<input type="text" name="userid" id="userid" class="form-control" placeholder="로그인 아이디">
						<input type="button" class="btn float-center login_btn"  onclick="checkid();" value="중복확인">							
					</div>
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text">비밀번호</span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="비밀번호">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text">비밀번호확인</span>
						</div>
						<input type="password" name="password_confirm" class="form-control" placeholder="비밀번호 확인">
					</div>
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text">이름</span>
						</div>
						<input type="text" name="name" class="form-control" placeholder="이름">						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text">이메일</span>
						</div>
						<input type="text" name="email" class="form-control" placeholder="이메일">						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text">연락처</span>
						</div>
						<input type="text" name="phone" class="form-control" placeholder="연락처">						
					</div>
					<div class="form-group" >	
						<input type="submit" value="가입" class="btn float-center login_btn" >					
						<input type="reset" value="취소" class="btn float-center login_btn" >
						
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
</body>
</html>

<script>
    function checknick(){
    	var nickname = document.getElementById("nickname").value;
    	if(nickname)
    	{
    		url = "nicknamecheck.php?nickname="+nickname;
    			window.open(url,"chknick","width=300,height=100");
    		}else{
    			alert("닉네임을 입력하세요");
    		}
    	}

    function checkid(){
    	var userid = document.getElementById("userid").value;
    	if(userid)
    	{
    		url = "useridcheck.php?userid="+userid;
    			window.open(url,"chknick","width=300,height=100");
    		}else{
    			alert("아이디를 입력하세요");
    		}
    	}
</script>
<!-- 유효성 체크 -->
<script>
function chk_input(){
	 var myform = document.joinform;
	
	if(myform.nickname.value==""){
		alert("닉네임을 입력하세요.");
		myform.nickname.focus();
		return false;
	}	
	// 영소문자 숫자로 4~10자
	var regexp = /^[a-z0-0]{4,10}$/;
	if(!regexp.test(myform.userid.value)){
		alert('아이디는 소문자와 숫자로 4 ~ 10자입니다.');
		myform.userid.focus();
		return false;
	}
	if(myform.password.value==""){
		alert("비밀번호를 입력하세요.");
		myform.password.focus();
		return false;
	}
	if(myform.password_confirm.value==""){
		alert("비밀번호확인을 입력하세요.");
		myform.password_confirm.focus();
		return false;
	}
	if(myform.password.value != myform.password_confirm.value){
		alert("비밀번호가 다릅니다.");
		myform.password_confirm.focus();
		myform.password_confirm.value="";
		return false;
	}
	if(myform.name.value==""){
		alert("이름을 입력하세요.");
		myform.name.focus();
		return false;
	}
	if(myform.email.value==""){
		alert("이메일을 입력하세요.");
		myform.email.focus();
		return false;
	}
	if(myform.phone.value==""){
		alert("연락처를 입력하세요.");
		myform.phone.focus();
		return false;
	}
	return true;
}
</script>
