<?php
include 'connect_db.php';

$id = $_GET['name'];                      //Writer
$pw = $_GET['pw'];                        //Password
$title = $_GET['title'];                  //Title
$content = $_GET['content'];              //Content
$date = date('Y-m-d H:i:s');            //Date

$URL = 'Bmain.php';                   //return URL



//글 적기
$query = "insert into board (number,title, content, date, hit, id, password)
                        values(null,'$title', '$content', '$date',0, '$id', '$pw')";


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

