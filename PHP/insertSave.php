<meta charset="utf-8">
<?php
if( !isset( $_POST['fullname'] ) ){
	echo "<script>window.location='insertForm.php';</script>";
	exit();
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$major = $_POST['major'];

include('connectdb.php');

$sql = "insert into student(student_fullname,student_email,student_mobile,student_gender,major_id,lastupdate)
		value('$fullname','$email','$mobile','$gender','$major',now())";

if( !$result = $db -> query($sql) ){
	die( $db -> error );
	exit();
}	

?>
<script>
	alert('เพิ่มข้อมูล เรียบร้อยแล้วครับ');
	window.location='index.php';
</script>