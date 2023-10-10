<?php
require('conn.php');


$sql = "DELETE FROM users where id=$id";
$con->query($sql);


header("Location : admin.php");
?>