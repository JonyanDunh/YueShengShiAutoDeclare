<?php
$con = mysqli_connect("linux.deginx.com","fuck_yss","AidXiJnSdZdRM8jR","fuck_yss");
$sql = "select * from user_data";
$res=mysqli_query($con,$sql);
while ($row = mysqli_fetch_object($res)) {
$url='http://fuck_yss_task.deginx.com/do_task.php?openid='.$row->openid.'&did='.$row->did.'&sid='.$row->sid;
$html = file_get_contents($url);
echo $html;
}