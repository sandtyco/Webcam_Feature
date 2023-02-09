<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>YouCam - Educollabs</title>
	<!-- css -->
	<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href=" ./css/demo_table.css">
	<link rel="stylesheet" href="./css/bootstrap-responsive.css">
	<link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="shortcut icon" href="./img/icon.png">
	<style type="text/css">
      /* Sticky footer styles
      -------------------------------------------------- */
	  
      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }

      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      .container {
        width: auto;
        max-width: 900px;
      }
      .container .credit {
        margin: 20px 0;
      }
    </style>
    <style>
		body {
			background-image: url('./img/bg.jpg');
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment:fixed;
			}
	</style>
</head>

<body>
	<div class="wrap">
		<div class="container">
			<div class="page-header">
				<h1><img src="./img/logo.png" width="300"></h1>
			</div>
			<h4>Webcam Capture</h4>
			<span>
				<ul class="nav nav-tabs">
					<li><a href="scanner.php">QR Scanner</a></li>
					<li class="active"><a href="capture.php">Capture Image</a></li>
				</ul>
			</span>
			<p class="well">For the following tools, this is a sample Web Camera that is used to capture images obtained from your webcam device. You can save the results easily with just a right click on the mouse and save. The default saved format uses png.</p>
			<p>The following is a sample webcam capture that you can use as a reference.</p>
		</div>

		<div class="container"><!--Sampel Capture QR-->
			<div class="row text-center">
				<div class="well span12">
					<h1>Look, who's damm on camera...?</h1>
					<video class="img-polaroid" autoplay="true" id="videoElement"></video><br>
					<button class="btn btn-large btn-info" onclick="takeSnapshot();"><i class="icon-camera icon-white"></i> Capture Image</button>
				</div>
				<div class="well span12">
					<h1>Your result capture :</h1>
					<canvas id="canvas" width="400" height="300"></canvas>
					<p aligh="center">If look is good, you just click right on mouse and <b>"Save Image As"</b>, Its simple right...</p>
				</div>
			</div>

			<script><!--Scripting Capture QR-->
				
				var video = document.querySelector("#videoElement");

				if (navigator.mediaDevices.getUserMedia) {
					navigator.mediaDevices.getUserMedia({ video: true })
					.then(function (stream) {
					video.srcObject = stream;
					})
					.catch(function (err0r) {
					console.log("Something went wrong!");
					});
				}
				
				function takeSnapshot() {
					
					// buat elemen img
					var img = document.createElement('img');
					var context;
					
					// ambil ukuran video
					var width = video.offsetWidth
					, height = video.offsetHeight;

					// buat elemen canvas
					canvas = document.getElementById('canvas');
					canvas.width = width;
					canvas.height = height;

					// ambil gambar dari video dan masukan ke dalam canvas
					context = canvas.getContext('2d');
					context.drawImage(video, 0, 0, width, height);
				}
				
			</script>
			<!------------------------------------END SCRIPT----------------------------------------------->
		</div>
	<div id="push"></div>
 </div>
 
<div id="footer">
      <div class="container">
			<p class="muted credit">Copyright <strong>&copy;</strong> 2022 Web-QR All rights reserved. Development By : <a href="http://educollabs.org">Smart Edutechno Collaboration</a></p>
      </div>
</div>

<!-- Script -->
<script type="text/javascript" src=".js/bootstrap.js"></script>
<script type="text/javascript" src=".js/bootstrap.min.js"></script>
 
</body>

</html>