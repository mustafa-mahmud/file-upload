<?php
function fileUpload($file) {
  global $user;

  $name = $file['name'];
  $type = strtolower(substr($file['type'], 6));
  $temp = $file['tmp_name'];
  $size = $file['size'];

  $acceptType = ['jpg', 'jpeg', 'png', 'gif'];
  $acceptSize = 1000000; //1mb

  if (in_array($type, $acceptType)) {
    if (!($size > $acceptSize)) {
      $folder = 'uploads/';
      $name = intval(microtime(true)) . rand() . $name;

      $success = move_uploaded_file($temp, $folder . $name);

      if ($success) {
        message('alert-success', ucfirst($user) . ' your file uploaded successfully.');
      } else {
        message('alert-danger', ucfirst($user) . ' something went wrong pls try again.');
      }
    } else {
      $mb = is_float($size / $acceptSize) ? number_format(($size / $acceptSize), 2) : ($size / $acceptSize);
      message('alert-danger', 'File size must be in 1mp but your one is ' . $mb . 'mb');
    }
  } else {
    message('alert-danger', 'Only jpg or jpeg or png or gif supported');
  }
}

function message($color, $msg) {
  echo "<div class='m-2 alert $color alert-dismissible fade show text-center' role='alert'>
				$msg
			<button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
		</div>";
}