<!DOCTYPE html>
<html>
<head>
	<title>Welcome to My Uploading Site</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimal-ui">
	<style type="text/css">
		body{
			user-select: none;
		}
		.a{
			background-color: #dadaff;
			color: #000000;
			box-shadow: 3px 3px 5px #000000;
			padding: 3px;
			border-radius: 10px;

		}
		.b{
			margin-top: 5px;
			margin-bottom: 5px;
		}
	</style>
</head>
<body>
	<form class="a" action="a_a.php" method="POST" enctype="multipart/form-data">
		<label class="a b" style="display: block;margin: 5px; font-weight: bolder;">
			File:
			<input style="width: 97%;" type="file" name="filen"><br>
		</label>
		<label style="font-weight: bolder;">&emsp;Description:
			<textarea class="a b" style="resize: none; height: 100px;width: 99%;" name="description"></textarea><br>
		</label><br>
		<input class="a b" style="width: 100%;" type="submit" value="Send">
	</form>
</body>
</html>
