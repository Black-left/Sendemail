<script>
    window.scrollTo(0,document.body.scrollHeight);
</script>
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

/*
 * 模拟添加百万级数据
 * 需要优化removeemail页面进行一个懒加载
 * */
/*
$first_name = "firstname_";
$last_name = "lastname_";
for($i = 0; $i<3000000 ; $i++){
    static $intOne = 99999999;
    static $intTwo = 99999999;
    static $int = 931239361;
    $first = $intOne+$i;
    $last = $intTwo + $i;
    $email = $int."@qq.com";
    $query = "INSERT INTO email_list (first_name,last_name,email)".
        "VALUES ('$first','$last','$email')";
    mysqli_query($dbc,$query) or die ('Error querying database');
    $int = $int + 2;
    echo $int."添加成功<br>";
}*/

mysqli_query($dbc,$query) or die('Error querying database');

echo "客户添加成功";

mysqli_close($dbc);

?>