<?php
	include 'connection.php';
	if (isset($_GET['file'])) {
		$f = $_GET['file'];
		if($f == ''){
			header("Location: index.php");
		}
	}else{
		header("Location: index.php");
	}
	$q = mysqli_query($con,"SELECT * FROM files WHERE ID = $f");
	$fa = mysqli_fetch_array($q);
	if (isset($_GET['dl'])) {
		$dl = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM files WHERE ID = '$f'"))['downloads'] + 1;
		if (mysqli_query($con,"UPDATE files SET downloads = '$dl' WHERE ID = $f")) {
			download("mpop", $fa['fileencrypt'], $fa['filename']);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $fa['b']; ?></title>
	<meta name="description" content="<?php echo $fa['description']; ?>">
	<meta property="og:title" content="<?php echo $fa['filename']; ?>">
	<meta property="og:description" content="<?php echo $fa['description']; ?>">
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
			font-weight: bolder;
		}
	</style>
</head>
<body>
	<div class="a" style="padding: 10px;">
		<p align="center" class="a b"><?php echo $fa['filename']; ?></p>
		<table>
			<tr>
				<th>File name:</th>
				<td><?php echo $fa['filename']; ?></td>
			</tr>
			<tr>
				<th>File size:</th>
				<td><?php echo filesize("mpop/" . basename($fa['fileencrypt'])) . "bytes"; ?></td>
			</tr>
			<tr>
				<th>File type:</th>
				<td><?php echo explode(".", $fa['b'])[count(explode(".", $fa['filename'])) - 1]; ?></td>
			</tr>
			<tr>
				<th>Downloads:</th>
				<td><?php echo $fa['diwnloads']; ?></td>
			</tr>
		</table>
		<fieldset style="box-shadow: 3px 3px 5px #000000;border-radius: 5px; border-color: black;border-width: 1px;border-style: solid;">
			<legend style="background-clip: #dadaff;border-style: solid;border-radius: 5px;border-width: 1px;">Description:</legend>
			<?php echo str_replace(PHP_EOL, "<br>", $fa['description']); ?>
		</fieldset>
			<p align="center" style="cursor: pointer; padding: 5px;" class="a b" onclick="location.href='info.php?file=<?php echo $f;?>&dl';">Download</p>
		</center>
	</div>
</body>
</html>
<?php
	function download($a, $b, $c){
		if(file_exists($a . "/" . basename($b))){
			header('Content-Description: File Transfer');
		  	header('Content-Type: application/force-download');
		  	header("Content-Disposition: attachment; filename=\"" . basename($c) . "\";");
		  	header('Content-Transfer-Encoding: binary');
		  	header('Expires: 0');
		  	header('Cache-Control: must-revalidate');
		  	header('Pragma: public');
		  	header('Content-Length: ' . filesize($a . "/" . basename($b)));
		  	ob_clean();
		  	flush();
		  	readfile($a . "/" . basename($b));
		  	exit;
		}else{
			header("Location: ../index?exist=0");
		}
	}
?>
