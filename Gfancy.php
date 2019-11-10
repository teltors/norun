<?php include "./header.php"; ?> 

<style>

    body{
     background-color: #39c6a3;
     color:white;  
     }
     #gallery{
        
       text-align:center;
     }
 
     figure{
        float: left;
        margin: 30px 30px 30px;
    }
     figure img{
        width: 400px;
        height: 300px;
        border: 1px solid #999;
    }

	
</style>
  		<h1 id="community" align = "center"><div>community</div></h1>
  		<article align = "center">
  			<h2>포토갤러리</h2>
  			<input type="button" onclick="location.href='./Gwrite.php'" value="이미지올리기" >
  			<!-- 테이블을 이용하여 그림 보여주기 -->
  			<table align = "center">
  				<tr>
  					<td><figure><a class="fancybox" data-fancybox-group="gallery" href="fancy_img/photos/pic1.jpg" title="벗꽃과 직박구리"><img src="fancy_img/photos/pic1.jpg"> <figcaption>벗꽃과 직박구리 </figcaption></a></figure></td>
  					<td><figure><a class="fancybox" data-fancybox-group="gallery" href="fancy_img/photos/pic2.jpg" title="아름다움이란"><img src="fancy_img/photos/pic2.jpg"> <figcaption>아름다움이란 </figcaption></a></figure></td>
  					<td><figure><a class="fancybox" data-fancybox-group="gallery" href="fancy_img/photos/pic3.jpg" title="벗꽃과 직박구리"><img src="fancy_img/photos/pic3.jpg"> <figcaption>민들레</figcaption></a></figure></td>
  				</tr>
  				<tr>
  					<td><figure><a class="fancybox" data-fancybox-group="gallery" href="fancy_img/photos/pic4.jpg" title="벗꽃과 직박구리"><img src="fancy_img/photos/pic4.jpg"> <figcaption>민들레 2</figcaption></a></figure></td>
  					<td></td>
  					<td></td>
  				</tr>
  				<tr>
  					<td></td>
  					<td></td>
  					<td></td>
  				</tr>
  			</table>
  	

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="scripts/jquery.fancybox.pack.js"></script>
  	<script type="text/javascript">
  		$(document).ready(function() {
			$(".fancybox").fancybox({
				openEffect	: 'none',
				closeEffect	: 'none'
			});
		});
  	</script>
</body>
</html>
