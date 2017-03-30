<?php

echo "Welcome To Yehoda's Security Camera<br>";
echo ("<form action='index.php' method='get'>");

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

echo "You are connected from ".$ip."<br>";
$goodip =  "10.0.0.4";
	if($ip != $goodip){
		echo " Permission Denied! just ".$goodip." can acceses this service.";
		exit();
	}
?>
<input type="submit" name="camera" value="camera1">
<input type="submit" name="camera" value="camera2">
<input type="submit" name="camera" value="camera3">
<input type="submit" name="camera" value="camera4">

<?php


$tmppass = "";
$tmpuser = "";
if(isset($_GET["pass"])) $tmppass = $_GET["pass"];
if(isset($_GET["user"])) $tmpuser = $_GET["user"];

echo ("<br><input type='text' name='user' value='".$tmpuser."'>");
echo ("<br><input type='password' name='pass' value='".$tmppass."'>");
echo ("</form>");


if(isset($_GET["pass"]) && isset($_GET["user"])) {

	$mysqli = new mysqli('localhost', 'root', '123456', 'cameras');
	if ($mysqli->connect_errno) {
		echo "Sorry, this website is experiencing problems.(1)";
		exit();
	}

	$sql = "SELECT * FROM users WHERE user = '".$_GET["user"]."' AND pass = '".$_GET["pass"]."';";
	//echo ($sql);
	if (!$result = $mysqli->query($sql)) {
		echo "Sorry, the website is experiencing problems.(2)";
		exit();
	}

	if ($result->num_rows === 0) {
		echo "User or Password are incorrect! :/";
		exit();
	}

}




if(isset($_GET["camera"])){
	//echo "sh cameraView.sh"." ".$_GET["camera"];
	$pic = shell_exec("bash cameraView.sh"." ".$_GET["camera"]);
	echo $pic;
}else{exit();}


?>


<script> setTimeout(function(){window.location.reload(1);}, 3000);</script>


