<?php
$openid=$_POST["openid"];
$did=$_POST["did"];
$sid=$_POST["sid"];
$con = mysqli_connect("linux.deginx.com","fuck_yss","AidXiJnSdZdRM8jR","fuck_yss");
$sql = "INSERT INTO user_data(openid,did,sid)VALUES('$openid','$did','$sid')";
mysqli_query($con,$sql);
echo $sql;