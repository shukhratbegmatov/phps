<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$avatar = $_FILES['avatar']['name'];
	
	$link = mysqli_connect('localhost', 'root', '', 'employee');
	$sql = "INSERT INTO users(name, avatar) VALUES('$name', '$avatar');";
	mysqli_query($link, $sql);
	mysqli_close($link);
	
	move_uploaded_file($_FILES['avatar']['tmp_name'], "uploads/" . $avatar);
	header("Location: index.php");
}
?>