<?php session_start();
       $id=session_id();
       
       $_SESSION['car']='bmw';
?>
    	
    
<!DOCTYPE html>
<html>
<head>
    <title>Untitled Document</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
   	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	<script>
	/* 드롭다운 */
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
	</script>

	<style>
	
.nav-link{
    font-size:20px;
}
 
 /* navbar 글 간격 */
 .navbar-nav > li{
  padding-left:60px;
  padding-right:30px;
}

/* navbar 가운데 정렬 */
ul {
  display: table;
  margin-left: auto;
  margin-right: auto;
}

body{
    margin-top:80px;
}


    </style>

</head>
<body>

    		<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: white;">
      <a class="navbar-brand" href="intro.php"><img src="./logo/7.jpg" alt="Logo" style="width:200px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="intro.php">소개 <span class="sr-only">(current)</span></a>
          </li>      
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              커뮤니티
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">게시판</a>
              <a class="dropdown-item" href="gallery.php">스크린샷</a>
              <!-- nodejs이용  -->
              <a class="dropdown-item" href="C:/nodejs/chat/index.html">실시간 채팅</a> 
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="ranking.php">순위</a>
          </li>
          
			<?php if( $_SESSION['car'] == 'bmw4'){?>
				
              <li class="nav-item">
                <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">내정보</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">로그아웃</a>
              </li>
              <?php }else{?>         
			  <li class="nav-item">
                <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">로그인</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="join.php" tabindex="-1" aria-disabled="true">회원가입</a>
              </li>
        	 <?php }?>
		 
        </ul>
      </div>
    </nav>
	
	