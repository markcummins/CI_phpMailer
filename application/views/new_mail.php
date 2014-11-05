<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	
</head>
<body>

<div id="container">
	<br/>
	<form method="post" enctype="multipart/form-data">
		<table>
			<tr><td>To: 		</td><td>	<input placeholder="someone@something.ie" name="recipient" type="text"/>	</td></tr>
			<tr><td>Subject: 	</td><td>	<input name="subject" type="text"/>		</td></tr>
			<tr><td>Message: 	</td><td>	<textarea name="message"></textarea>	</td></tr>
			<tr><td>File Name: 	</td><td>	<input placeholder="custom name of file" name="filename" type="text"/>	</td></tr>
			<tr><td>File: 		</td><td>	<input type="file" name="attach_file"/>	</td></tr>
			<tr><td><button>Send</button></td></tr>
		</table>
	</form>
	<br/><i>"Dont forget to config the mailer - Open application->models->email_model and read the comments"</i>
	
</div>

</body>
</html>