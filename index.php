<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
	<body>
		<h2>Checkboxes</h2>
		<p>The <strong>input type="checkbox"</strong> defines a checkbox:</p>

		<form id="formNameID"  >
		  <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
		  <label for="vehicle1"> I have a bike</label><br>
		  <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
		  <label for="vehicle2"> I have a car</label><br>
		  <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
		  <label for="vehicle3"> I have a boat</label><br><br>
		  <input type="submit" value="Submit">
		</form> 

		<input type="file" name="video_file" id="video_file" >
		<input type="text" id="img_url" />
		<script>
			// To assign event
			const startEvent = new Event("start");

			jQuery('#vehicle1').on('click',function(){
				// To trigger the Event
				document.dispatchEvent(startEvent);
			});

			// To trigger the event Listener
			// document.addEventListener("start", () => {
			//     console.log("The start event was triggered")
			//     alert('event triggered');
			// });

			jQuery(document).on('start', function(){
				alert('event triggered');
			});

			jQuery(document).ready(function () {
				$(document).on("change",'#video_file',function () {
		           
		            var dataURL = null

		            //generate thumbnail URL data
		            var video = document.createElement('video');;
		            var canvas = document.createElement('canvas');
		            var context = canvas.getContext('2d');

		            video.setAttribute('src', URL.createObjectURL( $(this)[0].files[0]));
		            // Load the video and show it


		            // Load metadata of the video to get video duration and dimensions
		            video.addEventListener('loadeddata', function() {
		                // Set canvas dimensions same as video dimensions
		                canvas.width = video.videoWidth;
		                canvas.height = video.videoHeight;

		                setTimeout( function(){

		                context.drawImage(video, 0, 0, canvas.width, canvas.height);
		                dataURL = canvas.toDataURL();

		                $('#img_url').val(dataURL);
		                //create img
		                //var img = document.createElement('img');
		                //img.setAttribute('src', dataURL);
		                //img.setAttribute('width','200px')

		                //append img in thumbnail div
		                //$('.video-thumbnail').html(img);
		                    
		                },2000);

		            });


		            //video.preload = 'metadata';
		           // video.muted = true;
		            //video.playsInline = true;
		            //video.setAttribute('crossOrigin', 'anonymous');
		            //video.src = $(this).data('src');
		            //video.play();

		            return true;
		        });
			});
		</script>
	</body>
</html>