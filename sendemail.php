<h1>makemeelvis.com</h1>
<h2>private:</h2>
<p>For eimer's user only write and send an emial to malling list members.</p>

<?php
/**
 * Created by PhpStorm.
 * User: BlackLeft
 * Date: 2019/5/14
 * Time: 下午 1:55
 */
if(isset($_POST['submit'])){
    $from = '923600739@qq.com';
    $subject = $_POST['subject'];
    $text = $_POST['elvismail'];
    $output_form = false;

    if ((!empty($subject)) && (!empty($text))) {
        $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store') or die('Error connection to MYSQL server.');

        $query = "SELECT * FROM email_list";
        $result = mysqli_query($dbc, $query) or die('Error querying database.');

        while ($row = mysqli_fetch_array($result)) {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $msg = "Dear $first_name $last_name,\n $text";
            $to = $row['email'];
            mail($to, $subject, $msg, 'From:' . $from);
            echo 'Email sent to :' . $to . '<br />';
        }

        mysqli_close($dbc);
    }
    if((empty($subject)) && (empty($text)) ){
        echo 'You forgot the email subject and body text';
        $output_form = true;
    }
    if((empty($subject))&&(!empty($text))){
        echo 'you forgot the email subject';
        $output_form = true;
    }
    if((!empty($subject))&&(empty($text))){
        echo 'you forgot the email body text';
        $output_form = true;
    }
}else{
    $output_form = true;
}
if($output_form){
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="subject">Subject of email:</label>
        <br>
        <input type="text" id="subject" name="subject" size="30" value="<?php echo $subject ?>">
        <br>
        <label for="elvismail">Body of email:</label>
        <br>
        <textarea name="elvismail" id="elvismail" cols="40" rows="8" ><?php echo $text ?></textarea><br>
        <input type="submit" value="Submit" name="submit">
    </form>

<?php
}
?>