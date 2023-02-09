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
			<h4>WebQR Scanner</h4>
			<span>
				<ul class="nav nav-tabs">
					<li class="active"><a href="scanner.php">QR Scanner</a></li>
					<li><a href="capture.php">Capture Image</a></li>
				</ul>
			</span>
			<p class="well">This WebQR Scanner is a plugin that can be used and developed for supporting needs such as presence applications, face recognition, or security features. For those of you who want to use this plugin, please contact our developer.</p>
			<p>The following is a sample webqr scanner that you can use as a reference.</p>
		</div>

		<div class="container"><!--Sampel WebQR-->
			<h4>Preview Camera :</h4>
			<div class="container text-center">
				<div class="row span5">
					<video class="img-polaroid" autoplay="true" id="previewKamera" style="width: 300;height: 300px;"></video><br>
				</div>
				
				<div class="row span4">
				<form class="form-horizontal">
					<div class="control-group">
						<label class="control-label">Your Device Camera :</label>
						<div class="controls">
							<select id="pilihKamera" style="max-width:400px"></select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Result QR Scanner :</label>
						<div class="controls">
							<textarea rows="9" type="text" id="hasilscan" disabled></textarea>
						</div>
					</div>
					<div class="control-group">
						<p align="right"><b>Note :</b> </em>Please get your QR in front of the camera!</em></p>
					</div>
				</form>
				</div>
				
				<!--Script QR Scanner-->
				<script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
				<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
				<script>
					let selectedDeviceId = null;
					const codeReader = new ZXing.BrowserMultiFormatReader();
					const sourceSelect = $("#pilihKamera");
 
					$(document).on('change','#pilihKamera',function(){
					selectedDeviceId = $(this).val();
					if(codeReader){
						codeReader.reset()
						initScanner()
					}
					})
 
					function initScanner() {
						codeReader
						.listVideoInputDevices()
						.then(videoInputDevices => {
						videoInputDevices.forEach(device =>
						console.log(`${device.label}, ${device.deviceId}`)
						);
 
						if(videoInputDevices.length > 0){
                     
						if(selectedDeviceId == null){
							if(videoInputDevices.length > 1){
                            selectedDeviceId = videoInputDevices[1].deviceId
							} else {
                            selectedDeviceId = videoInputDevices[0].deviceId
							}
						}
                     
						if (videoInputDevices.length >= 1) {
							sourceSelect.html('');
							videoInputDevices.forEach((element) => {
                            const sourceOption = document.createElement('option')
                            sourceOption.text = element.label
                            sourceOption.value = element.deviceId
                            if(element.deviceId == selectedDeviceId){
                                sourceOption.selected = 'selected';
								}
                            sourceSelect.append(sourceOption)
							})
						}
 
						codeReader
							.decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
							.then(result => {
 
                                //hasil scan
                                console.log(result.text)
                                $("#hasilscan").val(result.text);
                                if(codeReader){
                                    codeReader.reset()
                                }
							})
                        .catch(err => console.error(err));             
						} else {
							alert("Camera not found!")
							}
						})
						.catch(err => console.error(err));
					}
					if (navigator.mediaDevices) {
						initScanner()
					} else {
						alert('Cannot access camera.');
						}
						
				</script>
				
			</div>
		</div>
		
	<div id="push"></div>
 </div>
 
<div id="footer">
      <div class="container">
			<p class="muted credit">Copyright <strong>&copy;</strong> 2022 Web-QR All rights reserved. Development By : <a href="http://educollabs.org">Smart Edutechno Collaboration</a></p>
      </div>
</div>

</body>

</html>