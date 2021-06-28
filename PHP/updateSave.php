<meta charset="utf-8">
<?php
if( !isset( $_POST['fullname'] ) ){
	echo "<script>window.location='index.php';</script>";
	exit();
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$major = $_POST['major'];

$student = $_POST['student']; // hidden field
$page = $_POST['page']; // hidden field

include('connectdb.php');

$sql = "update student set student_fullname = '$fullname',
						   student_email = '$email',
						   student_mobile = '$mobile',
						   student_gender = '$gender',
						   major_id = '$major',
						   lastupdate = now()
					 where student_id = $student";

if( !$result = $db -> query($sql) ){
	die( $db -> error );
	exit();
}
?>
<script>
alert('แก้ไขข้อมูล เรียบร้อยแล้วครับ');
window.location='index.php?page=<?php echo $page ?>';
</script>