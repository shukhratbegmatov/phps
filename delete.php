<?php
$id = $_GET['id'];
$avatar = $_GET['avatar'];

$link = mysqli_connect('localhost', 'root', '', 'employee');

$sql = "DELETE FROM users WHERE id = $id;";
mysqli_query($link, $sql);
mysqli_close($link);

unlink("uploads/$avatar");

header("Location: index.php");
?>