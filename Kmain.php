<?php
include "header.php";

?>
<?php 
    include 'connect_db.php';
    
    $sql = "select * from member where userid='".$_SESSION['userid']."'";
    $res=mysqli_query($conn,$sql);
    $member = $res->fetch_array();
    $kakaoid = $member['kakaoid'];
    
?>

<?php 
//크롤링 
   include 'simple_html_dom.php';
   
   $html=file_get_html("https://dak.gg/profile/".$kakaoid."/pc-2018-05/kakao");
   
?>

<style>
body{
 background-color: black;
 text-align:center;
 color:white;  
 }
 
.thead tr th{
   border: 1px solid black;
   background-color:#609f60;
   font-weight: bold;
   font-size : 20px;
 }
 
 tbody tr td{
   border: 1px solid green;
   background-color: #40bf40;
   font-weight: bold;
   font-size : 18px;
 }
 
 
 
</style>
<body>
<br>
<br>
<section class="container">
	<div class="leader-board">
		<h1><?php echo $kakaoid?> 의 TEAM 스쿼드 전적</h1><br>
		<h3 style="color:red"><a href="https://dak.gg/">dak.gg</a>로 접속하여 전적을 갱신해 주세요!!</h3>
		<table class="table" style="margin-left: auto; margin-right: auto;">
		<thead class="thead">
			<tr>
				<th>K/D(Kill/Death)</th>
				<th>승률%</th>
				<th>TOP10</th>
				<th>평균데미지</th>
				<th>최다킬</th>
				<th>최대거리킬</th>
			</tr>
		</thead>
		<tbody class="tbody">
			<tr>
				<td><?php echo $html->find('p.value', 20);  //k/d?></td>
				<td><?php echo $html->find('p.value', 21);  //승률?></td>
				<td><?php echo $html->find('p.value', 22);  //top10?></td>
				<td><?php echo $html->find('p.value', 23);  //평균데미지?></td>
				<td><?php echo $html->find('p.value', 25);  //최다킬?></td>
				<td><?php echo $html->find('p.value', 27);  //최대거리?></td>
			</tr>			
		</tbody>
		</table>
	</div>
</section> 
</body>
