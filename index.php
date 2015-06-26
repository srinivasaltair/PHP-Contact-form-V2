<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact Form</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/main.css">
	<script src="js/vendor/jquery-1.11.1.min.js"></script>
	<script src="js/vendor/bootstrap.js"></script>
</head>
<body>
	<div class="container">
		<h2>PHP Contact Form</h2>
		<br>
		<form name="contactform" id="form" action="" method="post">
			<label for="name">
				<p>Name:</p>
				<input type="text" name="name">
			</label>
			<br>
			<label for="email">
				<p>Email:</p>
				<input type="email" name="email">
			</label>
			<br>
			<label for="phoneno">
				<p>Phone Number:</p>
				<input type="number" name="phoneno">
			</label>
			<br>
			<label for="message">
				<p class="message">Message:</p>
				<textarea name="message" cols="30" ></textarea>
			</label>
			<br>
			<input type="submit" value="SEND" name="send">
		</form>
		<div>
			<h3 id="msg"></h3>
		</div>
	</div>

	<script>
	$(document).ready(function(){
		$("#form").submit(function(event) {

		    /* Stop form from submitting normally */
		    event.preventDefault();

		    /* Clear result div*/
		    $("#msg").html('');

		    /* Get some values from elements on the page: */
		    var values = $(this).serialize();

		    /* Send the data using post and put the results in a div */
		    $.ajax({
		        url: "sendmail.php",
		        type: "post",
		        data: values,
		        beforeSend: function(){
		        	$('#form').fadeOut(500);
		        },
		        success: function(data){
		            alert("success");
		            // $('#form').fadeOut(500);
		            $("#msg").html(data).fadeIn(500);
		        },
		        error:function(){
		            alert("failure");
		            $("#msg").html('There is error while submit');
		        }
		    });
		});
	});
	</script>
</body>
</html>