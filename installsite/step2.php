 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
   <style>

body{ 
    margin-top:40px; 
}

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<?php 

if(isset($_POST['db'])){
    $db = $_POST['db'];
    $host = $_POST['host'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $url = $_POST['url'];
   $path = file_get_contents($_POST['url'].'.env');

if (!empty($path)) {
    $old = array("DB_DATABASE=", "DB_HOST=","DB_PASSWORD=","DB_USERNAME=");
    $new   = array("DB_DATABASE=".$db,"DB_HOST=".$host,"DB_PASSWORD=".$pass,"DB_USERNAME=".$user);
    $str=str_replace($old,$new,$path);
    
    $urlpath = parse_url($url);
    file_put_contents($_SERVER['DOCUMENT_ROOT'].$urlpath['path'].'/'.'.env', $str);
 
// Name of the file
$install_file = $_SERVER['DOCUMENT_ROOT'].$urlpath['path'].'/'.'install.txt';
$filename = 'db.sql';
// MySQL host
$mysql_host = $host;
// MySQL username
$mysql_username = $user;
// MySQL password
$mysql_password = $pass;
// Database name
$mysql_database = $db;

// Connect to MySQL server
mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
    
    unlink($install_file);
    
    ?> 


 <div class="row">


    <div class="panel panel-primary" id="step-3">
        <div class="panel-body">
        <div class="col-xs-8">
            <?php if($_POST['step'] == 2){
    ?>
            <div class="col-md-8">
                <h3>Succesfully Installed!</h3>
            <p>Admin Email: admin@admin.com</p>
            <p>Admin Password: 123456 </p>
                <a href="<?php echo $_POST['url'] ?>/admin" class="btn btn-success btn-lg" type="submit">Go to  Admin Panel</a></br>
            <p>&nbsp;</p>
                <p><a href="<?php echo $_POST['url'] ?>" class="btn btn-success btn-lg" type="submit">Go to  Site</a></p>
                 </div>
            <?php } 
            else {
                
                ?>
             <h3>Sorry! There is a problem on the installetion!</h3>
            
            <?php
            }
            ?>
            </div>
        </div>
        <div class="panel-footer">
             <div class="col-md-8">
               
            </div>
            </div>
        </div>
           
    </div>
    
</form>
</div>
<?php 
    
}
    
?>

<?php 
    
}
    
?>


