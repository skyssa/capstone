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

</head>

<body class="color-theme-blue mont-font loaded">

    <div class="preloader" style="display: none;"></div>

    <div id="camp-app">
        <div class="main-wrapper">

            <!-- navigation top-->
            <div class="nav-header bg-white shadow-xs border-0">
                <div class="nav-top">
                    <a href="teacherhome.html"><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">CampusComm Profile Page</span>
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
                                if ($row != 0) {

                                    echo '<li><a href="profilerole.php" class="nav-content-bttn open-font"><img src="uploads/' . $row["pic"] . '" alt="" style="width: 50px; height: 50px; border-radius: 50px; margin-right: 10px;" ><span>' . $row["name"] . '</span></a></li>
                                        ';
                                } else {
                                    echo '<li><a href="profilerole.php" class="nav-content-bttn open-font"><span>Create Profile</span></a></li>';
                                }
                                ?>                                                                                                                                            
                                <li><a href="tdepartment.php" class="nav-content-bttn open-font"><i class="feather-home btn-round-md bg-blue-gradiant me-3"></i><span>Department</span></a></li>
                                            <li><a href="chat.php" class="nav-content-bttn open-font"><i class="feather-inbox btn-round-md bg-blue-gradiant me-3"></i><span>Message</span></a></li>
                                            <li><a href="schoolmap.php" class="nav-content-bttn open-font"><i class="feather-map-pin btn-round-md bg-blue-gradiant me-3"></i><span>School Map</span></a></li>
                                            <li><a href="logout.php" class="nav-content-bttn open-font"><i class="feather-inbox btn-round-md bg-blue-gradiant me-3"></i><span>Log Out</span></a></li>
                            </ul>
                        </div>
                        <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1">
                            <div class="nav-caption fw-600 font-xssss text-grey-500"><span></span> Account</div>
                            <ul class="mb-1">
                                            <li><a href="https://www.facebook.com/cpcofficial2005" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-facebook me-3 text-grey-500"></i><span>Facebook</span></a></li>
                                           

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
                                                <figure class="avatar mt--6 position-relative w250 z-index-1 w100 z-index-1 ms-auto me-auto" style="border-radius:5px;"><img src="<?php echo $imagePath; ?>" alt="image" class="p-1 bg-white rounded-xl w-100"></figure>

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
                                    <form class="profile" @submit="fnSaveProfile($event)" method="post" enctype="multipart/form-data">


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
                                            <label class="form-label">role in school</label>
                                            <select name="role_in_school" class="form-control">
                                                <option disabled>Choose</option>
                                                <option>Dean</option>
                                                <option>Chairperson</option>
                                                <option>Accounting</option>
                                                <option>Faculty</option>
                                                <option>Part-time</option>
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
            <!-- main content -->

            <!-- right chat -->
            <div class="right-chat nav-wrap mt-2 right-scroll-bar">
                                    <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">


                                        <div class="section full pe-3 ps-4 pt-4 position-relative feed-body">

                                            <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">CONTACTS</h4>
                                            <ul class="list-group list-group-flush">

                                                <?php
                                                $query_user = mysqli_query($conn, "SELECT * FROM tbl_user ORDER BY dep_type='BSIT' DESC");
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


            <!-- right chat -->

            <div class="app-footer border-0 shadow-lg bg-primary-gradiant">
                <a href="default.html" class="nav-content-bttn nav-center"><i class="feather-home"></i></a>
                <a href="default-video.html" class="nav-content-bttn"><i class="feather-package"></i></a>
                <a href="default-live-stream.html" class="nav-content-bttn" data-tab="chats"><i class="feather-layout"></i></a>
                <a href="shop-2.html" class="nav-content-bttn"><i class="feather-layers"></i></a>
                <a href="default-settings.html" class="nav-content-bttn"><img src="images/female-profile.png" alt="user" class="w30 shadow-xss"></a>
            </div>

            <div class="app-header-search">
                <form class="search-form">
                    <div class="form-group searchbox mb-0 border-0 p-1">
                        <input type="text" class="form-control border-0" placeholder="Search...">
                        <i class="input-icon">
                            <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                        </i>
                        <a href="#" class="ms-1 mt-1 d-inline-block close searchbox-close">
                            <i class="ti-close font-xs"></i>
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="modal bottom side fade" id="Modalstries" tabindex="-1" role="dialog" style=" overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 bg-transparent">
                <button type="button" class="close mt-0 position-absolute top--30 right--10" data-dismiss="modal" aria-label="Close"><i class="ti-close text-white font-xssss"></i></button>
                <div class="modal-body p-0">
                    <div class="card w-100 border-0 rounded-3 overflow-hidden bg-gradiant-bottom bg-gradiant-top">
                        <div class="owl-carousel owl-theme dot-style3 story-slider owl-dot-nav nav-none owl-loaded owl-drag">





                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                                    <div class="owl-item">
                                        <div class="item"><img src="images/story-5.jpg" alt="image"></div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="item"><img src="images/story-6.jpg" alt="image"></div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="item"><img src="images/story-7.jpg" alt="image"></div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="item"><img src="images/story-8.jpg" alt="image"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="ti-angle-left icon-nav"></i></button><button type="button" role="presentation" class="owl-next"><i class="ti-angle-right icon-nav"></i></button></div>
                            <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button></div>
                        </div>
                    </div>
                    <div class="form-group mt-3 mb-0 p-3 position-absolute bottom-0 z-index-1 w-100">
                        <input type="text" class="style2-input w-100 bg-transparent border-light-md p-3 pe-5 font-xssss fw-500 text-white" value="Write Comments">
                        <span class="feather-send text-white font-md text-white position-absolute" style="bottom: 35px;right:30px;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal-popup-chat">
        <div class="modal-popup-wrap bg-white p-0 shadow-lg rounded-3">
            <div class="modal-popup-header w-100 border-bottom">
                <div class="card p-3 d-block border-0 d-block">
                    <figure class="avatar mb-0 float-left me-2">
                        <img src="images/user-12.png" alt="image" class="w35 me-1">
                    </figure>
                    <h5 class="fw-700 text-primary font-xssss mt-1 mb-1">Hendrix Stamp</h5>
                    <h4 class="text-grey-500 font-xsssss mt-0 mb-0"><span class="d-inline-block bg-success btn-round-xss m-0"></span> Available</h4>
                    <a href="#" class="font-xssss position-absolute right-0 top-0 mt-3 me-4"><i class="ti-close text-grey-900 mt-2 d-inline-block"></i></a>
                </div>
            </div>
            <div class="modal-popup-body w-100 p-3 h-auto">
                <div class="message">
                    <div class="message-content font-xssss lh-24 fw-500">Hi, how can I help you?</div>
                </div>
                <div class="date-break font-xsssss lh-24 fw-500 text-grey-500 mt-2 mb-2">Mon 10:20am</div>
                <div class="message self text-right mt-2">
                    <div class="message-content font-xssss lh-24 fw-500">I want those files for you. I want you to send 1 PDF and 1 image file.</div>
                </div>
                <div class="snippet pt-3 ps-4 pb-2 pe-3 mt-2 bg-grey rounded-xl float-right" data-title=".dot-typing">
                    <div class="stage">
                        <div class="dot-typing"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-popup-footer w-100 border-top">
                <div class="card p-3 d-block border-0 d-block">
                    <div class="form-group icon-right-input style1-input mb-0"><input type="text" placeholder="Start typing.." class="form-control rounded-xl bg-greylight border-0 font-xssss fw-500 ps-3"><i class="feather-send text-grey-500 font-md"></i></div>
                </div>
            </div>
        </div>
    </div> -->

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



    <div id="lightboxOverlay" tabindex="-1" class="lightboxOverlay" style="display: none;"></div>
    <div id="lightbox" tabindex="-1" class="lightbox" style="display: none;">
        <div class="lb-outerContainer">
            <div class="lb-container"><img class="lb-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="">
                <div class="lb-nav"><a class="lb-prev" aria-label="Previous image" href=""></a><a class="lb-next" aria-label="Next image" href=""></a></div>
                <div class="lb-loader"><a class="lb-cancel"></a></div>
            </div>
        </div>
        <div class="lb-dataContainer">
            <div class="lb-data">
                <div class="lb-details"><span class="lb-caption"></span><span class="lb-number"></span></div>
                <div class="lb-closeContainer"><a class="lb-close"></a></div>
            </div>
        </div>
        <div class="right-comment chat-left scroll-bar theme-dark-bg">
            <div class="card-body ps-2 pe-4 pb-0 d-flex">
                <figure class="avatar me-3"><img src="images/user-8.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                <h4 class="fw-700 text-grey-900 font-xssss mt-1 text-left">Hurin Seary <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">2 hour ago</span></h4> <a href="#" class="ms-auto"><i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
            </div>
            <div class="card-body d-flex ps-2 pe-4 pt-0 mt-0"> <a href="#" class="d-flex align-items-center fw-600 text-grey-900 lh-26 font-xssss me-3 text-dark"><i class="feather-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss"></i> <i class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xss"></i>2.8K Like</a> <a href="#" class="d-flex align-items-center fw-600 text-grey-900 lh-26 font-xssss text-dark"><i class="feather-message-circle text-grey-900 btn-round-sm font-lg text-dark"></i>22 Comment</a></div>
            <div class="card w-100 border-0 shadow-none right-scroll-bar">
                <div class="card-body border-top-xs pt-4 pb-3 pe-4 d-block ps-5">
                    <figure class="avatar position-absolute left-0 ms-2 mt-1"><img src="images/user-6.png" alt="image" class="shadow-sm rounded-circle w35"></figure>
                    <div class="chat p-3 bg-greylight rounded-xxl d-block text-left theme-dark-bg">
                        <h4 class="fw-700 text-grey-900 font-xssss mt-0 mb-1">Victor Exrixon <a href="#" class="ms-auto"><i class="ti-more-alt float-right text-grey-800 font-xsss"></i></a></h4>
                        <p class="fw-500 text-grey-500 lh-20 font-xssss w-100 mt-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor.</p>
                    </div>
                </div>
                <div class="card-body pt-0 pb-3 pe-4 d-block ps-5">
                    <figure class="avatar position-absolute left-0 ms-2 mt-1"><img src="images/user-4.png" alt="image" class="shadow-sm rounded-circle w35"></figure>
                    <div class="chat p-3 bg-greylight rounded-xxl d-block text-left theme-dark-bg">
                        <h4 class="fw-700 text-grey-900 font-xssss mt-0 mb-1">Surfiya Zakir <a href="#" class="ms-auto"><i class="ti-more-alt float-right text-grey-800 font-xsss"></i></a></h4>
                        <p class="fw-500 text-grey-500 lh-20 font-xssss w-100 mt-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor.</p>
                    </div>
                </div>
                <div class="card-body pt-0 pb-3 pe-4 d-block ps-5 ms-5 position-relative">
                    <figure class="avatar position-absolute left-0 ms-2 mt-1"><img src="images/user-3.png" alt="image" class="shadow-sm rounded-circle w35"></figure>
                    <div class="chat p-3 bg-greylight rounded-xxl d-block text-left theme-dark-bg">
                        <h4 class="fw-700 text-grey-900 font-xssss mt-0 mb-1">Goria Coast <a href="#" class="ms-auto"><i class="ti-more-alt float-right text-grey-800 font-xsss"></i></a></h4>
                        <p class="fw-500 text-grey-500 lh-20 font-xssss w-100 mt-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="card-body pt-0 pb-3 pe-4 d-block ps-5 ms-5 position-relative">
                    <figure class="avatar position-absolute left-0 ms-2 mt-1"><img src="images/user-3.png" alt="image" class="shadow-sm rounded-circle w35"></figure>
                    <div class="chat p-3 bg-greylight rounded-xxl d-block text-left theme-dark-bg">
                        <h4 class="fw-700 text-grey-900 font-xssss mt-0 mb-1">Hurin Seary <a href="#" class="ms-auto"><i class="ti-more-alt float-right text-grey-800 font-xsss"></i></a></h4>
                        <p class="fw-500 text-grey-500 lh-20 font-xssss w-100 mt-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="card-body pt-0 pb-3 pe-4 d-block ps-5 ms-5 position-relative">
                    <figure class="avatar position-absolute left-0 ms-2 mt-1"><img src="images/user-3.png" alt="image" class="shadow-sm rounded-circle w35"></figure>
                    <div class="chat p-3 bg-greylight rounded-xxl d-block text-left theme-dark-bg">
                        <h4 class="fw-700 text-grey-900 font-xssss mt-0 mb-1">David Goria <a href="#" class="ms-auto"><i class="ti-more-alt float-right text-grey-800 font-xsss"></i></a></h4>
                        <p class="fw-500 text-grey-500 lh-20 font-xssss w-100 mt-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="card-body pt-0 pb-3 pe-4 d-block ps-5">
                    <figure class="avatar position-absolute left-0 ms-2 mt-1"><img src="images/user-4.png" alt="image" class="shadow-sm rounded-circle w35"></figure>
                    <div class="chat p-3 bg-greylight rounded-xxl d-block text-left theme-dark-bg">
                        <h4 class="fw-700 text-grey-900 font-xssss mt-0 mb-1">Seary Victor <a href="#" class="ms-auto"><i class="ti-more-alt float-right text-grey-800 font-xsss"></i></a></h4>
                        <p class="fw-500 text-grey-500 lh-20 font-xssss w-100 mt-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor.</p>
                    </div>
                </div>
                <div class="card-body pt-0 pb-3 pe-4 d-block ps-5">
                    <figure class="avatar position-absolute left-0 ms-2 mt-1"><img src="images/user-4.png" alt="image" class="shadow-sm rounded-circle w35"></figure>
                    <div class="chat p-3 bg-greylight rounded-xxl d-block text-left theme-dark-bg">
                        <h4 class="fw-700 text-grey-900 font-xssss mt-0 mb-1">Ana Seary <a href="#" class="ms-auto"><i class="ti-more-alt float-right text-grey-800 font-xsss"></i></a></h4>
                        <p class="fw-500 text-grey-500 lh-20 font-xssss w-100 mt-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor.</p>
                    </div>
                </div>
                <div class="card-body pt-0 pb-3 pe-4 d-block ps-5">
                    <figure class="avatar position-absolute left-0 ms-2 mt-1"><img src="images/user-4.png" alt="image" class="shadow-sm rounded-circle w35"></figure>
                    <div class="chat p-3 bg-greylight rounded-xxl d-block text-left theme-dark-bg">
                        <h4 class="fw-700 text-grey-900 font-xssss mt-0 mb-1">Studio Express <a href="#" class="ms-auto"><i class="ti-more-alt float-right text-grey-800 font-xsss"></i></a></h4>
                        <p class="fw-500 text-grey-500 lh-20 font-xssss w-100 mt-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body><!-- Mirrored from uitheme.net/sociala/author-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Sep 2023 02:40:20 GMT -->

</html>