<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">


<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2019/5/14
 * Time: 下午 3:16
 */
$dbc = mysqli_connect('localhost','root','','elvis_store')
    or die('连接数据库错误');

if(isset($_POST['submit'])){
    foreach ($_POST['todelete'] as $delete_id){
        $query = "DELETE FROM email_list WHERE id = $delete_id";
        mysqli_query($dbc,$query) or die('Error querying database');
    }
    echo 'Customer removed.';
    echo '<br>';
}


$query = "SELECT * FROM email_list";
$result = mysqli_query($dbc,$query);

while($row = mysqli_fetch_array($result)){
    echo '<input type="checkbox" value="'.$row['id'].'" name = "todelete[]" />';
    echo $row['first_name'];
    echo ' '.$row['last_name'].' ';
    echo $row['email'];
    echo '<br>';
}
mysqli_close($dbc);



?>
    <input type="submit" name="submit" value="Remove">
</form>
