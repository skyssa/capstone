<?php
session_start();
include "includes/config.php";
if (!$_SESSION['fullname']) {
    echo '<script>window.location.href="sign-in.php";</script>';
    exit();
}
?>
<html lang="en" class=" sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers"><!-- Mirrored from uitheme.net/sociala/author-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Sep 2023 02:40:20 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/CPC.jpg">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <style>
        
        </style>

</head>

<body class="color-theme-blue mont-font loaded">

    <div class="preloader" style="display: none;"></div>

    <div id="camp-app">
        <div class="main-wrapper">

            <!-- navigation top-->
            <div class="nav-header bg-white shadow-xs border-0">
                <div class="nav-top">
                    <a href="teacherhome.php"><i class="feather- text-success display1-size me-2 ms-0"></i><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xl logo-text mb-0">CAMPUSCOMM </span> </a>
                    <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"><i class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                    <a href="tdepartment.php" class="mob-menu me-2"><i class="feather-globe text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                    <a href="teacherhome.php" class="mob-menu me-2"><i class="feather-home text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                    <button class="nav-menu me-0 ms-2"></button>
                </div>

                <form action="#" class="float-left header-search">
                    <div class="form-group mb-0 icon-input">
                        <i class="feather-search font-sm text-grey-400"></i>
                        <input type="text" placeholder="Start typing to search.." class="bg-grey border-0 lh-32 pt-2 pb-2 ps-5 pe-3 font-xssss fw-500 rounded-xl w350 theme-dark-bg">
                    </div>
                </form>
                <a href="homepage.html" class="p-2 text-center ms-3 menu-icon center-menu-icon"><i class="feather-home font-lg alert-primary btn-round-lg theme-dark-bg text-current "></i></a>
                <a href="departmnent.html" class="p-2 text-center ms-0 menu-icon center-menu-icon"><i class="feather-globe font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500 "></i></a>

                <a href="userprofile.html" class="p-2 text-center ms-0 menu-icon center-menu-icon"><i class="feather-user font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500 "></i></a>


                <a href="#" class="p-2 text-center ms-auto menu-icon" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"><span class="dot-count bg-warning"></span><i class="feather-bell font-xl text-current"></i></a>
                <div class="dropdown-menu dropdown-menu-end p-4 rounded-3 border-0 shadow-lg" aria-labelledby="dropdownMenu3">

                    <h4 class="fw-700 font-xss mb-4">Notification</h4>

                </div>
                <!-- <a href="#" class="p-2 text-center ms-3 menu-icon chat-active-btn"><i class="feather-message-square font-xl text-current"></i></a>
                 -->
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


                <a href="default-settings.html" class="p-0 ms-3 menu-icon"><img src="images/profile-4.png" alt="user" class="w40 mt--1"></a>

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
                                    
                                }else{
                                    echo '<li><a href="profilerole.php" class="nav-content-bttn open-font"><span>Create Profile</span></a></li>';
                                }
                                ?>
                               
                                <li><a href="role.php" class="nav-content-bttn open-font"><i class="feather-tv btn-round-md bg-blue-gradiant me-3"></i><span>Newsfeed</span></a></li>
                                <li><a href="depalumni.php" class="nav-content-bttn open-font"><i class="feather-home btn-round-md bg-blue-gradiant me-3"></i><span>Department</span></a></li>
                                <li><a href="chat.php" class="nav-content-bttn open-font"><i class="feather-inbox btn-round-md bg-blue-gradiant me-3"></i><span>Message</span></a></li>
                                <li><a href="" class="nav-content-bttn open-font"><i class="feather-map-pin btn-round-md bg-blue-gradiant me-3"></i><span>School Map</span></a></li>
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

            <!-- navigation left -->
            <!-- main content -->
            <div class="main-content right-chat-active">


                <div class="middle-sidebar-bottom">
                    <div class="middle-sidebar-left">
                        <div class="row">
                            <?php
                            $uid=$_SESSION['user_id'];
                            $query = "SELECT * FROM users WHERE `uid`=$uid  AND approval = 'approve' ";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            do {
                                if (!is_null($row) && isset($row['approval']) && $row['approval'] == 'approve') {
                                    // echo '';
                                    $imagePath = 'uploads/' . $row['pic'];
                                    $coverPath = 'uploads/' . $row['cover'];
                            ?>
                                    <div class="col-xl-12">
                                        <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3 overflow-hidden">
                                            <div class="card-body position-relative h240 bg-image-cover bg-image-center" style="background-image: url('<?php echo $coverPath; ?>');"></div>
                                            <div class="card-body d-block pt-4 text-center position-relative">
                                                <figure class="avatar mt--6 position-relative w250 z-index-1 w100 z-index-1 ms-auto me-auto" style="border:1px solid black; border-radius:5px;"><img src="<?php echo $imagePath; ?>" alt="image" class="p-1 bg-white rounded-xl w-100"></figure>

                                                <h4 class="font-xs ls-1 fw-700 text-grey-900">
                                                    <?php
                                                    echo $_SESSION['fullname'];
                                                    ?>
                                                    <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">
                                                    <?php echo $row['status']; ?></span>
                                                </h4>


                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-xxl-9 col-lg-8 pe-0">
                                        <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                            <div class="card-body d-block p-4">
                                                <h4 class="fw-700 mb-3 font-xsss text-grey-900">Your Profile</h4>

                                            </div>
                                            <h4 class="text-center fw-700 mb-3 font-xsss text-black-900"><i class="feather-user text-black-100 font-sm">Basic Info</i></h4>
                                            <div class="card-body d-flex pt-0">
                                                <i class="feather-user text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-700 text-grey-900 font-s mt-1"><?php echo $row['school_id']; ?></h4>
                                            </div>
                                            <div class="card-body d-flex pt-0">
                                                <i class="feather-user text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-700 text-grey-900 font-s mt-1"><?php echo $row['fullname']; ?></h4>
                                            </div>
                                            <h4 class="text-center fw-700 mb-3 font-xsss text-black-900"><i class="feather-phone text-black-100 font-sm">Contact Info</i></h4>
                                            <div class="card-body d-flex pt-0">
                                                <i class="feather-mail text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-700 text-grey-900 font-s mt-1"><?php echo $row['email']; ?></h4>
                                            </div>
                                            <div class="card-body d-flex pt-0">
                                                <i class="feather-mail text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-700 text-grey-900 font-s mt-1"><?php echo $row['number']; ?></h4>
                                            </div>
                                            <div class="card-body d-flex pt-0">
                                                <i class="feather-mail text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-700 text-grey-900 font-s mt-1"><?php echo $row['address']; ?></h4>
                                            </div>
                                            <h4 class="text-center fw-700 mb-3 font-xsss text-black-900"><i class="feather-edit-2 text-black-100 font-sm">Academic Info</i></h4>
                                            <div class="card-body d-flex pt-0">
                                                <i class="feather-user text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-700 text-grey-900 font-s mt-1"><?php echo $row['acadyr']; ?></h4>
                                            </div>
                                            <div class="card-body d-flex pt-0">
                                                <i class="feather-user text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-700 text-grey-900 font-s mt-1"><?php echo $row['role_in_school']; ?></h4>
                                            </div>
                                            <div class="card-body d-flex pt-0">
                                                <i class="feather-mail text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-700 text-grey-900 font-s mt-1"><?php echo $row['department']; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                } else {
                                    ?>
                                    
                                    <div class="col-xl-12">
                                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3 overflow-hidden">
                                        <div class="card-body position-relative h240 bg-image-cover bg-image-center" style="background-image: url();"></div>
                                        <div class="card-body d-block pt-4 text-center position-relative">
                                            <figure class="avatar mt--6 position-relative w250 z-index-1 w100 z-index-1 ms-auto me-auto" style="border:1px solid black; border-radius:5px;"><img src="" alt="image" class="p-1 bg-white rounded-xl w-100"></figure>

                                            <h4 class="font-xs ls-1 fw-700 text-grey-900">
                                                <?php
                                                echo $_SESSION['fullname'];
                                                ?>
                                                <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">
                                                    <?php
                                                    echo $_SESSION['dep_type'];
                                                    ?></span>
                                            </h4>


                                        </div>


                                    </div>
                                </div>
                                <div class="col-xl-8 col-xxl-9 col-lg-8 pe-0">
                                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                        <div class="card-body d-block p-4">
                                            <h4 class="fw-700 mb-3 font-xsss text-grey-900">Your Profile</h4>

                                        </div>
                                        <h4 class="text-center fw-700 mb-3 font-xsss text-black-900"><i class="feather-user text-black-100 font-sm">Basic Info</i></h4>
                                        <div class="card-body d-flex pt-0">
                                            <i class="feather-user text-grey-500 me-3 font-lg"></i>
                                            <h4 class="fw-700 text-grey-900 font-xssss mt-1"></h4>
                                        </div>
                                        <div class="card-body d-flex pt-0">
                                            <i class="feather-mail text-grey-500 me-3 font-lg"></i>
                                            <h4 class="fw-700 text-grey-900 font-xssss mt-1"></h4>
                                        </div>
                                        <h4 class="text-center fw-700 mb-3 font-xsss text-black-900"><i class="feather-phone text-black-100 font-sm">Contact Info</i></h4>
                                        <div class="card-body d-flex pt-0">
                                            <i class="feather-user text-grey-500 me-3 font-lg"></i>
                                            <h4 class="fw-700 text-grey-900 font-xssss mt-1"></h4>
                                        </div>
                                        <div class="card-body d-flex pt-0">
                                            <i class="feather-mail text-grey-500 me-3 font-lg"></i>
                                            <h4 class="fw-700 text-grey-900 font-xssss mt-1"></h4>
                                        </div>
                                        <h4 class="text-center fw-700 mb-3 font-xsss text-black-900"><i class="feather-edit-2 text-black-100 font-sm">Academic Info</i></h4>
                                        <div class="card-body d-flex pt-0">
                                            <i class="feather-user text-grey-500 me-3 font-lg"></i>
                                            <h4 class="fw-700 text-grey-900 font-xssss mt-1"></h4>
                                        </div>
                                        <div class="card-body d-flex pt-0">
                                            <i class="feather-mail text-grey-500 me-3 font-lg"></i>
                                            <h4 class="fw-700 text-grey-900 font-xssss mt-1"></h4>
                                        </div>
                                        <div class="card-body d-flex pt-0">
                                            <i class="feather-mail text-grey-500 me-3 font-lg"></i>
                                            <h4 class="fw-700 text-grey-900 font-xssss mt-1"></h4>
                                        </div>
                                    </div>
                                </div>
                                    
                                <?php
                                }
                                $row = mysqli_fetch_assoc($result);
                            } while ($row);
                            ?>



                            <div class="col-xl-4 col-xxl-3 col-lg-4">
                                <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                                    <!-- <div v-for="post in posts">
                                        <h4>{{post.names}}</h4>
                                    </div> -->
                                    <form class="profile" @submit="fnAlumniProfile($event)" method="post" enctype="multipart/form-data">


                                        <h4 class="fw-700 mb-3 font-xsss text-grey-900">Edit Your Profile</h4>
                                        <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>" id="">
                                        <div class="mb-1">
                                            <label class="form-label">School Id</label>
                                            <input type="number" class="form-control" name="school_id">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="fullname" value="<?php echo $_SESSION['fullname'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Number</label>
                                            <input type="text" class="form-control" name="number">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Year Graduated</label>
                                            <input type="text" class="form-control" name="acadyr">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">role in school</label>
                                            <select name="role_in_school" class="form-control">
                                                <option>Alumni</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">department</label>
                                            <select name="department" class="form-control">
                                                <option disabled>Choose</option>
                                                <option>BSIT</option>
                                                <option>BSHM</option>
                                                <option>BSED</option>
                                                <option>BEED</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Profile Picture</label>
                                            <input type="file" name="profile" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Cover Photo</label>
                                            <input type="file" name="cover" class="form-control">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>         

        </div>
    </div>
    <!-- 
    <script src="js/plugin.js"></script>
    <script src="js/lightbox.js"></script>
    <script src="js/scripts.js"></script> -->
    <script src="js/plugin.js"></script>
    <script src="js/lightbox.js"></script>
    <script src="js/scripts.js"></script>
    <script src="jsfiles/vue.3.js"></script>
    <script src="jsfiles/axios.js"></script>
    <script src="jsfiles/app.camp.js"></script>

</body><!-- Mirrored from uitheme.net/sociala/author-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Sep 2023 02:40:20 GMT -->

</html>