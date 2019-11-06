

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
<form role="myform" name="myform" action="modifymyinfoPass.php" method="post" onsubmit="return chk_input()">
	<input type="hidden" name="no" value="<?php echo $no;?>">
	
<table class="table table-bordered" style="margin-left: auto; margin-right: auto;">

	<tbody>	
    	
    	<tr>
    		<td>새 비밀번호</td>
    		<td>    		
    			<input type="password" name="password" >
    		</td>
    	</tr>
    	<tr>
    		<td>비밀번호 확인</td>
    		<td>
    			<input type="password" name="password_confirm">
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
function chk_input(){
	 var myform = document.myform;

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
	
	return true;
}
</script>



