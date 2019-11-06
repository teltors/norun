

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
         background-image: url('./image/night.jpg');
         text-align:center;
         color:white;         
    }
    
    h2{
        margin:20px;
   }  
   td{
   color:white;
   text-align:center;
   }
	
	.table{
        width:400px;
        margin-left:16px;
       
   }
   input{
        width:240px;
   }
   
   .login_btn{
color: white;
background-color: red;
width: 150px;
border:5 ;
background-color: rgba(30,100,120,0.5) ;
}
   
</style>

<article>
<br>
	<h2>회원정보</h2>

<br>
<form role="myform" name="myform" action="modifymyinfo.php" method="post" onsubmit="return chk_input()">
	<input type="hidden" name="no" value="<?php echo $no;?>">
	<input type="hidden" name="userid" value="<?php echo $userid;?>">
	
<table class="table table-bordered" style="margin-left: auto; margin-right: auto;">

	<tbody>	
    	<tr>
    		<td >아이디</td>
    		<td>
    			<input type="text" name="showid" value="<?php echo $userid;?>" disabled>			
    		</td>
    	</tr>	
    	
    	<tr>
    		<td>이름</td>
    		<td>
    			<input type="text" name="name"  value="<?php echo $name;?>">
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
    			<input type="text" name="nickname" id="nickname" value="<?php echo $nickname;?>">
    			<input type="button" class="btn btn-warning"   onclick="checknick();" value="중복확인">	
    		</td>
    	</tr>	
    	<tr>
    		<td>카카오 아이디</td>
    		<td>
    			<input type="text" name="kakaoid" value="<?php echo $kakaoid;?>">
    		</td>
    	</tr>	
    
    	<tr>
    		<td colspan=2>
    			<input type="button" class="btn btn-warning" onclick="location.href='myinfoPass.php'" value="비밀번호 변경">    				 
    		</td>
    	</tr>
    	
    	<tr>
    		<td colspan=2>
    			<input type="submit" value="수정" class="btn float-center login_btn" >					
				<input type="reset" value="취소" class="btn float-center login_btn" >	 
    		</td>
    	</tr>
	</tbody>
</table>
</form>
</article>
</body>


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
</script>

<script>
function chk_input(){
	 var myform = document.myform;
	
	if(myform.nickname.value==""){
		alert("닉네임을 입력하세요.");
		myform.nickname.focus();
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
