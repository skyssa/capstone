<?php 
session_start();
require("../includes/config.php");
 
function timeAgo($timestamp) {
    $currentTimestamp = time();
    $timeDifference = $currentTimestamp - $timestamp;

    $seconds = $timeDifference;
    $minutes = round($seconds / 60);           // value 60 is seconds
    $hours   = round($seconds / 3600);         // value 3600 is 60 minutes * 60 sec
    $days    = round($seconds / 86400);        // value 86400 is 24 hours * 60 minutes * 60 sec
    $weeks   = round($seconds / 604800);       // value 604800 is 7 days * 24 hours * 60 minutes * 60 sec
    $months  = round($seconds / 2629440);      // value 2629440 is ((365+365+365+365+366)/5/12) days * 24 hours * 60 minutes * 60 sec
    $years   = round($seconds / 31553280);     // value 31553280 is ((365+365+365+365+366)/5) days * 24 hours * 60 minutes * 60 sec

    if ($seconds <= 60) {
        return "Just Now";
    } elseif ($minutes <= 60) {
        return ($minutes == 1) ? "one minute ago" : "$minutes minutes ago";
    } elseif ($hours <= 24) {
        return ($hours == 1) ? "an hour ago" : "$hours hours ago";
    } elseif ($days <= 7) {
        return ($days == 1) ? "yesterday" : "$days days ago";
    } elseif ($weeks <= 4.3) {  // 4.3 == 30/7
        return ($weeks == 1) ? "a week ago" : "$weeks weeks ago";
    } elseif ($months <= 12) {
        return ($months == 1) ? "a month ago" : "$months months ago";
    } else {
        return ($years == 1) ? "a year ago" : "$years years ago";
    }
}






if(isset($_POST['fetch_msg']) && isset($_POST['incoming_id']) && isset($_SESSION['fullname']) && isset($_SESSION['user_id'])){
    $email = $_SESSION['fullname'];
    $user_id = $_SESSION['user_id'];
    
    $outgoing_id = mysqli_real_escape_string($conn, $user_id);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

    $query_user = mysqli_query($conn, "SELECT * FROM user_msg INNER JOIN tbl_user ON tbl_user.user_id = user_msg.outgoing_id WHERE outgoing_id='$outgoing_id' AND incoming_id='$incoming_id' OR outgoing_id='$incoming_id' AND incoming_id='$outgoing_id' ORDER BY 1 ASC");

    $count = mysqli_num_rows($query_user);
    if($count > 0){
        while($data =mysqli_fetch_assoc($query_user)){
            if($data['outgoing_id'] == $outgoing_id){//this will check if we are the sender
                echo '
                
                <div id="chat" class="msg incoming">
                    <div class="details" >';
                    if (!empty($data['files'])) {
                        echo'<span>' .timeAgo(strtotime($data['date_send'])) .'</span><p data-id="'.$data['user_id'].'">'.$data['messages'].' 
                        
                        <br><a href="uploads/' . $data['files'] . '" download style="color: white; text-decoration: none; font-weight: bold;">'.$data['files'].'</a></p>
                        ';
                    }else{
                        echo '<span>' .timeAgo(strtotime($data['date_send'])) .'</span><p data-id="'.$data['user_id'].'">'.$data['messages'].'</p>
                        ';
                    }

                    
                 echo'   
                    </div>
                </div>
                ';
            }else{//this will be receiver by default
                
                echo '
                <div id="chat" class="msg outgoing">
                    <div class="details">';
                    if (!empty($data['files'])) {
                        echo'<span>' .timeAgo(strtotime($data['date_send'])) .'</span><p data-id="'.$data['user_id'].'">'.$data['name'].': '.$data['messages'].' 
                        
                        <br><a style="text-decoration: none; color: white; href="uploads/' . $data['files'] . '" download ">'.$data['files'].'</a></p>
                        ';
                    }else{
                        echo '<span>' .timeAgo(strtotime($data['date_send'])) .'</span><br>
                        <span>'.$data['name'].'</span>
                        <p data-id="'.$data['user_id'].'">'.$data['messages'].'</p>
                        ';
                    }

                    
                 echo'   
                    </div>
                </div>
                ';
            }
        }
    }else{
        echo "Null".mysqli_error($conn);
        die;
    }

    
}  
else{
    header("location: ../role.php");
    die;
}


?>