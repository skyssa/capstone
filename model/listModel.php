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
        $yrsec=$_POST['yrsec'];
        $acadyr=$_POST['acadyr'];
        $query = $conn->prepare('INSERT INTO users(`uid`,school_id,fullname,email,`address`,`number`,yr_sec,acadyr,role_in_school,department,pic,cover,date_registered,`status`,approval) 
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,now(),"active","pending")');
        var_dump($query);
        $query->bind_param('iisssissssss',$id,$school_id,$fullname,$email,$address,$number,$yrsec,$acadyr,$role_in_school,$department,$pic,$cover);
            
        if($query->execute()){
            echo 1;
        }
        else{
            echo json_encode(mysqli_error($conn));
        }

   }else if($_SESSION['user_type']=='Alumni'){
        
        $acadyr=$_POST['acadyr'];
        $query = $conn->prepare('UPDATE users SET school_id=?, fullname=?, email=?, address=?, number=?, acadyr=?, role_in_school=?, department=?, pic=?, cover=?, date_registered=now(), status="active", approval="pending" WHERE uid=?');
       
     

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
    $type="homepage";

    $filename = $_FILES['productimage']['name'];
    $folder = '../uploads/';
    
    $destination = $folder . $filename;
    move_uploaded_file($_FILES['productimage']['tmp_name'],$destination);


    $query = $conn->prepare('INSERT INTO post(user_id,names,`description`,image,date_created,isdeleted,type) values(?,?,?,?,now(),1,?)');
    $query->bind_param('issss',$id,$user,$description,$filename,$type);
    
    if($query->execute()){
        $query = $conn->prepare('INSERT INTO notif(user_id,names,`description`,image,date_created,isdeleted,type,n_read) values(?,?,?,?,now(),1,?,1)');
        $query->bind_param('issss',$id,$user,$description,$filename,$type);
        if($query->execute()){
            echo 1;
        }
        else{
            echo json_encode(mysqli_error($conn));
        }

        
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnGetPost(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM post WHERE type="homepage" ORDER BY date_created DESC');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        
        $data[] = $row;
    }

    echo json_encode($data);

}

function fnSavebsit(){
    global $conn;
    $id=$_POST['id'];
    $user=$_POST['name'];
    $description= $_POST['description']; 
    $type="bsit";

    $filename = $_FILES['productimage']['name'];
    $folder = '../uploads/';
    
    $destination = $folder . $filename;
    move_uploaded_file($_FILES['productimage']['tmp_name'],$destination);


    $query = $conn->prepare('INSERT INTO post(user_id,names,`description`,image,date_created,isdeleted,type) values(?,?,?,?,now(),1,?)');
    $query->bind_param('issss',$id,$user,$description,$filename,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}

function fnGetbsit(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM post WHERE type="bsit" ORDER BY date_created DESC');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        
        $data[] = $row;
    }

    echo json_encode($data);


}

function fnSavebsed(){
    global $conn;
    $id=$_POST['id'];
    $user=$_POST['name'];
    $description= $_POST['description']; 
    $type="bsed";

    $filename = $_FILES['productimage']['name'];
    $folder = '../uploads/';
    
    $destination = $folder . $filename;
    move_uploaded_file($_FILES['productimage']['tmp_name'],$destination);


    $query = $conn->prepare('INSERT INTO post(user_id,names,`description`,image,date_created,isdeleted,type) values(?,?,?,?,now(),1,?)');
    $query->bind_param('issss',$id,$user,$description,$filename,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}


function fnSaveBeed (){
    global $conn;
    $id=$_POST['id'];
    $user=$_POST['name'];
    $description= $_POST['description']; 
    $type="beed";

    $filename = $_FILES['productimage']['name'];
    $folder = '../uploads/';
    
    $destination = $folder . $filename;
    move_uploaded_file($_FILES['productimage']['tmp_name'],$destination);


    $query = $conn->prepare('INSERT INTO post(user_id,names,`description`,image,date_created,isdeleted,type) values(?,?,?,?,now(),1,?)');
    $query->bind_param('issss',$id,$user,$description,$filename,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnSaveBshm(){
    global $conn;
    $id=$_POST['id'];
    $user=$_POST['name'];
    $description= $_POST['description']; 
    $type="bshm";

    $filename = $_FILES['productimage']['name'];
    $folder = '../uploads/';
    
    $destination = $folder . $filename;
    move_uploaded_file($_FILES['productimage']['tmp_name'],$destination);


    $query = $conn->prepare('INSERT INTO post(user_id,names,`description`,image,date_created,isdeleted,type) values(?,?,?,?,now(),1,?)');
    $query->bind_param('issss',$id,$user,$description,$filename,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnSavealumni(){
    global $conn;
    $id=$_POST['id'];
    $user=$_POST['name'];
    $description= $_POST['description']; 
    $type="bsitalumni";

    $filename = $_FILES['productimage']['name'];
    $folder = '../uploads/';
    
    $destination = $folder . $filename;
    move_uploaded_file($_FILES['productimage']['tmp_name'],$destination);


    $query = $conn->prepare('INSERT INTO post(user_id,names,`description`,image,date_created,isdeleted,type) values(?,?,?,?,now(),1,?)');
    $query->bind_param('issss',$id,$user,$description,$filename,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function Alumni(){
    global $conn;
    $id=$_POST['id'];
    $user=$_POST['name'];
    $description= $_POST['description']; 
    $type="alumni";

    $filename = $_FILES['productimage']['name'];
    $folder = '../uploads/';
    
    $destination = $folder . $filename;
    move_uploaded_file($_FILES['productimage']['tmp_name'],$destination);


    $query = $conn->prepare('INSERT INTO post(user_id,names,`description`,image,date_created,isdeleted,type) values(?,?,?,?,now(),1,?)');
    $query->bind_param('issss',$id,$user,$description,$filename,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnGetAlumni(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM post WHERE type="bsitalumni" ORDER BY date_created DESC');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        
        $data[] = $row;
    }

    echo json_encode($data);

}
function GetAlumni(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM post WHERE type="alumni" ORDER BY date_created DESC');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        
        $data[] = $row;
    }

    echo json_encode($data);

}
function fnGetbeed(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM post WHERE type="beed" ORDER BY date_created DESC');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        
        $data[] = $row;
    }

    echo json_encode($data);

}
function fnGetbshm(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM post WHERE type="bshm" ORDER BY date_created DESC');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        
        $data[] = $row;
    }

    echo json_encode($data);

}
function fnGetbsed(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM post WHERE type="bsed" ORDER BY date_created DESC');
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

    $sql = "UPDATE post SET names=?, description=?, image=? WHERE post_id=?";
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
        $sql = "DELETE post, tbl_reports, comments
        FROM post
        LEFT JOIN comments ON post.post_id = comments.pos_id
        LEFT JOIN tbl_reports ON post.post_id = tbl_reports.post_id
        WHERE post.post_id = ?";
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
    $type="homepage";

    $query = $conn->prepare('INSERT INTO announcement(title,`description`,date_created,isdeleted,type) values(?,?,now(),1,?)');
    $query->bind_param('sss',$title,$description,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnGetAnnouncement(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM `announcement` WHERE type="homepage" ORDER BY date_created DESC LIMIT 5');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);

}
function fnSaveitAnnounce(){
    global $conn;
    $title= $_POST['title'];
    $description= $_POST['description'];
    $type="bsit";

    $query = $conn->prepare('INSERT INTO announcement(title,`description`,date_created,isdeleted,type) values(?,?,now(),1,?)');
    $query->bind_param('sss',$title,$description,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}

function fnGetitAnnounce(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM `announcement` WHERE type="bsit" ORDER BY date_created DESC LIMIT 5');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);

}
function fnSavebeedAnnounce(){
    global $conn;
    $title= $_POST['title'];
    $description= $_POST['description'];
    $type="beed";

    $query = $conn->prepare('INSERT INTO announcement(title,`description`,date_created,isdeleted,type) values(?,?,now(),1,?)');
    $query->bind_param('sss',$title,$description,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnGetbeedAnnounce(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM `announcement` WHERE type="beed" ORDER BY date_created DESC LIMIT 5');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);

}
function fnSavebshmAnnounce(){
    global $conn;
    $title= $_POST['title'];
    $description= $_POST['description'];
    $type="bshm";

    $query = $conn->prepare('INSERT INTO announcement(title,`description`,date_created,isdeleted,type) values(?,?,now(),1,?)');
    $query->bind_param('sss',$title,$description,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnGetbshmAnnounce(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM `announcement` WHERE type="bshm" ORDER BY date_created DESC LIMIT 5');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);

}
function fnSavebsedAnnounce(){
    global $conn;
    $title= $_POST['title'];
    $description= $_POST['description'];
    $type="bsed";

    $query = $conn->prepare('INSERT INTO announcement(title,`description`,date_created,isdeleted,type) values(?,?,now(),1,?)');
    $query->bind_param('sss',$title,$description,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnGetbsedAnnounce(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM `announcement` WHERE type="bsed" ORDER BY date_created DESC LIMIT 5');
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
  

    $sql = "UPDATE announcement SET title=?, description=?  WHERE a_id=?";
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
        $sql = "DELETE FROM announcement WHERE a_id = ?";
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
    $month=$_POST['month'];
    $day=$_POST['day'];
    $year=$_POST['year'];
    $type="homepage";


    $query = $conn->prepare('INSERT INTO events(title,`month`,`day`,`year`,`event`,date_posted,type) values(?,?,?,?,?,now(),?)');
    $query->bind_param('ssiiss',$title,$month,$day,$year,$events,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }


}
function fnGetEvent(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM `events` WHERE type="homepage" ORDER BY date_posted DESC LIMIT 5');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);

}
function fnSaveEbeed(){
    global $conn;
    $title= $_POST['title'];
    $events= $_POST['events'];
    $month=$_POST['month'];
    $day=$_POST['day'];
    $year=$_POST['year'];
    $type="beed";


    $query = $conn->prepare('INSERT INTO events(title,`month`,`day`,`year`,`event`,date_posted,type) values(?,?,?,?,?,now(),?)');
    $query->bind_param('ssiiss',$title,$month,$day,$year,$events,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }


}
function fnGetEbeed(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM `events` WHERE type="beed" ORDER BY date_posted DESC LIMIT 5');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);

}
function fnSaveEbshm(){
    global $conn;
    $title= $_POST['title'];
    $events= $_POST['events'];
    $month=$_POST['month'];
    $day=$_POST['day'];
    $year=$_POST['year'];
    $type="bshm";


    $query = $conn->prepare('INSERT INTO events(title,`month`,`day`,`year`,`event`,date_posted,type) values(?,?,?,?,?,now(),?)');
    $query->bind_param('ssiiss',$title,$month,$day,$year,$events,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }


}
function fnGetEbshm(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM `events` WHERE type="bshm" ORDER BY date_posted DESC LIMIT 5');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);

}
function fnSaveEbsed(){
    global $conn;
    $title= $_POST['title'];
    $events= $_POST['events'];
    $month=$_POST['month'];
    $day=$_POST['day'];
    $year=$_POST['year'];
    $type="bsed";


    $query = $conn->prepare('INSERT INTO events(title,`month`,`day`,`year`,`event`,date_posted,type) values(?,?,?,?,?,now(),?)');
    $query->bind_param('ssiiss',$title,$month,$day,$year,$events,$type);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }


}
function fnGetEbsed(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM `events` WHERE type="bsed" ORDER BY date_posted DESC LIMIT 5');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);

}


function fnAddComment() {
    global $conn;
    $id = $_SESSION['user_id'];
    $uname = $_SESSION['fullname'];
    $post_id = $_POST['post_id'];
    $comment_text = $_POST['comment_text'];
   

    $sql = "INSERT INTO `comments`(`pos_id`, `user_id`, `uname`, `comment`, `date`, `isapprove`) VALUES (?,?,?,?, NOW(),0)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'iiss', $post_id, $id, $uname, $comment_text);

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

    $query = $conn->prepare('SELECT * FROM comments WHERE pos_id=? ORDER BY `date` DESC');
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
  

    $sql = "UPDATE comments SET uname=?, comment=?  WHERE comment_id=?";
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
        $sql = "DELETE FROM comments WHERE comment_id = ?";
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




function fnEventBsit(){
    global $conn;
    $title= $_POST['title'];
    $events= $_POST['events'];
    $month=$_POST['month'];
    $day=$_POST['day'];
    $year=$_POST['year'];
    $type="bsit";


    $query = $conn->prepare('INSERT INTO events(title,`month`,`day`,`year`,`event`,date_posted,type) values(?,?,?,?,?,now(),?)');
    $query->bind_param('ssiiss',$title,$month,$day,$year,$events,$type);
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnEventBsed(){
    global $conn;
    $title= $_POST['title'];
    $events= $_POST['events'];
    $month=$_POST['month'];
    $day=$_POST['day'];
    $year=$_POST['year'];
    $type="bsed";


    $query = $conn->prepare('INSERT INTO events(title,`month`,`day`,`year`,`event`,date_posted,type) values(?,?,?,?,?,now(),?)');
    $query->bind_param('ssiiss',$title,$month,$day,$year,$events,$type);
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnEventBeed(){
    global $conn;
    $title= $_POST['title'];
    $events= $_POST['events'];
    $month=$_POST['month'];
    $day=$_POST['day'];
    $year=$_POST['year'];
    $type="beed";


    $query = $conn->prepare('INSERT INTO events(title,`month`,`day`,`year`,`event`,date_posted,type) values(?,?,?,?,?,now(),?)');
    $query->bind_param('ssiiss',$title,$month,$day,$year,$events,$type);
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnEventBshm(){
    global $conn;
    $title= $_POST['title'];
    $events= $_POST['events'];
    $month=$_POST['month'];
    $day=$_POST['day'];
    $year=$_POST['year'];
    $type="bshm";


    $query = $conn->prepare('INSERT INTO events(title,`month`,`day`,`year`,`event`,date_posted,type) values(?,?,?,?,?,now(),?)');
    $query->bind_param('ssiiss',$title,$month,$day,$year,$events,$type);
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnGetEbsit(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM events WHERE type="bsit" ORDER BY date_posted DESC LIMIT 5');
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