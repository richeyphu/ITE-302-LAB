<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
	<style>
		body{
			font-family: 'Kanit', sans-serif;
			font-size: 16px;
			margin: 5px;
		}
		label.error{
			color: red;
			font-style: italic;
		}
	</style>

    <title>เพิ่มข้อมูลนักศึกษา</title>
  </head>
<?php
include('connectdb.php');
?>
  <body>
<h1 align="center">เพิ่มข้อมูลนักศึกษา</h1>
	  
<div class="container">
	
<div class="col-lg-6 col-md-8 mx-auto">
	
	<form id="insertForm" action="insertSave.php" method="post">
	  <div class="form-group">
		<label for="fullname">ชื่อ นามสกุล</label> <!-- <label class="error" for="fullname"></label> -->
		<input type="text" class="form-control" name="fullname" id="fullname" placeholder="กรุณากรอกชื่อ นามสกุล" maxlength="100">
	  </div>
	  <div class="form-group">
		<label for="mobile">Mobile</label>
		<input type="text" class="form-control" name="mobile" id="mobile" placeholder="กรุณาระบุ เบอร์ติดต่อ" >
	  </div>
	  <div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" name="email" id="email" placeholder="กรุณาระบุ Email" >
	  </div>
	  <div class="form-group">
		  <label for="email">Gender</label> <br>
		  <div class="form-check form-check-inline">
			<input checked class="form-check-input" type="radio" name="gender" id="genderM" value="male">
			<label class="form-check-label" for="genderM"> Male </label>
		  </div>
		  <div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="gender" id="genderF" value="female">
			<label class="form-check-label" for="genderF"> Female </label>
		  </div>
	  </div>
	  <div class="form-group">
		<label for="major">แผนก</label>
		
		<select class="form-control form-control-sm" name="major" id="major">
			
			<?php
			$sqlMajor= "select * from major order by major_id";
			if( !$resultMajor = $db -> query($sqlMajor) ){
				die( $db -> error );
				exit;
			}
			
			$numRowMajor = $resultMajor -> num_rows;
			
			for( $m=1; $m<=$numRowMajor; $m++ ){
				$recordMajor = $resultMajor -> fetch_assoc();
			?>
			<option value="<?php echo $recordMajor['major_id'] ?>"><?php echo $recordMajor['major_name'] ?></option>
			<?php } ?>
			
		</select>
	  </div>	  

	  <button type="submit" class="btn btn-primary" id="submit" name="submit" >Submit</button>
	  <button type="reset" class="btn btn-warning ml-3" id="reset" name="reset" >Clear</button>
	  <a class="btn btn-info ml-3" href="index.php">Back</a>
	</form>
	
</div>
	
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	  
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
  </body>
</html>
<script>
	$().ready(function() {
		$("#insertForm").validate({
			rules: {
				fullname: "required",
				mobile: "required",
				email: {
					required: true,
					email: true
				},
			},
			messages: {
				fullname: "Please enter your fullname",
				mobile: "Please enter your mobile",
				email: {
					required: "Please enter a email",
					email: "Please enter a valid email address"
				}
			}
		});
	});
</script>