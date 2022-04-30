<?php
$connection = mysql_connect("localhost","root","biniamincontrol12");
if(!$connection){
    die("Database connection failed: ". mysql_error());
}
$selection = mysql_select_db("ams");
?>