<?php
include 'connect_db.php';

//thread 값 계산
$query = "select max(thread) from board";
$max_thread_result = mysqli_query($conn, $query);
$max_thread_fetch = mysqli_fetch_row($max_thread_result);

//만약에 2000번의 글이 삭제되고 1999번만 있다면?
//그럴 경우 1999/1000을 한다음에 올림을 한뒤 1000을 곱하면 2000이 된다.
//그리고 그값에 1000을 더하면 3000이 되서 새로 입력한 글의 Thread는 3000이 된다.
$max_thread = ceil($max_thread_fetch[0]/1000)*1000+1000;


$id = $_GET['name'];                      //Writer
$pw = $_GET['pw'];                        //Password
$title = $_GET['title'];                  //Title
$content = $_GET['content'];              //Content
$date = date('Y-m-d H:i:s');            //Date

$URL = 'Bmain.php';                   //return URL



//글 적기
$query = "insert into board (number,title, content, date, hit, id, password, deapth, thread)
                        values(null,'$title', '$content', '$date', 0, '$id', '$pw', 0, $max_thread)";


$result = $conn->query($query);
if($result){
    ?>                  <script>
                        alert("<?php echo "글이 등록되었습니다."?>");
                        location.replace("<?php echo $URL?>");
                    </script>
<?php
                }
                else{
                        echo "FAIL";
                }
 
                mysqli_close($conn);
?>

