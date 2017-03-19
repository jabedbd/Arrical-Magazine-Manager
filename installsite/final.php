<?php

if(isset($_POST['db'])){
    $db = $_POST['db'];
    $host = $_POST['host'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $url = $_POST['url'];
}

?>



<h3>Succesfully Installed!</h3>
            <p>Admin Email: <?php echo $email ?></p>
            <p>Admin Password: <?php echo $password ?></p>
                <a href="<?php echo $_POST['url'] ?>/admin" class="btn btn-success btn-lg" type="submit">Go to  Admin Panel</a></br>
            <p>&nbsp;</p>
                <p><a href="<?php echo $_POST['url'] ?>" class="btn btn-success btn-lg" type="submit">Go to  Site</a></p>
                 </div>



<?php
if(isset($_POST['db'])){
 $install_file = $_SERVER['DOCUMENT_ROOT'].$urlpath['path'].'/'.'install.txt';   

// Create connection
$conn = new mysqli($host, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$hash_pass = crypt($password);

$sql = "UPDATE `settings`   
   SET `magazine` = $name
 WHERE `id` = 1";
$sql .= "UPDATE `users`   
   SET `name` = $username,
       `password` = $hash_pass,
 WHERE `id` = 1";

if ($conn->multi_query($sql) === TRUE) {
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
unlink($install_file);

    
}
             
?>



