<?php 
session_start();
include "../includes/config.php"; 

$method = $_POST['method'];

if(function_exists($method)){ //fnSave
    call_user_func($method);
}
else{
    echo "Function not exists";
}




function fnSaveProfile(){
    global $conn;
    $id=$_SESSION['user_id'];
    $school_id= $_POST['school_id'];
    $fullname= $_POST['fullname'];
    $email= $_POST['email'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $acadyr=$_POST['acadyr'];
    $role_in_school= $_POST['role_in_school'];
    $department= $_POST['department'];
    // $pic= $_POST['pic'];
    $pic = $_FILES['profile']['name'];
    $folder = '../uploads/';
    $destination = $folder . $pic;
    move_uploaded_file($_FILES['profile']['tmp_name'],$destination);

    // $cover= $_POST['cover'];
    $cover = $_FILES['cover']['name'];
    $folder = '../uploads/';
    $destination = $folder . $cover;
    move_uploaded_file($_FILES['cover']['tmp_name'],$destination);

    if($_SESSION['user_type']=='Teacher'){
        $query = $conn->prepare('INSERT INTO users(`uid`,school_id,fullname,email,`address`,`number`,role_in_school,department,pic,cover,date_registered,`status`,approval) 
        VALUES(?,?,?,?,?,?,?,?,?,?,now(),"active","pending")');
        var_dump($query);
        $query->bind_param('iisssissss',$id,$school_id,$fullname,$email,$address,$number,$role_in_school,$department,$pic,$cover);
         
        if($query->execute()){
            echo 1;
        }
        else{
            echo json_encode(mysqli_error($conn));
        }   

   }else if($_SESSION['user_type']=='Student'){
        $query = $conn->prepare('INSERT INTO users(`uid`,school_id,fullname,email,`address`,`number`,yr_sec,acadyr,role_in_school,department,pic,cover,date_registered,`status`,approval) 
        VALUES(?,?,?,?,?,?,?,?,?,?,now(),"active","pending")');
        var_dump($query);
        $query->bind_param('iisssissss',$id,$school_id,$fullname,$email,$address,$number,$role_in_school,$department,$pic,$cover);
            
        if($query->execute()){
            echo 1;
        }
        else{
            echo json_encode(mysqli_error($conn));
        }

   }else if($_SESSION['user_type']=='Alumni'){
        $query = $conn->prepare('INSERT INTO users(`uid`,school_id,fullname,email,`address`,`number`,acadyr,role_in_school,department,pic,cover,date_registered,`status`,approval) 
        VALUES(?,?,?,?,?,?,?,?,?,?,?,now(),"active","pending")');
        var_dump($query);
        $query->bind_param('iisssisssss',$id,$school_id,$fullname,$email,$address,$number,$acadyr,$role_in_school,$department,$pic,$cover);
        
        if($query->execute()){
            echo 1;
        }
        else{
            echo json_encode(mysqli_error($conn));
        }
    }  
}
function fnSaveUser(){
    global $conn;
    $last_name= $_POST['last_name'];
    $first_name= $_POST['first_name'];
    $middle_name= $_POST['middle_name'];
    $username = $_POST['username'];
    $pword = $_POST['password'];
    $gender= $_POST['gender'];
    $addr= $_POST['address'];
    $phone_number= $_POST['phone_number'];
    $email= $_POST['email'];
    $user_type= $_POST['user_type'];
    $query = $conn->prepare('INSERT INTO tb_users(last_name,first_name,middle_name,username,"password",gender,"address",phone_number,email,user_type,"status") 
    VALUES($last_name,$first_name,$middle_name,$username,$pword,$gender,$addr,$phone_number,$email,$user_type,1)');
    var_dump($query);
    $query->bind_param('sssssssiss',$last_name,$first_name,$middle_name,$username,$pword,$gender,$addr,$phone_number,$email,$user_type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}


function fnSavePost(){
    global $conn;
    $id=$_POST['id'];
    $user=$_POST['name'];
    $description= $_POST['description']; 
    

    $filename = $_FILES['productimage']['name'];
    $folder = '../uploads/';
    
    $destination = $folder . $filename;
    move_uploaded_file($_FILES['productimage']['tmp_name'],$destination);


    $query = $conn->prepare('INSERT INTO tbl_post(user_id,names,`description`,image,date_created,isdeleted) values(?,?,?,?,now(),1)');
    $query->bind_param('isss',$id,$user,$description,$filename);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnGetPost(){
    global $conn;

    $query = $conn->prepare("call sp_displayPost");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        
        $data[] = $row;
    }

    echo json_encode($data);

}

function fnUpdatePost(){
    global $conn;
    $post_id = $_POST['post_id'];
    $names = $_POST['names'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $sql = "UPDATE tbl_post SET names=?, description=?, image=? WHERE post_id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sssi', $names, $description, $image, $post_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
       
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function fnDeletePost(){
    global $conn;
        $post_id = $_POST['post_id'];
        $sql = "DELETE tbl_post, tbl_reports, tbl_comments
        FROM tbl_post
        LEFT JOIN tbl_comments ON tbl_post.post_id = tbl_comments.pos_id
        LEFT JOIN tbl_reports ON tbl_post.post_id = tbl_reports.post_id
        WHERE tbl_post.post_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $post_id);

        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            echo 1; // Success
        } else {
            echo 0; // Failure
            
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        
}


function fnSaveAnnouncement(){
    global $conn;
    $title= $_POST['title'];
    $description= $_POST['description']; 

    $query = $conn->prepare('call sp_saveAnnounce(?,?,now(),1)');
    //$query = $conn->prepare('INSERT INTO tbl_announcement(title,`description`,date_created,isdeleted) values(?,?,now(),1)');
    $query->bind_param('ss',$title,$description);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnGetAnnouncement(){
    global $conn;

    $query = $conn->prepare("call sp_displayAnnounce");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);

}
function fnUpdateAnnounce(){
    global $conn;
    $id = $_POST['a_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
  

    $sql = "UPDATE tbl_announcement SET title=?, description=?  WHERE a_id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssi', $title, $description, $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
       
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
function fnDeleteAnnounce(){
    global $conn;
    $id = $_POST['a_id'];
        $sql = "DELETE FROM tbl_announcement WHERE a_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);

        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            echo 1; // Success
        } else {
            echo 0; // Failure
            
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        
}


function fnSaveEvent(){
    global $conn;
    $title= $_POST['title'];
    $events= $_POST['events'];
    $date=$_POST['date'];

    $query=$conn->prepare('call sp_saveEvents(?,?,?,now())');
    //$query = $conn->prepare('INSERT INTO tbl_events(title,date,`event`,date_posted) values(?,?,?,now())');
    $query->bind_param('sss',$title,$date,$events);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnGetEvent(){
    global $conn;

    $query = $conn->prepare("call sp_displayEvents()");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);

}


function fnAddComment(){
    global $conn;
    $id=$_SESSION['user_id'];
    $uname=$_SESSION['fullname'];
    $post_id = $_POST['post_id'];
    $comment_text = $_POST['comment_text'];

    $sql = "INSERT INTO `tbl_comments`( `pos_id`, `user_id`, `uname`, `comment`, `date`, `isapprove`) VALUES (?,?,?, ?, NOW(),0)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'iiss', $post_id,$id,$uname, $comment_text);

    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }


    mysqli_stmt_close($stmt);
    mysqli_close($conn);
   
}

function fnGetcomment(){
    global $conn;
    $post_id = $_POST['post_id'];

    $query = $conn->prepare("SELECT * FROM tbl_comments WHERE pos_id=? ORDER BY tbl_comments.date DESC");
    $query->bind_param('i',$post_id);
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);

}
function fnUpdateComment(){
    global $conn;
    $comment_id = $_POST['comment_id'];
    $names = $_POST['uname'];
    $description = $_POST['comment'];
  

    $sql = "UPDATE tbl_comments SET uname=?, comment=?  WHERE comment_id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssi', $names, $description, $comment_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
       
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
function fnDeleteComment(){
    global $conn;
        $comment_id = $_POST['comment_id'];
        $sql = "DELETE FROM tbl_comments WHERE comment_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $comment_id);

        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            echo 1; // Success
        } else {
            echo 0; // Failure
            
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        
}
function fnReportPost(){
    global $conn;
    $id=$_POST['post_id'];
    $report=$_POST['reason'];

    $query = $conn->prepare('INSERT INTO tbl_reports(post_id,report_type,date_reported) values(?,?,now())');
    $query->bind_param('is',$id,$report);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

    // mysqli_stmt_close($stmt);

    //     // Close the database connection
    //     mysqli_close($conn);
    // } else {
    //     echo 'Invalid request method.';
    // }
}

function fnSaveRegister(){
    global $conn;
    $fname=$_POST['fullname'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $user_type=$_POST['user_type'];
    $dep_type=$_POST['dep_type'];
    $user_id=$_POST['user_id'];

    $query = $conn->prepare('INSERT INTO tbl_user(fullname,username,password,user_type,dep_type,isdeleted,date_created) values(?,?,?,?,?,1,now())');;
    $query->bind_param('sssss',$fname,$username,$password,$user_type,$dep_type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
        
    }
}
 //


function fnLogin(){
    global $conn;
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = $conn->prepare("call sp_savelogin(?,?)");
    // call sp_savelogin(?,?)
    $query->bind_param('ss',$username,$password);
    $query->execute();
    $result = $query->get_result();
    $ret = '';
    //$data = array();
    while($row = $result->fetch_array()){
        //$data[]=$row;
        if($row['ret'] == 1 ){
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['fullname'] = $row['name'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['dep_type'] = $row['dep_type'];
           
        }
        $ret= $row['ret'];
        // $ret = 1;
        //$_SESSION['username'] = $row['username'];
    }
    //echo json_encode($data);
    echo $ret;
    
}



function fnChat(){
    global $conn;
    $toUser = $_POST['to'];
    $fromUser= $_POST['from'];
    $msg = $_POST['msg'];
    
    $query = $conn->prepare('INSERT INTO message(`touser`,`fromuser`,`message`) VALUES(?,?,?)');
    $query->bind_param('iis',$toUser,$fromUser,$msg);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }
}

// department side
function fnSavebsit(){
    global $conn;
    $id=$_POST['id'];
    $name=$_POST['name'];
    // $title= $_POST['title'];
    $description= $_POST['description']; 
    

    $filename = $_FILES['productimage']['name'];
    $folder = '../uploads/';
    $destination = $folder . $filename;
    move_uploaded_file($_FILES['productimage']['tmp_name'],$destination);

    $query = $conn->prepare('INSERT INTO tbl_postbsit(user_id,names,`description`,image,date_created,isdeleted) values(?,?,?,?,now(),1)');
    $query->bind_param('isss',$id,$name,$description,$filename);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}

function fnGetbsit(){
    global $conn;

    $query = $conn->prepare("SELECT * FROM tbl_postbsit");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        
        $data[] = $row;
    }

    echo json_encode($data);

}


function fnEventBsit(){
    global $conn;
    $title= $_POST['title'];
    $events= $_POST['events'];
    $date=$_POST['date'];

    $query = $conn->prepare('INSERT INTO bsitevents(title,date,`event`,date_posted) values(?,?,?,now())');
    $query->bind_param('sss',$title,$date,$events);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnGetEbsit(){
    global $conn;

    $query = $conn->prepare("SELECT * FROM bsitevents");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);

}




function fnAnnounceBsit(){
    global $conn;
    $title= $_POST['title'];
    $description= $_POST['description']; 

    $query = $conn->prepare('INSERT INTO bsitannouncement(title,`description`,date_created,isdeleted) values(?,?,now(),1)');
    $query->bind_param('ss',$title,$description);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnGetAbsit(){
    global $conn;

    $query = $conn->prepare("SELECT * FROM bsitannouncement");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);

}






?>