<?php   
include 'header.php';
include 'connect_db.php';

$id = $_GET['id'];
$number = $_GET['number'];
$query = "select title, content, date, id from board where number=$number";
$result = $conn->query($query);
$rows = mysqli_fetch_assoc($result);

$title = $rows['title'];
$content = $rows['content'];
$nick = $rows['id'];

$URL = "Bmain.php";

if(!isset($_SESSION['userid'])) {
    ?>              <script>
                                alert("권한이 없습니다.");
                                location.replace("<?php echo $URL?>");
                        </script>
        <?php   }
                else if($_SESSION['userid']==$id) {
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
    <form method = "get" action = "BmodifyProcess.php">
    <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
            <tr>
            <td height=20 align= center bgcolor=#ccc><font color=black> 글수정</font></td>
            </tr>
            <tr>
            <td bgcolor=white>
            <table class = "table2">
            		<tr>
                    <td>작성자</td>
                    <td><input type = text name = name size=20 value="<?=$nick?>" readonly></td>
                    </tr>
    
                    <tr>
                    <td>제목</td>
                    <td><input type = text name = title size=60 value="<?=$title?>"></td>
                    </tr>
    
                    <tr>
                    <td>내용</td>
                    <td><textarea name = content cols=85 rows=15><?=$content?></textarea></td>
                    </tr>
    
                    </table>
    				</table>
    			
    				
    				<div class="view_btn">
            				<input type="hidden" name="number" value="<?=$number?>">
                            <input class="view_btn1" type = "submit" value="수정">
                            <input class="view_btn1" type="button" onclick="location.href='./Bmain.php'" value="목록으로">
                    
                    </div>
    			
            </td>
            </tr>
    
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


