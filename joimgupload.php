<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: index.php");
}
?>
<?php
// Include the database configuration file
include 'config.php';
$statusMsg = '';
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "apcrm";

$client = mysqli_real_escape_string($conn, $_GET['client_id']);
$conn = mysqli_connect($hostname, $username, $password, $dbname);
// File upload path
$fileName = basename($_FILES["file"]["name"]);
$targetDir = "uploads/jobo/";
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert image file name into database
            $insert = $conn->query("INSERT into joimages (imgfile_name, uploaded_on, client_id) VALUES ('" . $fileName . "', NOW(), $client)");
            if ($insert) {
                $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
} else {
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
//redirects to the page previsous being edited
header("location: edit.php?e=$client");
?>