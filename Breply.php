<?php include "header.php" ?>
<?php 
$p_num = $_GET['p_num'];
$deapth=$_GET['deapth'];
$thread=$_GET['thread'];
?>


<!DOCTYPE>
 
<html>
<head>
        <meta charset = 'utf-8'>
</head>
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
<?php 
$URL = "Bmain.php";
if( $_SESSION == null){?>
 				<script>
                        alert("로그인이 필요합니다");
                        location.replace("<?php echo $URL?>");
                </script>
<?php }?>




        <form method = "get" action = "BreplyProcess.php">
        <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
                <tr>
                <td height=20 align= center bgcolor=#ccc><font color=black> 글쓰기</font></td>
                </tr>
                <tr>
                <td bgcolor=white>
                <table class = "table2">
                        <tr>
                        <td>작성자</td>
                        <td><input type = text name = name size=20 value="<?php echo $_SESSION['userid'];?>" readonly> </td>
                        </tr>
 
                        <tr>
                        <td>제목</td>
                        <td><input type = text name = title size=60></td>
                        </tr>
 
                        <tr>
                        <td>내용</td>
                        <td><textarea name = content cols=85 rows=15></textarea></td>
                        </tr>
 
                        <tr>
                        <td>비밀번호</td>
                        <td><input type = password name = pw size=10 maxlength=10></td>
                        </tr>
                        </table>
                                
                </td>
                </tr>
                        </table>
 
     					<div class="view_btn">
     							<input type="hidden"  name="thread" value="<?= $thread?>">
     							<input type="hidden"  name="deapth" value="<?= $deapth?>">    
        				        <input type="hidden" name="p_num" value="<?= $p_num?>">    		
                                <input class="view_btn1" type = "submit" value="작성">
                                <input class="view_btn1" type="button" onclick="location.href='./Bmain.php'" value="목록으로">
                      
                        </div>
               
        
        </form>
</body>
</html>


