<?php
include "header.php";

?>


<?php 
//크롤링 
   include 'simple_html_dom.php';
   
   $html1=file_get_html("https://dak.gg/profile/teltors/pc-2018-05/kakao");
   $html2=file_get_html("https://dak.gg/profile/jungjae302/pc-2018-05/kakao");
   $html3=file_get_html("https://dak.gg/profile/agalbbuabbula/pc-2018-05/kakao");
   $html4=file_get_html("https://dak.gg/profile/choisw77/pc-2018-05/kakao");
   
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
		<h1>임전무퇴 순위</h1><br>
		<h3 style="color:red"><a href="https://dak.gg/">dak.gg</a>로 접속하여 전적을 갱신해 주세요!!</h3>
		<table class="table" style="margin-left: auto; margin-right: auto;">
		<thead class="thead">
			<tr>
				<th>아이디</th>
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
				<td>teltors</td>
				<td><?php echo $html1->find('p.value', 20);  //k/d?></td>
				<td><?php echo $html1->find('p.value', 21);  //승률?></td>
				<td><?php echo $html1->find('p.value', 22);  //top10?></td>
				<td><?php echo $html1->find('p.value', 23);  //평균데미지?></td>
				<td><?php echo $html1->find('p.value', 25);  //최다킬?></td>
				<td><?php echo $html1->find('p.value', 27);  //최대거리?></td>
			</tr>
			<tr>
				<td>jungjae302</td>
				<td><?php echo $html2->find('p.value', 10);  //k/d?></td>
				<td><?php echo $html2->find('p.value', 11);  //승률?></td>
				<td><?php echo $html2->find('p.value', 12);  //top10?></td>
				<td><?php echo $html2->find('p.value', 13);  //평균데미지?></td>
				<td><?php echo $html2->find('p.value', 15);  //최다킬?></td>
				<td><?php echo $html2->find('p.value', 17);  //최대거리?></td>
			</tr>			
			<tr>
				<td>agalbbuabbula</td>
				<td><?php echo $html3->find('p.value', 0);  //k/d?></td>
				<td><?php echo $html3->find('p.value', 1);  //승률?></td>
				<td><?php echo $html3->find('p.value', 2);  //top10?></td>
				<td><?php echo $html3->find('p.value', 3);  //평균데미지?></td>
				<td><?php echo $html3->find('p.value', 5);  //최다킬?></td>
				<td><?php echo $html3->find('p.value', 7);  //최대거리?></td>
			</tr>			
			<tr>
				<td>choisw77</td>
				<td><?php echo $html4->find('p.value', 20);  //k/d?></td>
				<td><?php echo $html4->find('p.value', 21);  //승률?></td>
				<td><?php echo $html4->find('p.value', 22);  //top10?></td>
				<td><?php echo $html4->find('p.value', 23);  //평균데미지?></td>
				<td><?php echo $html4->find('p.value', 25);  //최다킬?></td>
				<td><?php echo $html4->find('p.value', 27);  //최대거리?></td>
			</tr>						
		</tbody>
		</table>
	</div>
</section> 
</body>
