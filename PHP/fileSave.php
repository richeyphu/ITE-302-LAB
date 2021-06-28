<meta charset="utf-8">
<?php

if( !isset( $_POST['title'] ) ){
	echo "<script>window.location='downloadList.php';</script>";
	exit();
}

$title = $_POST['title'];

$file = $_FILES['file'];
$name = $file['name']; // รับชื่อไฟล์ พร้อมนามสกุล
$size = $file['size']; // รับขนาดไฟล์

// echo $name;

$extension = strrchr($name,".");

// echo $extension;

if( $size > 1024 * 1024 * 5 ){
	echo "<script>alert('กรุณาระบุไฟล์ที่มีขนาดไม่เกิน 5 MB ด้วยครับ');
		  history.back();</script>";
	exit();
}
else if ( $size > 1 ){
	
	include('connectdb.php');
	
	$sql = "insert into download(download_title,download_extension,lastupdate)
						values('$title','$extension',now())";
	
	if( !$result = $db -> query($sql) ){
		die( $db -> error );
		exit();
	}
	
	$last_id = $db -> insert_id; // ดึงข้อมูล ID ตัวล่าสุดที่เพิ่งเพิ่มข้อมูลไป
	
	copy( $file['tmp_name'], "download/$last_id".$extension );
	
}

?>
<script>
alert('เพิ่มไฟล์ เรียบร้อยแล้วครับ');
window.location='downloadList.php';
</script>
