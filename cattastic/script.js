jQuery(document).ready(function ($) {

	//WHen user clicks image, make sure 'href' attribute doesn't work so user stays on same page
	$("img").on('click', function (e) {
		return false;
	});

	$("img").on('click', function (e) {

		//Create temporary variable to hold the img DOM object
		var temp = this;

		//Create variable for AJAX request
		var xhr;

		if (window.XMLHttpRequest) xhr = new XMLHttpRequest(); 	// Create for all browsers except Internet Explorer
		else xhr = new ActiveXObject("Microsoft.XMLHTTP"); 		// for Internet Explorer
 
		var url = 'http://thecatapi.com/api/images/get?api_key=MjEwNDQ3&format=html&&size=med';		
		xhr.open('GET', url, false);
		xhr.onreadystatechange = function () {

			if (xhr.readyState===4 && xhr.status===200) {
				
				//Replace image with new image from AJAX api call
				$(temp).replaceWith(xhr.responseText);

				//testing
				console.log("AJAX call successful");
				
			}

		}

		xhr.send();

	});

});