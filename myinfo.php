

<?php include "header.php" ?>


<?php   
    include "connect_db.php";
    include "password.php";
    /* if(isset($_GET['no'])){
        echo "있음";
    }else{
        echo "없음";
    } */        
        
    //DB 회원정보 읽기
   
    
    $sql="select * from member where userid='".$_SESSION['userid']."'";
    $res=mysqli_query($conn, $sql);
    
    while($rows=mysqli_fetch_array($res)){
        $no=$rows['no'];
        $userid=$rows['userid'];    
        $name=$rows['name'];
        $email=$rows['email'];
        $phone=$rows['phone'];
        $nickname=$rows['nickname'];
        $kakaoid=$rows['kakaoid'];
    }  
?>
<style>
    body{
        background-color: gray;
         text-align:center;
         color:white;         
    }
    
    h2{
        margin:20px;
   }  
	td:nth-child(1){
	   text-align:center;
	   font-weight:bold;
	}
	.table{
        width:400px;
        margin-left:16px;
       
   }
   input{
        width:240px;
   }
   
</style>

<article>
<br>
	<h2>회원정보</h2>

<br>
<form role="myform" action="" method="post">
	<input type="hidden" name="no" value="<?php echo $no;?>">
	
<table class="table table-bordered" style="margin-left: auto; margin-right: auto;">

	<tbody>	
    	<tr>
    		<td>아이디</td>
    		<td>
    			<input type="text" name="userid" readonly value="<?php echo $userid;?>" disabled>			
    		</td>
    	</tr>	
    	
    	<tr>
    		<td>이름</td>
    		<td>
    			<input type="text" name="name" readonly value="<?php echo $name;?>">
    		</td>
    	</tr>
    	<tr>
    		<td>이메일</td>
    		<td>
    			<input type="text" name="email" value="<?php echo $email;?>">
    		</td>
    	</tr>
    	<tr>
    		<td>연락처</td>
    		<td>
    			<input type="text" name="phone" value="<?php echo $phone;?>">
    		</td>
    	</tr>	
    	<tr>
    		<td>닉네임</td>
    		<td>
    			<input type="text" name="nickname" value="<?php echo $nickname;?>">
    		</td>
    	</tr>	
    	<tr>
    		<td>카카오 아이디</td>
    		<td>
    			<input type="text" name="kakaoid" value="<?php echo $kakaoid;?>">
    		</td>
    	</tr>	
    	
    	<tr>
    		<td>새 비밀번호</td>
    		<td>
    			<input type="password" name="password" >
    		</td>
    	</tr>
    	<tr>
    		<td>새 비밀번호 확인</td>
    		<td>
    			<input type="password" name="password_confirm">
    		</td>
    	</tr>
    	
    	<tr>
    		<td colspan=2>
    			<button class="btn btn-warning">수정</button>			 
    		</td>
    	</tr>
	</tbody>
</table>
</form>
</article>
</body>



<script src="http://code.jquery.com/jquery-latest.js">
</script>
<SCRIPT>
$(document).ready(function(){	
	var formObj=$("form[role='myform']");

	//수정
	$(".btn-warning").on("click",function(){
		formObj.attr("action","memberUpdate.php");
		formObj.submit();
	});		
});
</SCRIPT>