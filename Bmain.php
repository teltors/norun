<?php include "header.php" ?>
<?php  
	include "connect_db.php";
?>
<!DOCTYPE html>
 
<html>
<head>
        <meta charset = 'utf-8'>
</head>
<style>

        body{
                 background-image: url('./image/night.jpg');
                 color:black;
         }
         h2{
                 color:white;
         }
        table{
                border-top: 1px solid #444444;
                border-collapse: collapse;
                background: white;
        }
        tr{
                border-bottom: 1px solid black;
                padding: 10px;
        }
        .tr1 {
                background: #cccccc;
        }   
        td{
                border-bottom: 1px solid black;
                padding: 10px;
        }
        table .even{
                background: #efefef;
        }
        .text{
                text-align:center;
                padding-top:20px;
                color:white;
        }
        .text:hover{
                text-decoration: underline;
        }
        
        a{
        color: #005266;
        }
        a:link {color : #005266; text-decoration:none;}
        a:hover { color : #e60073; text-decoration : underline;}
        
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
</style>
<body>
<br>
<br>

<?php
              
                $query ="select * from board order by number desc";
                $result = $conn->query($query);
                $total = mysqli_num_rows($result);
                
 
        ?>
        <h2 align=center>게시판</h2>
        <br>
        <table align = "center">
        <thead align = "center">
        <tr class="tr1">
        <td width = "100" align="center">번호</td>
        <td width = "500" align = "center">제목</td>
        <td width = "100" align = "center">작성자</td>
        <td width = "200" align = "center">날짜</td>
        <td width = "150" align = "center">조회수</td>
        </tr>
        </thead>
 
        <tbody>
        <?php
                while($rows = mysqli_fetch_assoc($result)){ //DB에 저장된 데이터 수 (열 기준)
                        if($total%2==0){
        ?>                      <tr class = "even">
                        <?php   }
                        else{
        ?>                      <tr>
                        <?php } ?>
                <td width = "50" align = "center"><?php echo $total?></td>
                <td width = "500" align = "center">
                <a href = "Bview.php?number=<?php echo $rows['number']?>">
                <?php echo $rows['title']?></td>
                  <td width = "100" align = "center"><?php echo $rows['id']?></td>
                <td width = "200" align = "center"><?php echo $rows['date']?></td>
                <td width = "50" align = "center"><?php echo $rows['hit']?></td>
                </tr>
        <?php
                $total--;
                }
        ?>
        </tbody>
        </table>
        
        <div class="view_btn">
            <input class="view_btn1" type="button" onclick="location.href='./Bwrite.php'" value="글쓰기">                   
       </div>

</body>
</html>
 

