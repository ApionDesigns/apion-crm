<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: ./index");
}
?>
<?php
echo $_SESSION['user_uid'];
?>