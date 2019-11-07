<?php
include 'header.php';
include 'connect_db.php';

$number = $_GET['number'];

//조회수 +
$hit = "update board set hit=hit+1 where number=$number";
$conn->query($hit);

//글 불러오기
$query = "select * from board where number =$number";
$result = $conn->query($query);
$rows = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
 
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

 
        <table class="view_table" align=center>
        <tr>
                <td colspan="4" class="view_title"><?php echo $rows['title']?></td>
        </tr>
        <tr>
                <td class="view_id">작성자</td>
                <td class="view_id2"><?php echo $rows['id']?></td>
                <td class="view_hit">조회수</td>
                <td class="view_hit2"><?php echo $rows['hit']?></td>
        </tr>
 
 
        <tr>
                <td colspan="4" class="view_content" valign="top">
                <?php echo $rows['content']?></td>
        </tr>
        </table>
   
 	
        <!-- MODIFY & DELETE -->
        <div class="view_btn">
        	<?php if( $_SESSION != null){?>
        		<input type="text" value="<?php echo $rows['deapth']?>">
        		<input type="text" value="<?php echo $rows['thread']?>">
                <button class="view_btn1" onclick="location.href='./Bmain.php'">목록으로</button>
                <button class="view_btn1" onclick="location.href='./Breply.php?p_num=<?=$number?>&id=<?=$_SESSION['userid']?>&deapth=<?php echo $rows['deapth']?>&thread=<?php echo $rows['thread']?>'">답글쓰기</button>
                <button class="view_btn1" onclick="location.href='./Bmodify.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">수정</button>                
                <button class="view_btn1" onclick="location.href='./Bdelete.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">삭제</button>
        	<?php }else {?>  
        		<button class="view_btn1" onclick="location.href='./Bmain.php'">목록으로</button>
        	 <?php }?>
        </div>

         
</body>
</html>