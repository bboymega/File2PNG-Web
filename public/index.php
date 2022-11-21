<!DOCTYPE html>
<html lang="en">
  <head>
	<script>
		function downloadpage()
  		{
      		var hiddenElement = document.createElement('a');
			var currentpage = document.getElementById('maintext').innerHTML;
      		hiddenElement.href = 'data:attachment/text,' + encodeURI(currentpage);
      		hiddenElement.target = '_blank';
      		hiddenElement.download = 'notfollowingback_'+Date.now()+'.html';
      		hiddenElement.click();
  		}
	</script>
	<script src="js/upload.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="theme-color" content="#2C4DC1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="File2PNG - Encode Any File as PNG.">
	<meta name="keywords" content="file2png, encryption, file, tools">
    <title>File2PNG - Encode Any File as PNG - File2PNG.ORG</title>
	<link rel="icon" type="image/x-icon" href="/images/favicon.png" sizes="16x16">
	<style type="text/css">
		@font-face {
    		font-family: "Ronysiswad";
    		src: url("./fonts/Ronysiswadi10Bold.ttf");
		}
		
	</style>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="./" style="font-family:Ronysiswad" >File2PNG</a>
    </nav>
    <div class="container mt-2">
      <div class="row">
        <div class="col-12">
          <div class="jumbotron">
            <h1 class="text-center" style="font-family:Ronysiswad" >File2PNG - Encode Any File As PNG</h1>
            <div class="row justify-content-center">
			  <div class="col-auto text-center">
				  	<p></br><label for="upload_file" class="btn btn-outline-dark" style="font-family:Ronysiswad" >Select...</br>Max File Size: 2GB</label></p>
				  	<span id="upload_file_chosen" style="font-family:Ronysiswad" >No file chosen</span>
				    <input type="file" name="upload_file" id="upload_file" hidden></input>
			        </br></br>
			        <button class="btn btn-dark" id="encodebtn" onclick="upload_file_encode()" style="font-family:Ronysiswad" >Encode</button>         
		            <button class="btn btn-dark" id="decodebtn" onclick="upload_file_decode()" style="font-family:Ronysiswad" >Decode</button>
              </div>
            </div>
		    </br>
            <p class="text-center" id="maintext" style="font-family:Ronysiswad" >Encode Any File as PNG.</br>Processed Files are deleted in 2 hours with crontab.</br></p>
          </div>
        </div>
      </div>
    </div>
    <footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
           <p class="blockquote-footer" style="font-family:Ronysiswad" >Made with ❤️ by MEGA. Project Licensed Under GPL V3. Source Code Available on <a href="https://github.com/bboymega/File2PNG-Web" >Github</a>.</br></p>
          </div>
        </div>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>
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

?>

	<script type="text/JavaScript">
		const actualBtn = document.getElementById('upload_file');
		const fileChosen = document.getElementById('upload_file_chosen');
		actualBtn.addEventListener('change', function(){
  		fileChosen.textContent = this.files[0].name
		})
	</script>

