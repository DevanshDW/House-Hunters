<?php
if($_SESSION["USER_TYPE"]==""){
    $_SESSION["logout"]="You are not logged in, therefore you cannot logout!";
    header("location:index.php");
}
?>
<?php
session_unset();
session_destroy();
session_start();
$_SESSION['logout']='You have been logged out';
$_SESSION['USER_TYPE']='';
header("location:index.php");
exit();
?>