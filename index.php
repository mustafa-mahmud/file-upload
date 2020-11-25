<?php

include 'upload.php';

if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $file = $_FILES['photo'];

  if (trim($user) === '') {
    message('alert-danger', 'Pls put user name.');
  } else {
    if ($file['name'] !== '') {
      fileUpload($file);
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FileUpload</title>

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous" />
</head>

<body>
	<h1 class="bg-primary text-center py-2 text-white">File Upload</h1>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-6">
				<form action="index.php" method="post" enctype="multipart/form-data">
					<input class="form-control mb-3" type="text" name="user" id="user" placeholder="Name..." />
					<input class="form-control mb-3" type="file" name="photo" id="photo" placeholder="Your Photo..." />
					<button class="btn w-100 b-block btn-success" type="submit" name="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>


	<!-- JavaScript Bundle with Popper.js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous" />
	</script>

	<script>
	var alertList = document.querySelectorAll('.alert')
	alertList.forEach(function(alert) {
		new bootstrap.Alert(alert)
	})
	</script>
</body>

</html>