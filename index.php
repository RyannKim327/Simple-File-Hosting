<?php
	include 'connection.php';
	if (isset($_GET['file'])) {
		$file = $_GET['file'];
		$sql = "SELECT * FROM files WHERE filename LIKE '%$file%' ORDER BY ID DESC";
	}else{
		$sql = "SELECT * FROM files ORDER BY ID DESC LIMIT 10";
	}
	$q = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to My Uploading Site</title>
	<meta name="description" content="A website developed under MPOP Reverse II.">
	<meta property="og:title" content="MPOP Reverse II's File hosting">
	<meta property="og:description" content="A simple website developed under MPOP Reverse II.">
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
		.a p{
			margin-left: 10px;
			margin-right: 10px;
		}
	</style>
</head>
<body>
	<div class="a">
		<div class="a" style="margin: 5px;">
			<h2>Welcome to MPOP Reverse II File Hosting</h2>
			<p style="cursor: pointer;" onclick="location.href='upload.php';">Upload a file:</p>	
		</div>
		<form align="center" method="get" style="margin-top: 10px; box-shadow: 0 0 0 transparent;">
			<input style="width: 85%;box-shadow: 0 0 0 transparent;border-style: solid;" class="a" type="search" id="s" name="file">
			<input type="submit" style="width: 13%;box-shadow: 0 0 0 transparent;border-style: solid;" class="a" onclick="location.href='?file='+s.value;" value="Search">
		</form>
	<?php
		foreach ($q as $_) {
			if (file_exists("mpop/" . basename($_['fileencrypt']))) {
				echo "<a href='info.php?file=" . $_['ID'] . "'><p>" . $_['filename'] . "</p></a>";
			}
		}
	?>
	</div>
</body>
</html>
