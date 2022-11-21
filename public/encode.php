<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="theme-color" content="#2C4DC1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="File2PNG - Encode Any File as PNG.">
	<meta name="keywords" content="file2png, encryption, file, tools">
	<title>File2PNG - Encode Any File as PNG - File2PNG.ORG</title>
	<link rel="icon" type="image/x-icon" href="/images/favicon.png" sizes="16x16">
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<style type="text/css">
		@font-face {
    		font-family: "Ronysiswad";
    		src: url("./fonts/Ronysiswadi10Bold.ttf");
		}
		
	</style>
</head>
<body>
	<script src="js/upload.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.4.1.js"></script>
	<input type="file" name="upload_file" id="upload_file" style="display:none;"></input>
</body>
</html>

<?PHP
  function generateRandomString($length = 20) 
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  function encodefile($filename)
  {
	  passthru('../scripts/file2png -store "./tmp/' . $filename . '" "./tmp_output/' . $filename . '.png"', $errcode);
	  if($errcode != 0)
	  {
		  echo '<script type="text/JavaScript"> document.getElementById("maintext").innerHTML = \"Error: An error occured while processing file. Please try again later.\"; document.getElementById("maintext").style.display=\"block\"; </script>';
	  }
  }

  if(!empty($_FILES['upload_file']))
  {
	$path = "./tmp/";
	$randname = generateRandomString();
    $path = $path . urldecode($_FILES['upload_file']['name']);
    if(move_uploaded_file(urldecode($_FILES['upload_file']['tmp_name']), $path)) {
		$upload_file=urldecode($_FILES['upload_file']['name']);
		encodefile($upload_file);
    }
  }
?>

