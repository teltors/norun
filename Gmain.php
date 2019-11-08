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
        
        $sql = 'select count(*) as cnt from gallery';
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        $allPost = $row['cnt']; //전체 게시글의 수
        
        $onePage = 9; // 한 페이지에 보여줄 게시글의 수.
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
		$paging .= '<td class="page page_start"><a href="./Gmain.php?page=1">처음</a></td>';
	}
	//첫 섹션이 아니라면 이전 버튼을 생성
	if($currentSection != 1) { 
		$paging .= '<td class="page page_prev"><a href="./Gmain.php?page=' . $prevPage . '">이전</a></td>';
	}
	
	for($i = $firstPage; $i <= $lastPage; $i++) {
		if($i == $page) {
			$paging .= '<td class="page current">' . $i . '</td>';
		} else {
			$paging .= '<td class="page"><a href="./Gmain.php?page=' . $i . '">' . $i . '</a></td>';
		}
	}
	
	//마지막 섹션이 아니라면 다음 버튼을 생성
	if($currentSection != $allSection) { 
		$paging .= '<td class="page page_next"><a href="./Gmain.php?page=' . $nextPage . '">다음</a></td>';
	}
	
	//마지막 페이지가 아니라면 끝 버튼을 생성
	if($page != $allPage) { 
		$paging .= '<td class="page page_end"><a href="./Gmain.php?page=' . $allPage . '">끝</a></td>';
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
     background-image: url('./image/rose.jpg');
     color:white;  
     }
     #gallery{
        
       text-align:center;
     }
 
     tr {
        float: left;
     
     }
     td{
        width: 33%;
    }
     figure{
        float: left;
        margin: 20px 30px 20px;
    }
     figure img{
        width: 400px;
        height: 300px;
        border: 1px solid #999;
    }
    
     .paging td{
                background: #efefef;
                text-align:center;
                color:black;
                width:30px;
                padding: 10px;
        }
   
       
       .view_btn1 {
height: 40px;
width: 200px;
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
                //게시글 9개 가져옴
                $query ="select * from gallery order by no desc ". $sqlLimit;
                $result = $conn->query($query);
          

        ?>
        <h2 align=center>추억 사진</h2>
        <div class="view_btn" style="text-align:center;">
        	<input class="view_btn1" type="button" onclick="location.href='./Gwrite.php'" value="이미지올리기" >
        </div>	
        <table align = "center">
        
        <?php
                while($rows = mysqli_fetch_assoc($result)){ //DB에 저장된 데이터 수 (열 기준)
                    ?>
                <tr>
                <td>
                <figure><a class="fancybox" data-fancybox-group="gallery" href="./upload/<?php echo $rows['file']?>" title="<?php echo $rows['title']?>">
                <img src="./upload/<?php echo $rows['file']?>"> <figcaption><?php echo $rows['title']?></figcaption></a>작성자 <?php echo $rows['id']?></figure>
                </td>           
               </tr>
        <?php
                }
                              
        ?>
        </table>
        
        <div class="paging">
				<?php echo $paging ?>
		</div>
</body>
</html>
        
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="scripts/jquery.fancybox.pack.js"></script>
  	<script type="text/javascript">
  		$(document).ready(function() {
			$(".fancybox").fancybox({
				openEffect	: 'none',
				closeEffect	: 'none'
			});
		});
  	</script>



 

