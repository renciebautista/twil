<!doctype html>
<html>
	<head>
		<title>Send A Text</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	</head>
	<body>
		<div class="container">
			<h1>Send A Text!</h1>
			<form action="/text" method="POST" role="form">
				<div class="form-group">
					<label for="phoneNumber">Phone Number</label>
					<input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Enter a mobile phone number">
				</div>
				<div class="form-group">
					<label for="message">Message</label>
					<textarea class="form-control" name="message" id="message" placeholder="Message"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Send Text</button>
			</form>
		</div>
	</body>
</html>