<?php
	include 'connection.php';
	$descr = post($_POST["description"]);
	$dir = "mpop/";
	$name = 'filen';
	$fn = $_FILES[$name]['name'];
	$ft = $_FILES[$name]['type'];
	$ftn = $_FILES[$name]['tmp_name'];
	$fe = $_FILES[$name]['error'];
	if(41943040 > $_FILES[$name]['size']){
		$fs = $_FILES[$name]['size'];
		//echo $fn . "<br>" . $fs . "<br>" . $ft . "<br>" . $ftn .  "<br>" . $fe;
		$tf = $dir . mt_rand(10000,1000000000) . "_" .  basename($ftn);
		if(file_exists($tf)){
			echo "Existed";
		}else{
			if(move_uploaded_file($ftn, $tf)){
				$q = mysqli_query($con,"INSERT INTO files (filename, description, fileencrypt) VALUES ('$fn','$descr','$tf')");
				if($q){
					header("Location: index.php");
				}else{
					echo "SQL Error";
				}
			}else{
				echo "File Error " . basename($ftn);
			}
		}
	}
	function post($name){
		include 'connection.php';
		$from_arr = array("<",">");
		$to_arr = array("&lt;","&gt;");
		return str_replace($from_arr, $to_arr, mysqli_real_escape_string($con,$name));
	}
?>
