<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2019/5/14
 * Time: 下午 1:55
 */
$from = '923600739@qq.com';
$subject = $_POST['subject'];
$text = $_POST['elvismail'];
$dbc = mysqli_connect('localhost','root','','elvis_store') or die('Error connection to MYSQL server.');

$query = "SELECT * FROM email_list";
$result = mysqli_query($dbc,$query) or die('Error querying database.');

while($row = mysqli_fetch_array($result)){
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $msg = "Dear $first_name $last_name,\n $text";
    $to = $row['email'];
    mail($to,$subject,$msg,'From:'.$from);
    echo 'Email sent to :'.$to.'<br />';
}

mysqli_close($dbc);