<?php   
include 'header.php';
include 'connect_db.php';

$id = $_GET['id'];
$number = $_GET['number'];
$query = "select  id from board where number=$number";
$result = $conn->query($query);
$rows = mysqli_fetch_assoc($result);

$usrid = $rows['id'];

$URL = "Bmain.php";

if(!isset($_SESSION['userid'])) {
    ?>              <script>
                                alert("권한이 없습니다.");
                                location.replace("<?php echo $URL?>");
                        </script>
        <?php   }
                else if($_SESSION['userid']==$usrid) {
        ?>
        
<style>
body {
    background-image: url('./image/night.jpg');
}
.view_table {
border: 1px solid #444444;
margin-top: 30px;
}
.view_title {
height: 30px;
text-align: center;
background-color: #cccccc;
color: black;
width: 1000px;
}
.view_id {
text-align: center;
background-color: #EEEEEE;
width: 30px;
}
.view_id2 {
background-color: white;
width: 60px;
}
.view_hit {
background-color: #EEEEEE;
width: 30px;
text-align: center;
}
.view_hit2 {
background-color: white;
width: 60px;
}
.view_content {
background-color: white;
padding-top: 20px;
border-top: 1px solid #444444;
height: 500px;
}
.view_btn {
width: 700px;
height: 200px;
text-align: center;
margin: auto;
margin-top: 50px;
}
.view_btn1 {
height: 50px;
width: 100px;
font-size: 20px;
text-align: center;
background-color: white;
border: 2px solid black;
border-radius: 10px;
}

.view_comment_input {
    width: 700px;
    height: 500px;
    text-align: center;
    margin: auto;
}
    
.view_text3 {
font-weight: bold;
float: left;
margin-left: 20px;
}
.view_com_id {
width: 100px;
}
.view_comment {
width: 500px;
}
</style>
      
<body>  
    <br>
    <br>
    <br>
    <form name="delform" method="post" action="BdeleteProcess.php" onsubmit="return chk_input()">
    <table  style="padding-top:50px" align = "center" width="200" height="100" border="0" cellpadding="2" >
            <tr>
            <td align= center bgcolor=#ccc><font color=black> 비밀번호 입력</font></td>
            </tr>
            <tr>
            <td bgcolor=white>
            <table class = "table2" align= "center">
            
            		<tr>
                    <td><input type ="password" name="pw"></td>
                    </tr>
                    </table>
    			    </td>
                    </tr>
                    
    				</table>
    			
    				
    				<div class="view_btn">
    			
    						<input type="text" name="number" value="<?= $number?>">
    						<input type="text" name="id" value="<?php echo $_SESSION['userid']?>">        			
                            <input class="view_btn1" type = "submit" value="삭제">
                            <input class="view_btn1" type="button" onclick="location.href='./Bmain.php'" value="목록으로">
                 
                    </div>
    			
                   
            </form>
    
</body>
</html>
<?php   }
                else {
        ?>              <script>
                                alert("권한이 없습니다.");
                                location.replace("<?php echo $URL?>");
                        </script>
        <?php   }
        ?>


<script>
function chk_input(){
	 var delform = document.delform;
	
	if(delform.pw.value==""){
		alert("비밀번호를 입력하세요.");
		delform.pw.focus();
		return false;
	}	
	return true;
}
</script>

