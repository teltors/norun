
<?php
//업로드 폴더
$path = './upload/';

//파일이 정상적으로 서버까지 올라온 상태라면
$img_file = $_FILES['img']['tmp_name'];
if ($img_file)
{
    //그냥 파일명
    $img_file_name = $_FILES['img']['name'];
    
    //파일명 추출을 위한 배열 생성
    $file_type_check = explode('.',$img_file_name);
    
    //파일 확장자 체크
    $file_type = $file_type_check[count($file_type_check)-1];
    
    //확장자를 제외한 파일명 추출
    $i = 0;
    while($i < count($file_type_check)-1){
        $real_filename="";
        $real_filename .= $file_type_check[$i];
        $i++;
    }
    
    //파일 존재 여부 체크
    $exist_flag = 0;
    if(file_exists($path.$real_filename.'.'.$file_type)){  //파일이 존재한다면
        $i = 0;
        while($exist_flag != 1){  //존재하지 않을때 까지 루프
            if(!file_exists($path.$real_filename.'['.$i.'].'.$file_type)){ //  경로/파일명[$i].확장자 존재한다면
                $exist_flag = 1;          // 존재함을 표시하고
                $img_file_name = $real_filename.'['.$i.'].'.$file_type; // 확인된 파일명으로 업로드 파일명 설정
            }
            $i++;
        }
        
    }
 
    //파일명_시분초.확장자
    $img_file_name = $real_filename."_".date("YmdHis").'.'.$file_type;
    if(!@copy($img_file, $path.$img_file_name)) { echo("error"); }
    
}

?>

<?php include 'connect_db.php';


$id = $_POST['id'];                       
$title = $_POST['title'];
$date = date('Y-m-d H:i:s');          

$URL = 'Gmain.php';                   //return URL

//글 적기
$query = "insert into gallery (title, file, id, date)
                        values('$title', '$img_file_name', '$id', '$date' )";


$result = $conn->query($query);
if($result){
    ?>                  <script>
                        alert("<?php echo "사진이 등록되었습니다."?>");
                        location.replace("<?php echo $URL?>");
                    </script>
<?php
                }
                else{
                        echo "FAIL";
                }
 
                mysqli_close($conn);
?> 

