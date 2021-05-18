<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5">    
		<form class="row mb-5" action="upload.php" method="post" enctype="multipart/form-data">
			<div class="col-auto">
				<input type="text" name="name" class="form-control" placeholder="Name">
		    </div>
			<div class="col-auto">			    
			    <input type="file" name="avatar" class="form-control">
			</div>
			<div class="col-auto">
				<button type="submit" class="btn btn-primary">Upload</button>
			</div>
		</form>
		
		<div class="row row-cols-1 row-cols-md-3 g-2">
		  <?php
		    $link = mysqli_connect('localhost', 'root', '', 'employee');
			$sql = "SELECT * FROM users;";
			$result = mysqli_query($link, $sql);
			while ( $row = mysqli_fetch_row($result) ) {
				echo <<<_CARD
				<div class="col">
					<div class="card h-100">
					    <img src="uploads/$row[2]" class="card-img-top" alt="...">
					    <div class="card-body">
							<h5 class="card-title">$row[1]</h5>							
							<a href="#" class="card-link">Update</a>
							<a href="delete.php?id=$row[0]&avatar=$row[2]" class="card-link">Delete</a>							
					    </div>
					</div>
			    </div>		
_CARD;
			}
			mysqli_close($link);
		  ?>
		  
		  
		</div>
	</div>  
  </body>
</html>