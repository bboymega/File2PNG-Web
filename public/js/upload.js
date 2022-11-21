function upload_file_encode()
{
	var filename= document.getElementById("upload_file_chosen").innerHTML;
	var binary= document.getElementById("upload_file").files;
	console.log(binary);
	if(binary.length == 0)
		{
			return -1;
		}
	document.getElementById("decodebtn").disabled = true;
	document.getElementById("encodebtn").innerHTML = "<span class=\"spinner-border spinner-border-sm\" role=\"status\" aria-hidden=\"true\" ></span> Uploading..."
	var xhr=new XMLHttpRequest();
	xhr.upload.onprogress = function(evt)
	{
    	if (evt.lengthComputable)
    	{
        	var percentComplete = parseInt((evt.loaded / evt.total) * 100);
			document.getElementById("encodebtn").innerHTML = "<span class=\"spinner-border spinner-border-sm\" role=\"status\" aria-hidden=\"true\" ></span> Uploading... " + percentComplete + "%";
    	}
	};
	xhr.upload.onload = function() {
  		console.log('Upload completed successfully.');
		document.getElementById("encodebtn").innerHTML = "<span class=\"spinner-border spinner-border-sm\" role=\"status\" aria-hidden=\"true\" ></span> Encoding..."
	};
    xhr.onload=function(e) {
		if (this.readyState === 4) {
			document.querySelector('html').innerHTML = e.target.responseText;
		}
	};
	var fd=new FormData();
	fd.append("upload_file",binary[0],filename);
	xhr.open("POST","encode.php",true);
	xhr.send(fd);
	console.log("File is being uploaded...");
	
	return 0;
}

function upload_file_decode()
{
	var filename= document.getElementById("upload_file_chosen").innerHTML;
	var binary= document.getElementById("upload_file").files;
	console.log(binary);
	if(binary.length == 0)
	{
		return -1;
	}
	document.getElementById("encodebtn").disabled = true;
	document.getElementById("decodebtn").innerHTML = "<span class=\"spinner-border spinner-border-sm\" role=\"status\" aria-hidden=\"true\" ></span> Uploading..."
	var xhr=new XMLHttpRequest();
	xhr.upload.onprogress = function(evt)
	{
    	if (evt.lengthComputable)
    	{
        	var percentComplete = parseInt((evt.loaded / evt.total) * 100);
			document.getElementById("decodebtn").innerHTML = "<span class=\"spinner-border spinner-border-sm\" role=\"status\" aria-hidden=\"true\" ></span> Uploading... " + percentComplete + "%";
    	}
	};
	xhr.upload.onload = function() {
		console.log('Upload completed successfully.');
		document.getElementById("decodebtn").innerHTML = "<span class=\"spinner-border spinner-border-sm\" role=\"status\" aria-hidden=\"true\" ></span> Decoding..."
	};
	xhr.onload=function(e) {
		if (this.readyState === 4) {
			document.querySelector('html').innerHTML = e.target.responseText;
		}
	};
	var fd=new FormData();
	fd.append("upload_file",binary[0],filename);
	xhr.open("POST","decode.php",true);
	xhr.send(fd);
	console.log("File is being uploaded...");
	return 0;
}