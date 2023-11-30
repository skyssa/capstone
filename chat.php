<?php
session_start();
include "includes/config.php";
if (!$_SESSION['fullname']) {
    echo '<script>window.location.href="sign-in.php";</script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    
    <link rel="stylesheet" href="cssfiles/bootstrap.min.css" />
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/feather.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        .main-content .chat-msg-ovl{
        width:100%;
        height:85vh;
        text-align:center;
        position:absolute;
        display: flex;
        align-items:center;
        justify-content: center;
        display:none;
        z-index:1;
        background:#fff;
        color:#000;
        }

        .main-content .chat-msg{
        width:100%;
        height:69vh;
        overflow-y:scroll;
        overflow-x:hidden;
        transition: .2s;
        padding:10px;
        position:relative;
        }

        .main-content .chat-body:hover > .chat-msg::-webkit-scrollbar{
        visibility:visible;
        transition: 1s;
        }
        .main-content .chat-msg::-webkit-scrollbar{
        width:5px;
        }
        .main-content .chat-msg::-webkit-scrollbar-track{
        width:5px;
        background:#777;
        }

        .main-content .chat-msg::-webkit-scrollbar-thumb{
        border-radius:20px;
        background:#13235a;
        visibility: hidden;
        }

        .main-content .chat-msg p{
        padding:5px;
        font-size:15px;
        box-shadow:-3px 3px 20px #9b9898;

        }
        .main-content .chat-msg .incoming{
        display:flex;
        width:100%;
        }

        .main-content .chat-msg .outgoing{
        display:flex;
        width:100%;
        }
        /* .main-content .chat-msg .details{

        /* width:85%; */
        
        .main-content .chat-msg .incoming .details p{
        background:blue;
        color: white;
        border-radius:5px 0px 5px 5px;
        word-wrap: break-word;
        }

        .main-content .chat-msg .incoming .details{
        margin-left:auto;
        max-width:350px;
        align-items:flex-end;
        position: relative;
        }


        .main-content .chat-msg .outgoing .details{
        margin-right:auto;
        max-width:450px;
        align-items:flex-end;
        position: relative;
        }

    </style>
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/CPC.jpg">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="color-theme-blue mont-font loaded">
    <div class="main-wrapper">
        <div class="nav-header bg-white shadow-xs border-0">
            <div class="nav-top">
                <a href="index.html"><i class="feather-school text-success display1-size me-2 ms-0"></i><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">CampusComm</span> </a>
                <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"><i class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="default-video.html" class="mob-menu me-2"><i class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="#" class="me-2 menu-search-icon mob-menu"><i class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <button class="nav-menu me-0 ms-2"></button>
            </div>
            <a href="department.php" class="p-2 text-center ms-1 menu-icon"><i class="feather-globe btn-round-md bg-gold-gradiant me-3"></i></a>
            <a href="role.php" class="p-2 text-center ms-1 menu-icon"><i class="feather-tv btn-round-md bg-blue-gradiant me-3"></i><span></span></a>
            <div class="dropdown-menu dropdown-menu-end p-4 rounded-3 border-0 shadow-lg" aria-labelledby="dropdownMenu3">

                <h4 class="fw-700 font-xss mb-4">More Settings</h4>
                <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
                    <!-- <img src="images/user-8.png" alt="user" class="w40 position-absolute left-0">
                    <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Hendrix Stamp <span class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 3 min</span></h5>
                    <h6 class="text-grey-500 fw-500 font-xssss lh-4">There are many variations of pass..</h6> -->
                </div>

            </div>
            <a href="" class="p-2 text-center ms-auto menu-icon" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"><span class="dot-count bg-warning"></span><i class="feather-bell font-xl text-current"></i></a>
            <div class="dropdown-menu dropdown-menu-end p-4 rounded-3 border-0 shadow-lg" aria-labelledby="dropdownMenu3">

                <h4 class="fw-700 font-xss mb-4">Notification</h4>
                <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
                    <!-- <img src="images/user-8.png" alt="user" class="w40 position-absolute left-0">
                    <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Hendrix Stamp <span class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 3 min</span></h5>
                    <h6 class="text-grey-500 fw-500 font-xssss lh-4">There are many variations of pass..</h6> -->
                </div>

            </div>
            <a href="chat.php" class="p-2 text-center ms-3 menu-icon chat-active-btn"><i class="feather-message-square font-xl text-current"></i></a>
            <div class="p-2 text-center ms-3 position-relative dropdown-menu-icon menu-icon cursor-pointer">
                <i class="feather-settings animation-spin d-inline-block font-xl text-current"></i>
                <div class="dropdown-menu-settings switchcolor-wrap">
                    <h4 class="fw-700 font-sm mb-4">Settings</h4>
                    <h6 class="font-xssss text-grey-500 fw-700 mb-3 d-block">Choose Color Theme</h6>
                    <ul>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="red" checked=""><i class="ti-check"></i>
                                <span class="circle-color bg-red" style="background-color: #ff3b30;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="green"><i class="ti-check"></i>
                                <span class="circle-color bg-green" style="background-color: #4cd964;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="blue" checked=""><i class="ti-check"></i>
                                <span class="circle-color bg-blue" style="background-color: #132977;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="pink"><i class="ti-check"></i>
                                <span class="circle-color bg-pink" style="background-color: #ff2d55;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="yellow"><i class="ti-check"></i>
                                <span class="circle-color bg-yellow" style="background-color: #ffcc00;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="orange"><i class="ti-check"></i>
                                <span class="circle-color bg-orange" style="background-color: #ff9500;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="gray"><i class="ti-check"></i>
                                <span class="circle-color bg-gray" style="background-color: #8e8e93;"></span>
                            </label>
                        </li>

                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="brown"><i class="ti-check"></i>
                                <span class="circle-color bg-brown" style="background-color: #D2691E;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="darkgreen"><i class="ti-check"></i>
                                <span class="circle-color bg-darkgreen" style="background-color: #228B22;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="deeppink"><i class="ti-check"></i>
                                <span class="circle-color bg-deeppink" style="background-color: #FFC0CB;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="cadetblue"><i class="ti-check"></i>
                                <span class="circle-color bg-cadetblue" style="background-color: #5f9ea0;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="darkorchid"><i class="ti-check"></i>
                                <span class="circle-color bg-darkorchid" style="background-color: #9932cc;"></span>
                            </label>
                        </li>
                    </ul>

                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Header Background</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-menu-color"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Menu Position</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-menu"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Dark Mode</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-dark"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>

                </div>
            </div>
            <a href="profilerole.php" class="p-0 ms-3 menu-icon"><img src="images/profile-4.png" alt="user" class="w40 mt--1"></a>
            <nav class="navigation scroll-bar">
                <div class="container ps-0 pe-0">
                    <div class="nav-content">


                        <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                            <div class="nav-caption fw-600 font-xssss text-grey-500"><span>USER </span></div>
                            <div class="logged-in-user">
                                <?php
                                $user_id = $_SESSION['user_id'];
                                $query_user = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_id='$user_id'");
                                $data = mysqli_fetch_assoc($query_user);
                                ?>
                                <div class="user-info">
                                    <p class="username"><?php echo $data['username']; ?></p>
                                    <span><?php echo $data['user_type']; ?> Of <?php echo $data['dep_type']; ?></span>
                                    <br>
                                    <div class="logout-cont mt-4">
                                        <a href="logout.php?uid=<?php echo $data['user_id']; ?>" class="logout"><ion-icon name="lock-open"></ion-icon> Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2">
                            <div class="nav-caption fw-600 font-xssss text-grey-500"><span>More </span>Users</div>
                            <ul class="mb-3">
                                <?php
                                $query_user = mysqli_query($conn, "SELECT * FROM tbl_user ");
                                while ($data = mysqli_fetch_assoc($query_user)) {
                                    if ($data['user_id'] != $_SESSION['user_id'])
                                        echo '<li><a href="?uid=' . $data["user_id"] . '">' . $data["fullname"] . ' - ' . $data["user_type"] . ' of ' . $data["dep_type"] . '</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

        </div>
        <div class="main-content right-chat-active">

            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left pe-0 ps-lg-3 ms-0 me-0" style="max-width: 100%;">
                    <div class="row">

                        <div class="col-lg-12 position-relative">
                            <div class="chat-wrapper pt-0 w-100 position-relative scroll-bar bg-white theme-dark-bg">
                                <div class="chat-body">
                                    <div class="chat-msg-ovl">
                                        <p>No messages available, stat a chat.</p>
                                    </div>

                                    <div class="chat-msg"></div>

                                    
                                    <div class="chat-footer">
                                        <div class="form-inline mt-1 input-group p-1">
                                            <input type="text" class="send-msg form-control" placeholder="Send message" id="send-msg-inp">

                                            <?php
                                            
                                            $user_id = $_GET['uid'];

                                            $query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_id='$user_id'");

                                            $count = mysqli_fetch_assoc($query);
                                            if ($count == 0) {
                                                echo '<script>alert("no users")</script>';
                                                die;
                                            } else if ($count > 0) { ?>
                                                <input type="hidden" value="<?php echo $user_id; ?>" id="incoming_id_inp">
                                            <?php } ?>

                                            <button class="send-btn  btn btn-primary" type="submit" id="send-btn">
                                                Send
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
  
    <script src="./js/fetch_msg.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>