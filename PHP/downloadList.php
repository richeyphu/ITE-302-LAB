<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1 align="center">Download List</h1>
	  
	<div class="container">
	  <div class="col-8 mx-auto">
		
		  <table class="table table-striped mt-4">
			  <thead class="table-dark">
			  	<tr>
					<th>No.</th>
					<th>Item</th>
					<th>Download</th>
				</tr>
			  </thead>
			  
			  <tbody>
				  
				<?php
				include('connectdb.php');
				  
				$sql = "select * from download order by lastupdate desc";
				  
				if( !$result = $db -> query($sql) ){
					die( $db -> error );
					exit();
				}
				
				$numRow = $result -> num_rows;
				
				for( $i=1; $i<=$numRow; $i++ ){
				
					$record = $result -> fetch_assoc();
				  
					$filename = $record['download_id'] . $record['download_extension'];
				?>
				  
				<tr>
					<td width="20%"><?php echo $i; ?></td>
			  		<td><?php echo $record['download_title']; ?></td>
				  	<td width="25%">
						<a download="<?php echo $record['download_title'] . $record['download_extension']; ?>" 
						   href="download/<?php echo $filename; ?>" class="btn btn-success">download</a>
					</td>
				</tr>
				<?php } ?>
				  
			  </tbody>
		  </table>
		  
		<div class="col-10 mx-auto">
			<form class="mt-5" action="fileSave.php" method="post" enctype="multipart/form-data">

				<h4 align="center">Upload File</h4>

				<div class="form-group">
					<label for="title">ชื่อเอกสาร</label>
					<input type="text" class="form-control" id="title" name="title">

				</div>
				<div class="form-group">
					<label for="file">เลือกเอกสาร</label>
					<input type="file" class="form-control" name="file" id="file">
					<small id="fileHelp" class="form-text text-muted">กรุณาระบุไฟล์ที่มีขนาดไม่เกิน 5 MB เท่านั้น</small>  
				</div>

				<button type="submit" class="btn btn-primary">Upload</button>

			</form>
		</div>
		  
	  </div>
	</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" ></script>

  </body>
</html>