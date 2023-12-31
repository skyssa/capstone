<?php
session_start();
include "includes/config.php";
if (!$_SESSION['fullname']) {
    echo '<script>window.location.href="sign-in.php";</script>';
    exit();
}


$id = $_SESSION['user_id'];
$query = "SELECT *
                                                FROM tbl_user AS tu
                                                JOIN users AS u ON tu.user_id = u.uid
                                                WHERE tu.user_id = $id;";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
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
        .main-content .chat-msg-ovl {
            width: 100%;
            height: 85vh;
            text-align: center;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            display: none;
            z-index: 1;
            background: #fff;
            color: #000;
        }

        .main-content .chat-msg {
            width: 100%;
            height: 69vh;
            overflow-y: scroll;
            overflow-x: hidden;
            transition: .2s;
            padding: 10px;
            position: relative;
        }

        .main-content .chat-body:hover>.chat-msg::-webkit-scrollbar {
            visibility: visible;
            transition: 1s;
        }

        .main-content .chat-msg::-webkit-scrollbar {
            width: 5px;
        }

        .main-content .chat-msg::-webkit-scrollbar-track {
            width: 5px;
            background: #777;
        }

        .main-content .chat-msg::-webkit-scrollbar-thumb {
            border-radius: 20px;
            background: #13235a;
            visibility: hidden;
        }

        .main-content .chat-msg p {
            padding: 5px;
            font-size: 15px;
            box-shadow: -3px 3px 20px #9b9898;

        }

        .main-content .chat-msg .incoming {
            display: flex;
            width: 100%;
        }

        .main-content .chat-msg .outgoing {
            display: flex;
            width: 100%;
        }

        /* .main-content .chat-msg .details{

        /* width:85%; */

        .main-content .chat-msg .incoming .details p {
            background: blue;
            color: white;
            border-radius: 5px 0px 5px 5px;
            word-wrap: break-word;
        }

        .main-content .chat-msg .incoming .details {
            margin-left: auto;
            max-width: 350px;
            align-items: flex-end;
            position: relative;
        }


        .main-content .chat-msg .outgoing .details {
            margin-right: auto;
            max-width: 450px;
            align-items: flex-end;
            position: relative;

        }

        .messenger-name {
            font-weight: bold;
            font-size: 16px;
            color: #333;
            /* Adjust the color to your preference */
            margin-bottom: 5px;
            padding: 20px;
            border-bottom: #000;
            /* Add some margin to separate it from other elements */
            /* Add more styling as needed */
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
                <a href="teacherhome.html"><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">CampusComm Chatroom</span>
                </a>
                <a href="#" class="mob-menu ms-auto me-2" id="dropdownMenu4" data-bs-toggle="dropdown" aria-expanded="true"><i class="feather-bell text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <div class="dropdown-menu dropdown-menu-end p-4 rounded-3 border-0 shadow-lg" aria-labelledby="dropdownMenu4">
                    <h4 class="fw-700 font-xss mb-4">Notification</h4>

                </div>

                <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"><i class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>

                <!-- <a href="#" class="me-2 menu-search-icon mob-menu"><i class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></a> -->
                <button class="nav-menu me-0 ms-2"></button>
            </div>

            <a href="#" class="p-2 text-center ms-auto menu-icon show" id="dropdownMenu3" data-bs-toggle="dropdown" aria-expanded="true"><i class="feather-bell font-xl text-current"></i></a>
            <div class="dropdown-menu dropdown-menu-end p-4 rounded-3 border-0 shadow-lg" aria-labelledby="dropdownMenu3">
                <h4 class="fw-700 font-xss mb-4">Notification</h4>

            </div>
            <a href="#" class="p-2 text-center ms-3 menu-icon chat-active-btn"><i class="feather-message-square font-xl text-current"></i></a>
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
            <a href="default-settings.html" class="p-0 ms-3 menu-icon"></a>
        </div>

        <nav class="navigation scroll-bar">
            <div class="container ps-0 pe-0">
                <div class="nav-content">
                    <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                        <div class="nav-caption fw-600 font-xssss text-grey-500"><span>New </span>Feeds</div>
                        <ul class="mb-1 top-content">
                            <?php

                            if ($row != 0) {

                                echo '<li><a href="profilerole.php" class="nav-content-bttn open-font"><img src="uploads/' . $row["pic"] . '" alt="" style="width: 50px; height: 50px; border-radius: 50px; margin-right: 10px;" ><span>' . $row["name"] . '</span></a></li>
                                                    ';
                            } else {
                                echo '<li><a href="profilerole.php" class="nav-content-bttn open-font"><span>Create Profile</span></a></li>';
                            }
                            ?>
                            <li><a href="role.php" class="nav-content-bttn open-font"><i class="feather-home btn-round-md bg-blue-gradiant me-3"></i><span>Home</span></a></li>
                            <li><a href="studdepartment.php" class="nav-content-bttn open-font"><i class="feather-home btn-round-md bg-blue-gradiant me-3"></i><span>Department</span></a></li>
                            <li><a href="chat.php" class="nav-content-bttn open-font"><i class="feather-inbox btn-round-md bg-blue-gradiant me-3"></i><span>Message</span></a></li>
                            <li><a href="schoolmap.php" class="nav-content-bttn open-font"><i class="feather-map-pin btn-round-md bg-blue-gradiant me-3"></i><span>School Map</span></a></li>
                            <li><a href="logout.php" class="nav-content-bttn open-font"><i class="feather-inbox btn-round-md bg-blue-gradiant me-3"></i><span>Log Out</span></a></li>

                        </ul>
                    </div>
                    <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1">
                        <div class="nav-caption fw-600 font-xssss text-grey-500"><span></span>Others</div>
                        <ul class="mb-1">
                            <li><a href="https://www.facebook.com/cpcofficial2005" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-facebook me-3 text-grey-500"></i><span>Facebook</span></a></li>
                            <li><a href="https://www.facebook.com/cpcofficial2005" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather- me-3 text-grey-500"></i><span></span></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="main-content right-chat-active">

            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left pe-0 ps-lg-3 ms-0 me-0" style="max-width: 100%;">
                    <div class="row">

                        <div class="col-lg-12 position-relative">
                            <div class="chat-wrapper pt-0 w-100 position-relative scroll-bar bg-white theme-dark-bg">
                                <div class="chat-body">
                                    <div class="messenger-name">
                                        <?php
                                        $user_id = isset($_GET['uid']) ? $_GET['uid'] : null;
                                        $query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_id='$user_id'");
                                        $count = mysqli_fetch_assoc($query);
                                        if ($user_id == null) {
                                            echo '<h6 class="text-center text-danger mt-4">Please select a user to chat!</h6>';
                                        ?>
                                            <?php
                                           
                                            $query_user = mysqli_query($conn, "SELECT * FROM tbl_user");
                                            while ($data = mysqli_fetch_assoc($query_user)) {
                                                if ($data['user_id'] != $_SESSION['user_id'])
                                                    echo '<li style="list-style-type: none; margin-bottom: 10px; background-color: #f0f0f0; padding: 10px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                                <a href="chat.php?uid=' . $data["user_id"] . '" style="text-decoration: none; color: #000;">
                                                <span style="font-weight: bold;">' . $data["name"] . '</span> - ' . $data["user_type"] . ' of ' . $data["dep_type"] . '
                                                </a>
                                            </li>';
                                            }
                                            ?>

                                        <?php
                                        } else {
                                            echo '<span>' . $count['name'] . '</span>';
                                        }
                                        ?>
                                    </div>

                                    <div class="chat-msg">

                                    </div>


                                    <div class="chat-footer">
                                        <div class="form-inline mt-1 input-group p-1">

                                            <?php
                                            $user_id = isset($_GET['uid']) ? $_GET['uid'] : null;

                                            if ($user_id === null) {
                                                echo '<h6 class="text-center text-danger mt-4">Please select a user to chat!</h6>';
                                            } else {
                                                $query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_id='$user_id'");
                                                $count = mysqli_fetch_assoc($query);

                                                if ($count == 0) {
                                                    echo '<h4>No Messages</h4>';
                                                } else if ($count > 0) { ?>
                                                    <input type="text" class="send-msg form-control" placeholder="Send message" id="send-msg-inp">


                                                    <label for="fileInput" style="width:30px; border: 2px solid black; border-radius:5px;">+</label>
                                                    <input type="file" id="fileInput" name="file" style="display:none;">
                                                    <input type="hidden" value="<?php echo $user_id; ?>" id="incoming_id_inp">
                                                    <button class="send-btn  btn btn-primary" type="submit" id="send-btn">
                                                        Send
                                                    </button>
                                            <?php
                                                }
                                            }
                                            ?>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="right-chat nav-wrap mt-2 right-scroll-bar">
            <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">


                <div class="section full pe-3 ps-4 pt-4 position-relative feed-body">

                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">CONTACTS</h4>
                    <ul class="list-group list-group-flush">

                        <?php
                        $u_type = "bsit";
                        $query_user = mysqli_query($conn, "SELECT * FROM tbl_user WHERE dep_type='$u_type'");
                        while ($data = mysqli_fetch_assoc($query_user)) {
                            if ($data['user_id'] != $_SESSION['user_id'])
                                echo '<li style="list-style-type: none; margin-bottom: 10px; background-color: #f0f0f0; padding: 10px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <a href="chat.php?uid=' . $data["user_id"] . '" style="text-decoration: none; color: #000;">
                            <span style="font-weight: bold;">' . $data["name"] . '</span> - ' . $data["user_type"] . ' of ' . $data["dep_type"] . '
                            </a>
                        </li>';
                        }
                        ?>

                    </ul>
                </div>


            </div>
        </div>
    </div>

    <script src="js/fetch_msg.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>