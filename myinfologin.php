<?php
include "header.php";
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<style>
@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('./image/soap-bubble.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 260px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
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
width: 50px;
background-color: #FFC312;
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
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}




</style>


<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>본인확인</h3>
			<!-- 다른 아이디를 이용한 로그인 기능
			 	<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>  -->
			</div>
			<div class="card-body">
				<form action="myinfologinProcess.php" method="post" >
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="hidden" name="sessionid" value="<?php echo $_SESSION['userid']?>">
						<input type="text" class="form-control" name="userid" placeholder="아이디">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="비밀번호">
					</div>
					<!--  쿠키 미구현
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					-->
					<div class="form-group">
						<input type="submit" value="확인" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			
		<!-- 	<div class="card-footer">
				 쿠키 미구현 <div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>  -->
		</div>
	</div>
</div>

</body>
</html>
