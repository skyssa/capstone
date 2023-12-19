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

function fnSavePost(){
    global $conn;
    $id=$_POST['id'];
    $user=$_POST['name'];
    $description= $_POST['description']; 
    

    $filename = $_FILES['productimage']['name'];
    $folder = '../uploads/';
    
    $destination = $folder . $filename;
    move_uploaded_file($_FILES['productimage']['tmp_name'],$destination);


    $query = $conn->prepare('INSERT INTO alumnipost(user_id,names,`description`,image,date_created,isdeleted) values(?,?,?,?,now(),1)');
    $query->bind_param('isss',$id,$user,$description,$filename);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }

}
function fnPost(){
    global $conn;

    $query = $conn->prepare('SELECT * FROM alumnipost');
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

    $sql = "UPDATE alumnipost SET names=?, description=?, image=? WHERE post_id=?";
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
        $sql = "DELETE alumnipost, alumnireport, alumnicomment
        FROM alumnipost
        LEFT JOIN alumnicomment ON alumnipost.post_id = alumnicomment.pos_id
        LEFT JOIN alumnireport ON alumnipost.post_id = alumnireport.post_id
        WHERE alumnipost.post_id = ?";
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
//report
function fnReportPost(){
    global $conn;
    $id=$_POST['post_id'];
    $report=$_POST['reason'];

    $query = $conn->prepare('INSERT INTO alumnireport(post_id,report_type,date_reported) values(?,?,now())');
    $query->bind_param('is',$id,$report);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($conn));
    }
}

//comment
function fnAddComment(){
    global $conn;
    $id=$_SESSION['user_id'];
    $uname=$_SESSION['fullname'];
    $post_id = $_POST['post_id'];
    $comment_text = $_POST['comment_text'];

    $sql = "INSERT INTO `alumnicomment`( `pos_id`, `user_id`, `uname`, `comment`, `date`, `isapprove`) VALUES (?,?,?, ?, NOW(),0)";
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

    $query = $conn->prepare("SELECT * FROM alumnicomment WHERE pos_id=? ORDER BY alumnicomment.date DESC");
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
  

    $sql = "UPDATE alumnicomment SET uname=?, comment=?  WHERE comment_id=?";
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
        $sql = "DELETE FROM alumnicomment WHERE comment_id = ?";
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
function fnSaveAnnouncement(){
    global $conn;
    $title= $_POST['title'];
    $description= $_POST['description']; 

    $query = $conn->prepare('INSERT INTO alumniannounce(title,description,date_created,isdeleted) VALUES(?,?,now(),1)');
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

    $query = $conn->prepare('SELECT * FROM alumniannounce');
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
  

    $sql = "UPDATE alumniannounce SET title=?, description=?  WHERE a_id=?";
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
        $sql = "DELETE FROM alumniannounce WHERE a_id = ?";
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

?>