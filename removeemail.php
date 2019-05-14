<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2019/5/14
 * Time: 下午 3:16
 */
$dbc = mysqli_connect('localhost','root','','elvis_store')
    or die('连接数据库错误');
$email = $_POST['email'];

$query = "DELETE FROM email_list WHERE email = '$email'";
mysqli_query($dbc,$query) or die('sql命令执行错误');

echo '邮箱:'.$email.'已移除';
mysqli_close($dbc);