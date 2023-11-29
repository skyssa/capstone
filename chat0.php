<?php
session_start();
include 'config.php';  // Your database configuration file

if (!isset($_SESSION['fullname'])) {
    header("location: sign-in.php");
    exit();
}

$fullname = $_SESSION['fullname'];
$query = "SELECT * FROM tbl_user WHERE fullname = '$fullname'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    header("location: sign-in.php");
    exit();
}
?>

<div class="wrapper">
    <section class="chat-area">
        <header>
            <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <div class="details">
                <span><?php echo $row['fullname']; ?></span>
            </div>
        </header>
        <div class="chat-box" id="chatBox">
            <!-- Display chat messages here -->
        </div>
        <form id="messageForm" class="typing-area">
            <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $row['user_id']; ?>" hidden>
            <input type="text" name="message" id="messageInput" class="input-field" placeholder="Type a message here..." autocomplete="off">
            <button type="submit"><i class="fab fa-telegram-plane"></i></button>
        </form>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="/jsfiles/chat.js"></script>
