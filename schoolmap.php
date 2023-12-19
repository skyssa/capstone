<?php
session_start();
include "includes/config.php";
if (!$_SESSION['fullname']) {
    echo '<script>window.location.href="sign-in.php";</script>';
    exit();
}
?>
<html lang="en" class=" sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers"><!-- Mirrored from uitheme.net/sociala/default.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 May 2023 17:10:12 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CampusComm</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/CPC.jpg">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy12aC9fv5+gM5bGgS7J2h2bjvZkmH4bY1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" integrity="sha512-zvrDc8Yq+5dznp8gIbmlc92p+q3P7KJ5q0onmRPdDQHl8Im4mt5L9JlC+VZgu4N0XJ9I/tOIQ0giHtp/Uz2XpA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/emoji.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <script src="https://kit.fontawesome.com/b06a377e67.js" crossorigin="anonymous"></script>
    <style media="screen">
        .style2 {
            /* margin-top:150px;
            margin-left:200px; */
            width: 1200px;
            height: 600px;
            background: url(img/Untitled.png);
            background-repeat: no-repeat;
            /*            -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover; 
        background-size: cover;*/

        }
    </style>

</head>

<body class="color-theme-blue mont-font loaded">

    <div class="preloader" style="display: none;"></div>
    <div id="camp-app">
        <div class="main-wrapper">

            <!-- navigation top-->
            <div class="nav-header bg-white shadow-xs border-0">
                <div class="nav-top">
                    <a href="teacherhome.html"><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">CampusComm School Map</span>
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
            <!-- navigation top -->

            <!-- navigation left -->
            <nav class="navigation scroll-bar">
                <div class="container ps-0 pe-0">
                    <div class="nav-content">
                        <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                            <div class="nav-caption fw-600 font-xssss text-grey-500"><span>New </span>Feeds</div>
                            <ul class="mb-1 top-content">
                                <?php
                                $id = $_SESSION['user_id'];
                                $query = "SELECT *
                                     FROM tbl_user AS tu
                                     JOIN users AS u ON tu.user_id = u.uid
                                     WHERE tu.user_id = $id;";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                                if ($row != 0) {

                                    echo '<li><a href="profilerole.php" class="nav-content-bttn open-font"><img src="uploads/' . $row["pic"] . '" alt="" style="width: 60px; height: 40px;"><span>' . $row["name"] . '</span></a></li>
                                        ';
                                } else {
                                    echo '<li><a href="profilerole.php" class="nav-content-bttn open-font"><span>Create Profile</span></a></li>';
                                }
                                ?>

                                <li><a href="role.php" class="nav-content-bttn open-font"><i class="feather-tv btn-round-md bg-blue-gradiant me-3"></i><span>Newsfeed</span></a></li>
                                <li><a href="depalumni.php" class="nav-content-bttn open-font"><i class="feather-home btn-round-md bg-blue-gradiant me-3"></i><span>Department</span></a></li>
                                <li><a href="chat.php" class="nav-content-bttn open-font"><i class="feather-inbox btn-round-md bg-blue-gradiant me-3"></i><span>Message</span></a></li>
                                <li><a href="schoolmap.php" class="nav-content-bttn open-font"><i class="feather-map-pin btn-round-md bg-blue-gradiant me-3"></i><span>School Map</span></a></li>
                                <li><a href="logouts.php" class="nav-content-bttn open-font"><i class="feather-inbox btn-round-md bg-blue-gradiant me-3"></i><span>Log Out</span></a></li>

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
            <!-- navigation left -->
            <!-- main content -->
            <div class="main-content right-chat-active">
                <div class="middle-sidebar-bottom">
                    <div class="middle-sidebar-left">
                        <div class="row feed-body">
                            <div class="style2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <p class="sections"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 seperatorHeading"></div>
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <p class="sections"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="container " style="margin: 80px 0px 0px 0px">
                                    <div class="row tooltip-demo">
                                        <div class="col-md-6 longonBorder">
                                            <!-- twelve row -->
                                            <div class="col-lg-12 row">
                                                <div class="col-md-2 longonBorder" style=" "></div>
                                                <div class="col-md-1" style=" "></div>
                                                <div class="col-md-3" style=" "></div>
                                                <div class="col-md-6" style=" "></div>
                                            </div>
                                            <!-- end -->
                                            <!-- eleven row -->
                                            <div class="col-lg-12 row">
                                                <div class="col-md-1" style=" "></div>
                                                <div class="col-md-1" style=" "></div>
                                                <div class="col-md-3" style=" "></div>
                                                <div type="button" data-toggle="modal" data-target="#guardhousemodal" class="col-md-7" style="height:30px; border:2px solid black;  width:50px; background-color:white;margin-top:30px;">
                                                    guard house
                                                    <div class="modal fade" id="guardhousemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    ...
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- end -->
                                            <!-- ten row -->
                                            <div class="col-lg-12 row">
                                                <div class="col-md-2" style=" "></div>
                                                <div class="col-md-10" style=" "></div>
                                            </div>
                                            <!-- end -->

                                            <!-- nine row -->
                                            <div class="col-lg-12 row">
                                                <div class="col-md-12 longonBorder"></div>
                                            </div>
                                            <!-- end -->
                                            <!-- <div class="col-md-12 thirdway longonBorder" style="height: 5px;  "> 
			</div>  -->
                                            <!-- eight row -->
                                            <!-- <div class="col-lg-12 row">
                                                <div class="col-md-12 longonBorder">13</div>
                                            </div> -->
                                            <!-- end -->
                                            <!-- <div class="col-md-12 thirdway longonBorder" style="height: 5px;  "> 
			</div> 
 -->
                                            <!-- seven row -->
                                            <!-- <div class="col-lg-12 row">
                                                <div class="col-md-12 longonBorder">14</div>
                                            </div> -->
                                            <!-- end -->

                                            <!-- 	<div class="col-md-12 thirdway longonBorder" style="height: 5px;  "> 
			</div>  -->

                                            <!-- six row -->
                                            <div class="col-lg-12 row">

                                                <div class="col-md-4 longonBorder" style="height:30px; border:2px solid black;  width:80px; background-color:white; margin-left:315px; margin-top:85px;">Stair</div>

                                            </div>
                                            <!-- end  -->

                                            <!-- fifth row -->

                                            <div class="col-lg-12 row">
                                                <div class="col-md-9 longonBorder" style="height:60px; border:2px solid black;  width:80px; background-color:white; margin-left:315px;  font-size:11px;">
                                                    Comlab 1 & front-office

                                                </div>
                                                <div class="col-md-3 longonBorder"></div>
                                            </div>
                                            <!-- end -->

                                            <!-- forth row -->

                                            <div class="col-lg-12 row">
                                                <div class="col-md-4 longonBorder" style="height:60px; border:2px solid black;  width:80px; background-color:white; margin-left:315px; font-size:11px;">Comlab 2</div>


                                            </div>
                                            <!-- end -->
                                            <!-- 	<div class="col-md-12 thirdway longonBorder" style="height: 5px;  "> 
			</div>  -->

                                            <!-- 	<div class="col-md-6 thirdway longonBorder" style="height: 5px;  "> 
			</div> 
			<div class="col-md-6 thirdway longonBorder" style="height: 5px;  "> 
			</div>  -->


                                            <!-- third row -->
                                            <div class="col-lg-12 row">

                                                <!-- <div class="col-md-2 longonBorder" style="height:30px; border:2px solid black;  width:50px; background-color:white;">21</div> -->
                                                <div class="col-md-4 longonBorder" style="height:60px; border:2px solid black;  width:80px; background-color:white; margin-left:205px; font-size:11px;">canteen</div>
                                                <div class="col-md-4 longonBorder" style="height:60px; border:2px solid black;  width:80px; background-color:white; margin-left:30px; font-size:11px;">Comlab 3</div>

                                            </div>
                                            <!-- end -->
                                            <!-- second row -->
                                            <div class="col-lg-12 row">
                                                <!-- <div class="col-md-2 longonBorder">24</div> -->
                                                <div class="col-md-4 longonBorder" style="height:50px; border:2px solid black;  width:80px; background-color:white; margin-left:205px;">room</div>
                                                <div class="col-md-4 longonBorder" style="height:30px; border:2px solid black;  width:80px; background-color:white; margin-left:30px;">stair</div>

                                            </div>
                                            <!-- end -->
                                            <!-- first row -->
                                            <!-- <div class="col-lg-12 row">
                                                <div class="col-md-12 thirdway longonBorder" style="height: 5px;  ">26</div>
                                            </div> -->
                                            <!-- end -->


                                        </div>


                                        <div class="col-lg-6">
                                            <!-- twelve row -->
                                            <div class="col-lg-12 row">

                                                <div class="col-md-6 longonBorder partition " style="height:50px; border:2px solid black;  width:40px; background-color:white; margin-top:10px; margin-left:300px; font-size:11px;">clinic</div>
                                            </div>
                                            <div class="col-lg-12 row">
                                                <div class="col-md-1 longonBorder " style="height:50px; border:2px solid black;  width:40px; background-color:white; margin-left:300px; font-size:11px;">room</div>
                                                <div class="col-md-1 longonBorder partition " style="height:50px; border:2px solid black;  width:70px; background-color:white; margin-left:25px; font-size:11px;">Chair office</div>

                                            </div>

                                            <div class="col-lg-12 row">
                                                <div class="col-md-1 longonBorder" style="height:50px; border:2px solid black;  width:60px; background-color:white; font-size:11px;">admin</div>
                                                <div class="col-md-1 longonBorder" style="height:50px; border:2px solid black;  width:80px; background-color:white; ">avr</div>
                                                <div class="col-md-1 longonBorder partition " style="height:50px; border:2px solid black;  width:80px; background-color:white; font-size:11px;">regsitrar</div>
                                                <div class="col-md-1 longonBorder partition " style="height:50px; border:2px solid black;  width:80px; background-color:white; ">faculty</div>
                                                <div class="col-md-1 longonBorder partition " style="height:50px; border:2px solid black;  width:40px; background-color:white; font-size:11px;">room</div>

                                            </div>

                                            <!-- end -->
                                            <!-- twelve row -->
                                            <div class="col-lg-12 row">
                                                <div class="col-md-3 longonBorder "></div>
                                                <div class="col-md-3 longonBorder" style="height:50px; border:2px solid black;  width:99px; background-color:white; margin-top:30px;">tent</div>
                                                <div class="col-md-1 longonBorder" style="height:100px; border:2px solid black;  width:70px; background-color:white; margin-left:155px; margin-top:30px;">tent</div>
                                            </div>

                                            <!-- end -->
                                            <!-- eleven row -->
                                            <div class="col-lg-12 row">
                                                <div class="col-md-1 longonBorder partition " style="height:50px; border:2px solid black;  width:40px; background-color:white; font-size:11px; margin-top:50px;">SAO</div>
                                                <div class="col-md-1 longonBorder" style="height:50px; border:2px solid black;  width:40px; background-color:white; font-size:11px; margin-top:30px;">stair</div>
                                                <div class="col-md-1 longonBorder" style="height:50px; border:2px solid black;  width:80px; background-color:white; font-size:11px; margin-top:30px;">room 3</div>
                                                <div class="col-md-1 longonBorder partition " style="height:50px; border:2px solid black;  width:80px; background-color:white; font-size:11px; margin-top:30px;">room 2</div>
                                                <div class="col-md-1 longonBorder partition " style="height:50px; border:2px solid black;  width:80px; background-color:white; font-size:11px; margin-top:30px;">room 1</div>
                                                <div class="col-md-1 longonBorder partition " style="height:50px; border:2px solid black;  width:40px; background-color:white; font-size:11px; margin-top:30px;">stair</div>
                                                <div class="col-md-1 longonBorder partition " style="height:50px; border:2px solid black;  width:60px; background-color:white; font-size:11px; margin-top:30px;">Guidance</div>
                                            </div>

                                            <!-- end -->
                                            <!-- ten row -->
                                            <!-- <div class="col-lg-12 row">
                                                <div class="col-md-4 longonBorder ">35</div>
                                                <div class="col-md-1 longonBorder partition">36</div>
                                                <div class="col-md-2 longonBorder ">37</div>
                                                <div class="col-md-1 longonBorder partition">38</div>
                                                <div class="col-md-4 longonBorder ">39</div>
                                            </div> -->

                                            <!-- end -->
                                            <!-- nine row -->
                                            <!-- <div class="col-lg-12 row">

                                                <div class="col-md-3 longonBorder partition">40</div>
                                                <div class="col-md-1 longonBorder">41</div>
                                                <div class="col-md-1 longonBorder partition">42</div>
                                                <div class="col-md-2 longonBorder">43</div>
                                                <div class="col-md-1 longonBorder partition">44</div>
                                                <div class="col-md-4 longonBorder">45</div>
                                            </div> -->

                                            <!-- end -->
                                            <!-- eight row -->
                                            <!-- <div class="col-lg-12 row">
                                                <div class="col-md-4 longonBorder ">46</div>
                                                <div class="col-md-1 longonBorder partition">47</div>
                                                <div class="col-md-2 longonBorder ">48</div>
                                                <div class="col-md-1 longonBorder partition">49</div>
                                                <div class="col-md-4 longonBorder ">50</div>
                                            </div> -->

                                            <!-- end -->
                                            <!-- seven row -->
                                            <!-- <div class="col-lg-12 row">
                                                <div class="col-md-8 longonBorder partition">51</div>
                                                <div class="col-md-4 longonBorder">52</div>
                                            </div> -->

                                            <!-- end -->
                                            <!-- six row -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- loader wrapper -->
            <!-- main content -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-XpST91Agn3uZd1QVq3JcNvLyA7uj13d3s9fQbY8bF2jW0JqJSFkh6DEVDJLbcQ8E" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy12aC9fv5+gM5bGgS7J2h2bjvZkmH4bY1" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-ZJ/saCJAGQ8idK7LEp+qLKn4J7BFlwIeehtv8P0zW4QVDu1oSmSdsJbAMBUVpXy0VJlA1Nel3+8eQ+ZdLfyhLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js" integrity="sha512-E+4j1pwXlM+YJ5LreIj+SG/xMMzNBntZYx1Zc1fgP5Mt/EXi1z3r6D9uRw46bwnY4H7mogz74qrsjIQWwNHYFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script></script>
            <script src="js/plugin.js"></script>
            <script src="js/lightbox.js"></script>
            <script src="js/scripts.js"></script>






</body><!-- Mirrored from uitheme.net/sociala/default.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 May 2023 17:15:45 GMT -->

</html>