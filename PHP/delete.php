<meta charset="utf-8">
<?php
if( !isset( $_GET['student'] ) ){
	echo "<script>window.location='index.php';</script>";
	exit();
}

$student = base64_decode($_GET['student']);
//$student = $_REQUEST['student'];
$page = $_GET['page'];

include('connectdb.php');

$sql = "delete from student where student_id = $student";

if( !$result = $db -> query($sql) ){
	die( $db -> error );
	exit();
}
?>
<script>
	alert('ลบข้อมูล เรียบร้อยแล้วครับ');
	//history.back();
	window.location='index.php?page=<?php echo $page; ?>';
</script>