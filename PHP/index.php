<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Web Design and Development</title>
  </head>	

<?php
include('connectdb.php');
	
//$sql = "select * from student natural join major";
$sql = "select * from student s, major m
		where s.major_id = m.major_id";
	
if( !$result = $db -> query($sql) ){
	die( $db -> error );
	exit();
}
	
$numRow = $result -> num_rows; //นับจำนวนทั้งหมดที่ดึงจาก $sql
	
$perPage = 4;
$totalPage = ceil($numRow / $perPage);
// page1 =1-4, page2 = 5-8, page3 = 9-10

if( !isset( $_GET['page'] ) ){
	$page = 1;
} else {
	$page = $_GET['page'];
}
	
$start = ($page - 1) * $perPage;
	
$sql .= " limit $start,$perPage";
// $sql = $sql . " limit 0,$perPage";
	
if( !$result = $db -> query($sql) ){
	die( $db -> error );
	exit();
}

$numPageRow = $result -> num_rows; //นับจำนวนแถวหลังจาก limit
	
?>
	
  <body>
<div class="container">
	
	<h1>Student List = <?php echo $numRow ?> คน <a href="insertForm.php" class="btn btn-success"> เพิ่มข้อมูล </a></h1>
	
	<table class="table table-dark">
	  <thead>
		<tr>
		  <th scope="col">Student ID</th>
		  <th scope="col">Fullname</th>
		  <th scope="col">Mobile</th>
		  <th scope="col">Email</th>
		  <th scope="col">Gender</th>
		  <th scope="col">Major</th>
		  <th scope="col"> </th>
		  <th scope="col"> </th>
		</tr>
	  </thead>
	  <tbody>
		<?php
		for( $i=1; $i<=$numPageRow; $i++ ){
			$record = $result -> fetch_assoc();
		?>
		<tr>
		  <th><?php echo $record['student_id']; ?></th>
		  <td><?php echo $record['student_fullname']; ?></td>
		  <td><?php echo $record['student_mobile']; ?></td>
		  <td><?php echo $record['student_email']; ?></td>
		  <td><?php echo $record['student_gender']; ?></td>
	      <td><?php echo $record['major_name']; ?></td>
			
		  <td><a href="updateForm.php?page=<?php echo $page; ?>&student=<?php echo base64_encode($record['student_id']); ?>" 
				 class="btn btn-warning btn-sm">Update</a></td>
			
		  <td><a onClick="return confirm('ลบข้อมูลของ <?php echo $record['student_fullname']; ?>')" 
				 href="delete.php?page=<?php echo $page; ?>&student=<?php echo base64_encode($record['student_id']); ?>" 
				 class="btn btn-danger btn-sm">Delete</a></td>		
		</tr>
		<?php } ?>
	  </tbody>
	</table>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item <?php if( $page==1 ){ echo "disabled"; } ?>">
      <a class="page-link" href="?page=<?php echo $page-1; ?>">Previous</a>
    </li>
	 
	<?php
	for( $p=1; $p<=$totalPage; $p++ ){
	?>
    <li class="page-item  <?php if( $page==$p ){ echo "disabled"; } ?>"><a class="page-link" href="?page=<?php echo $p; ?>"><?php echo $p; ?></a></li>
	<?php } ?>
		
    <li class="page-item <?php if( $page==$totalPage ){ echo "disabled"; } ?>">
      <a class="page-link" href="?page=<?php echo $page+1; ?>">Next</a>
    </li>
  </ul>
</nav>
	
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>