<?php
include "config.php";
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "apcrm";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$sql = mysqli_query($conn, "SELECT * FROM users");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
}
?>
<?php include_once "header.php"; ?>

<body class="relative bg-gray-100">
    <?php include_once "menu.php" ?>
    <div class="md:grid md:grid-cols-3 md:gap-6 md:p-4 sm:p-0 p-2">
        <div></div>
        <div>
            <div class="mt-4 md:mt-0 md:col-span-3">
                <div class="sm:rounded-md sm:overflow-hidden ">
                    <div class="px-2 py-3 bg-white space-y-4 sm:p-4 border-gray-300 border rounded-md mb-3">

                        <section class="chat-area grid gap-2">
                            <header>
                                <link rel="stylesheet" type="text/css" href="css/style2.css">
                                <?php
                                $user_id = mysqli_real_escape_string($conn, $_GET['chat']);
                                $sql = mysqli_query($conn, "SELECT * FROM users");
                                if (mysqli_num_rows($sql) > 0) {
                                    $row = mysqli_fetch_assoc($sql);
                                } else {
                                    header("location: home.php");
                                }
                                ?>
                                <a href="home.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                                <div class="details">
                                    <span><?php echo "<a href='profile.php?user_id=" . $user_id . "'<button>" . $user_id . "</button></a>" ?></span>
                                </div>
                            </header>
                            <div class="chat-box">

                            </div>
                            <form action="#" class="typing-area">
                                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                                <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                                <button><i class="fab fa-telegram-plane"></i></button>
                    </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!--chat js script-->
    <script src="javascript/chat.js"></script>
</body>

</html>