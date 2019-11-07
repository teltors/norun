<?php include 'header.php';?>
<?php  
	include "connect_db.php";
?>

<!-- 페이징 처리 -->
<?php
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        
        $sql = 'select count(*) as cnt from board';
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        $allPost = $row['cnt']; //전체 게시글의 수
        
        $onePage = 10; // 한 페이지에 보여줄 게시글의 수.
        $allPage = ceil($allPost / $onePage); //전체 페이지의 수
        
        if($page < 1 || ($allPage && $page > $allPage)) {
?>		
<script>
alert("존재하지 않는 페이지입니다.");
history.back();
</script>
		
<?php
		exit;
	}
	
	$oneSection = 10; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)
	$currentSection = ceil($page / $oneSection); //현재 섹션
	$allSection = ceil($allPage / $oneSection); //전체 섹션의 수
	
	$firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지
	
	if($currentSection == $allSection) {
		$lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
	} else {
		$lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지
	}
	
	$prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.
	$nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.
	
	$paging = '<table align = "center"><tr>'; // 페이징을 저장할 변수
	
	//첫 페이지가 아니라면 처음 버튼을 생성
	if($page != 1) { 
		$paging .= '<td class="page page_start"><a href="./Bmain.php?page=1">처음</a></td>';
	}
	//첫 섹션이 아니라면 이전 버튼을 생성
	if($currentSection != 1) { 
		$paging .= '<td class="page page_prev"><a href="./Bmain.php?page=' . $prevPage . '">이전</a></td>';
	}
	
	for($i = $firstPage; $i <= $lastPage; $i++) {
		if($i == $page) {
			$paging .= '<td class="page current">' . $i . '</td>';
		} else {
			$paging .= '<td class="page"><a href="./Bmain.php?page=' . $i . '">' . $i . '</a></td>';
		}
	}
	
	//마지막 섹션이 아니라면 다음 버튼을 생성
	if($currentSection != $allSection) { 
		$paging .= '<td class="page page_next"><a href="./Bmain.php?page=' . $nextPage . '">다음</a></td>';
	}
	
	//마지막 페이지가 아니라면 끝 버튼을 생성
	if($page != $allPage) { 
		$paging .= '<td class="page page_end"><a href="./Bmain.php?page=' . $allPage . '">끝</a></td>';
	}
	$paging .= '</tr></table>';
	
	/* 페이징 끝 */
	
	
	$currentLimit = ($onePage * $page) - $onePage; //몇 번째의 글부터 가져오는지
	$sqlLimit = ' limit ' . $currentLimit . ', ' . $onePage; //limit sql 구문
	
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
                //게시글 10개 가져옴
                $query ="select * from board order by thread desc ". $sqlLimit;
                $result = $conn->query($query);
                $total = mysqli_num_rows($result);
          

        ?>
        <h2 align=center>게시판</h2>
        <br>
        <table align = "center">
        <thead align = "center">
        <tr class="tr1">
        <td width = "100" align="center">번호</td>
        <td width = "400" align = "center">제목</td>
        <td width = "100" align = "center">작성자</td>
        <td width = "200" align = "center">날짜</td>
        <td width = "150" align = "center">조회수</td>
        </tr>
        </thead>
 
        <tbody>
        <?php
                while($rows = mysqli_fetch_assoc($result)){ //DB에 저장된 데이터 수 (열 기준)
                    
                    $deap = $rows['deapth'];
                        if($total%2==0){
        ?>                      <tr class = "even">
                        <?php   }
                        else{
        ?>                      <tr>
                        <?php } ?>
                <td width = "50" align = "center"><?php echo $total?></td>
                <td width = "400" >
                
                <?php if ($rows['deapth'] > 0){
                    echo "<img height=1 width=".$deap*15 .">└";?>
                    <a href = "Bview.php?number=<?php echo $rows['number']?>"><?php echo $rows['title']?></a>
				</td>
				<?php }else{?>
				<a href = "Bview.php?number=<?php echo $rows['number']?>"><?php echo $rows['title']?></a>
				</td>
				<?php }?>
                
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
        
  		<div class="paging">
				<?php echo $paging ?>
		</div>
            
            
		<div class="view_btn">
            <input class="view_btn1" type="button" onclick="location.href='./Bwrite.php'" value="글쓰기">                   
        </div>
      

</body>
</html>


 

