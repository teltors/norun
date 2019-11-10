<?php include "header.php";
?>
<style>
    
     body{
     background-color: black;
     text-align:center;
     color:white;  
     }
  
       
</style>
<!-- 이미지 미리보기 스크립트 -->
<script src="http://madalla.kr/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
        $(function() {
            $("#imgView").on('change', function(){
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                    $('#View').attr('src', e.target.result);
                }

              reader.readAsDataURL(input.files[0]);
            }
        }


    </script>
    <?php 
$URL = "Gfancy.php";
if( $_SESSION == null){?>
 				<script>
                        alert("로그인이 필요합니다");
                        location.replace("<?php echo $URL?>");
                </script>
<?php }?>

<br>
  		<article>
  			<h2 align="center">사진 업로드</h2>
  			<br>
  			<form name="imgForm" id="imgForm" method="post" enctype='multipart/form-data' action="Gfileupload.php" onsubmit="return chk_input()">
  				<input type="hidden" name="id" value="<?php echo $_SESSION['userid'];?>">	
  				<p style="color:red">※이미지를 올린 후 삭제가 불가합니다. 미풍양속에 위배되는 사진을 올리시면 경고 없이 탈퇴 될 수 있습니다.</p>			 
				 <p>사진을 간단히 표현해보세요!!&nbsp;&nbsp; <input type="text" name="title" ></p>
				  <br>
				  <!-- 이미지 올리기 -->
				 <input name="img" type="file" id="imgView"/> 
				 <input name="submit" type="submit" value="전송 하기 ">
				  <br>
				 <!-- 이미지 미리보기 -->
				  <br>
				 <div class="img_wrap">
				 	<img id="View" src="./fancy_img/tdot.gif" alt="이미지 미리보기"/>
				 </div>
				 <br>
                
			</form>	
  		</article>
</body>
</html>

<script>
function chk_input(){
	 var imgForm = document.imgForm;
	
	if(imgForm.img.value==""){
		alert("이미지를 등록하세요.");
		return false;
	}	

	return true;
}
</script>


