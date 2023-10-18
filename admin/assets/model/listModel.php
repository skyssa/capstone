<?php 

include "../config/config.php"; 

$method = $_POST['method'];

if(function_exists($method)){ //fnSave
    call_user_func($method);
}
else{
    echo "Function not exists";
}

function fnSave(){
    global $con;
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = md5($_POST['password']);

    $query = $con->prepare('INSERT INTO tbl_users(fullname,username,password,user_role,date_created) values(?,?,?,1,now())');
    $query->bind_param('sss',$fullname,$username,$password);
    
    if($query->execute()){
        echo 1;
    }
    else{
        echo json_encode(mysqli_error($con));
    }

}

function fnGetUsers(){
    global $con;

    $query = $con->prepare("call sp_displayUser()");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);

}

// function fnGetBsit(){
//     global $con;

//     $query = $con->prepare('SELECT * FROM tbl_user WHERE user_type="Student" AND dep_type="BSIT"');
//     $query->execute();
//     $result = $query->get_result();
//     $data = array();
//     while($row = $result->fetch_array()){
//         $data[] = $row;
//     }
//     echo json_encode($data);

// }

function fnGetAdmin(){
    global $con;

    $query = $con->prepare('SELECT * FROM tbl_user WHERE user_type="admin"');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }
    echo json_encode($data);

}




function fnGetReport(){
    global $con;

    $query = $con->prepare('SELECT * FROM tbl_reports');
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while($row = $result->fetch_array()){
        $data[] = $row;
    }

    echo json_encode($data);



    function fnLogin(){
        global $conn;
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = $conn->prepare("call sp_savelogin(?,?)");
        $query->bind_param('ss',$username,$password);
        $query->execute();
        $result = $query->get_result();
        $ret = '';
        //$data = array();
        while($row = $result->fetch_array()){
            //$data[]=$row;
            if($row['ret'] == 1 ){
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['fullname'] = $row['fullname'];
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
}

?>