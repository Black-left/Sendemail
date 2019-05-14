<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2019/5/14
 * Time: 上午 12:49
 */
$dbc = mysqli_connect('localhost','root','','elvis_store') or die('Error connecting to MYSQL server');

$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];

$query = "INSERT INTO email_list (first_name,last_name,email)".
"VALUES ('$first_name','$last_name','$email')";
//"SELECT * FROM email_list WHERE first_name = 'Martin'";
//"SELECT last_name FROM email_list WHERE first_name = 'Bubba'";

mysqli_query($dbc,$query) or die('Error querying database');

echo "客户添加成功";

mysqli_close($dbc);

?>