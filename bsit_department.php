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
        #preview {
            margin: 10px;
            display: flex;
            width: 100%;
            height: 100px;
            flex-wrap: wrap;
            overflow-y: scroll;
        }

        #preview img {
            width: 50%;
            height: 30%;
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
                    <a href="teacherhome.html"><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">CampusComm</span>
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
                                    $id=$_SESSION['user_id'];
                                     $query = "SELECT *
                                     FROM tbl_user AS tu
                                     JOIN users AS u ON tu.user_id = u.uid
                                     WHERE tu.user_id = $id;";
                                     $result = mysqli_query($conn, $query);
                                     $row = mysqli_fetch_assoc($result);
                                     if($row!=0){
                                        echo '<li><a href="profilerole.php" class="nav-content-bttn open-font"><img src="uploads/' . $row["pic"] . '" alt="" style="width: 60px; height: 40px;"><span>' . $row["name"] . '</span></a></li>
                                        ';
                                        
                                     }
                                ?>
                                
                                <li><a href="role.php" class="nav-content-bttn open-font"><i class="feather-tv btn-round-md bg-blue-gradiant me-3"></i><span>Newsfeed</span></a></li>
                                <li><a href="tdepartment.php" class="nav-content-bttn open-font"><i class="feather-home btn-round-md bg-blue-gradiant me-3"></i><span>Department</span></a></li>
                                <li><a href="chat.php" class="nav-content-bttn open-font"><i class="feather-inbox btn-round-md bg-blue-gradiant me-3"></i><span>Message</span></a></li>
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
                        <!-- loader wrapper -->
                        <div class="preloader-wrap p-3" style="display: none;">
                            <div class="box shimmer">
                                <div class="lines">
                                    <div class="line s_shimmer"></div>
                                    <div class="line s_shimmer"></div>
                                    <div class="line s_shimmer"></div>
                                    <div class="line s_shimmer"></div>
                                </div>
                            </div>
                            <div class="box shimmer mb-3">
                                <div class="lines">
                                    <div class="line s_shimmer"></div>
                                    <div class="line s_shimmer"></div>
                                    <div class="line s_shimmer"></div>
                                    <div class="line s_shimmer"></div>
                                </div>
                            </div>
                            <div class="box shimmer">
                                <div class="lines">
                                    <div class="line s_shimmer"></div>
                                    <div class="line s_shimmer"></div>
                                    <div class="line s_shimmer"></div>
                                    <div class="line s_shimmer"></div>
                                </div>
                            </div>
                        </div>
                        <!-- loader wrapper -->
                        <div class="row feed-body">
                            <div class="col-xl-8 col-xxl-9 col-lg-8">
                                <div class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3">
                                    <a href="#" class=" font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"><i class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight"></i>Create
                                        Post</a>
                                    <!-- post -->
                                    <!-- <form enctype="multipart/form-data" @submit="fnSavePost($event)">
                                        <input type="hidden" name="name" value="<?php echo $_SESSION['fullname']; ?>" id="">
                                        <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>" id="">
                                        <div class="form-group">
                                            <textarea name="description" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?"></textarea>

                                        </div>
                                        <div class="form-group">

                                            <div id="imageInputsContainer">
                                                <input type="file" name="productimage" id="fileimg" multiple>
                                            </div>

                                            <button type="submit" class="btn btn-primary">
                                                Post
                                            </button>
                                        </div>
                                    </form> -->
                                    <form enctype="multipart/form-data" @submit="fnSavebsit($event)">
                                        <input type="hidden" name="name" value="<?php echo $_SESSION['fullname']; ?>" id="">
                                        <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>" id="">
                                        <div class="form-group">
                                            <textarea name="description" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?"></textarea>

                                        </div>
                                        <div class="form-group">
                                           
                                            <div id="imageInputsContainer">
                                                <input type="file" name="productimage" id="fileimg"  multiple >
                                             
                                            </div>
                                    
                                            <button type="submit"  class="btn btn-primary">
                                                Post
                                            </button>
                                        </div>
                                    </form> 
                                </div>


                                <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3" v-for="post in posts">
                                    <div class="card-body p-0 d-flex">
                                        <figure class="avatar me-3"><i class="fa fa-user"></i></figure>
                                        <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{post.names}}<span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{post.date_created}}</span>
                                        </h4>
                                        <a href="#" class="ms-auto" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu2" style="margin: 0px;">

                                        </div>
                                    </div>
                                    <div class="card-body p-0 me-lg-5">
                                        <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">
                                            {{ post.description }}
                                            <a href="#" class="fw-600 text-primary ms-2">See more</a>
                                        </p>
                                    </div>
                                    <div class="card-body d-block p-0">
                                        <div class="row ps-2 pe-2">
                                            <div class="col-xs-12 col-sm-12 p-1">
                                                <img id="imahe" class="img-fluid" :src="'uploads/' + post.image" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex p-0 mt-3">
                                        <div class="container">
                                            <!-- Trigger the modal with a button -->
                                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#commentModal"><i class="fas fa-comment"></i>Comment</button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="commentModal" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Comments</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form @submit="fnSaveComment($event)">
                                                                <input type="hidden" name="pid" value="{{ post.post_id }}">
                                                                <input type="hidden" name="id" value="<?php echo $_SESSION['user_id'] ?>">
                                                                <input type="hidden" name="uname" value="<?php echo $_SESSION['fullname'] ?>">
                                                                <textarea name="comment" id="comment" cols="30" rows="10" placeholder="comment"></textarea>
                                                                <button type="submit">save comment</button>
                                                            </form>
                                                            <div class="card" v-for="comment in comments">
                                                                <div class="card-heading">
                                                                    <div class="cardtitle">
                                                                        <h6>{{ comment.uname}}</h6>
                                                                    </div>
                                                                </div>

                                                                <div class="card-content">
                                                                    <p>{{ comment.comment }}<br></p> <br><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="container">

                                            <!-- Trigger the modal with a button -->
                                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-cog"></i>Report</button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal" role="dialog">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Reports</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form @submit="fnSaveReport($event)">
                                                                <?php $pid = "{{    post.post_id }}"; ?>
                                                                <input type="text" name="postid" v-if="post.post_id" value="{{ post.post_id }}">
                                                                <input type="hidden" name="id" value="<?php echo $_SESSION['user_id'] ?>">
                                                                <select name="report_type">
                                                                    <option disabled>report Type</option>
                                                                    <option>sexuall content</option>
                                                                    <option>inapproriate</option>
                                                                    <option>illegal content</option>
                                                                    <option>illegal trading</option>
                                                                </select>
                                                                <button type="submit">submit report</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                                    <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                                        <div class="stage">
                                            <div class="dot-typing"></div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-xl-4 col-xxl-3 col-lg-4 ps-lg-0">
                                <div class="card w-100 shadow rounded border-0 mb-3">
                                    <div class="card-body d-flex align-items-center p-4">
                                        <h4 class="fw-700 mb-0 font-xssss text-primary">Announcement</h4>
                                        <button type="button" class="btn btn-info ml-auto" data-toggle="modal" data-target="#announceModal">
                                            See all
                                        </button>

                                        <!-- Announcement Modal -->
                                        <div class="modal fade" id="announceModal" tabindex="-1" role="dialog" aria-labelledby="announceModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header bg-primary text-white">
                                                        <h5 class="modal-title" id="announceModalLabel">Announcement</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <!-- Modal Body -->
                                                    <div class="modal-body">
                                                        <!-- Form to submit announcements -->
                                                        <form @submit="fnSaveAnnouncement($event)">
                                                            <div class="form-group">
                                                                <label for="title" class="font-xssss fw-600 text-grey-500">Title:</label>
                                                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description" class="font-xssss fw-600 text-grey-500">Description:</label>
                                                                <textarea class="form-control" name="description" id="description" placeholder="Description" rows="3" required></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Announce</button>
                                                        </form>
                                                    </div>

                                                    <!-- Display announcements in the modal -->
                                                    <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                                                        <div class="card mt-3" v-for="announces in announce">
                                                            <div class="card-heading bg-primary text-white p-3">
                                                                <h6 class="font-xsssss mb-0">{{ announces.date_created }}</h6>
                                                                <h5 class="font-xs fw-600 mb-2">Title: {{ announces.title }}</h5>
                                                            </div>
                                                            <div class="card-content p-3">
                                                                <p class="font-xsssss mb-0">Content:</p>
                                                                <p class="font-xss fw-600 mb-2">{{ announces.description }}</p>
                                                                <p>{{announces.a_id}}</p>

                                                                <div class="d-flex justify-content-end mt-3">
                                                                    <button class="btn btn-danger mr-2" @click="deleteAnnouncement(index)">Delete</button>
                                                                    <button class="btn btn-primary" @click="editAnnouncement(index)">Edit</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="editAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="editAnnouncementModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <!-- Modal Header -->
                                                                <div class="modal-header bg-primary text-white">
                                                                    <h5 class="modal-title" id="editAnnouncementModalLabel">Edit Announcement</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <!-- Modal Body -->
                                                                <div class="modal-body">
                                                                    <!-- Form to edit announcements -->
                                                                    <form method="post">

                                                                        <div class="form-group">

                                                                            <label for="editTitle" class="font-xssss fw-600 text-grey-500">Title:</label>
                                                                            <input type="text" class="form-control" name="title" id="editTitle" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="editDescription" class="font-xssss fw-600 text-grey-500">Description:</label>
                                                                            <textarea class="form-control" name="description" id="editDescription" rows="3" required></textarea>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="height:100px;" class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                    <div class="card-body d-flex align-items-center  p-4">

                                        <h4 class="fw-700 mb-0 font-xssss text-grey-900">Event</h4>

                                        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                                            <div>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                                    CREATE EVENTS
                                                </button>

                                                <!-- event modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form @submit="fnSaveEvent($event)">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Title</label>
                                                                        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="date" class="form-label">Date</label>
                                                                        <input type="date" class="form-control" name="date" id="date" placeholder="Date">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="events" class="form-label">Event</label>
                                                                        <input type="text" class="form-control" name="events" id="events" placeholder="Event">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Create</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- event cards -->
                                                <div class="card mt-3" v-for="event in events">
                                                    <div class="card-heading">
                                                        <div class="card-title">
                                                            <h5>Event Title: {{ event.title }}<br></h5>
                                                            <h5>Date: {{ event.date }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="calendar"></div>
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
                                            $query_user = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_type='Student' OR user_type='Teacher' ");
                                            while ($data = mysqli_fetch_assoc($query_user)) {
                                                if ($data['user_id'] != $_SESSION['user_id'])
                                                    echo '<li><a href="chat.php?uid=' . $data["user_id"] . '">' . $data["name"] . ' - ' . $data["user_type"] . ' of ' . $data["dep_type"] . '</a></li>';
                                            }
                                            ?>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal bottom side fade" id="Modalstory" tabindex="-1" role="dialog" style=" overflow-y: auto;">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content border-0 bg-transparent">
                                <button type="button" class="close mt-0 position-absolute top--30 right--10" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-900 font-xssss"></i></button>
                                <div class="modal-body p-0">
                                    <div class="card w-100 border-0 rounded-3 overflow-hidden bg-gradiant-bottom bg-gradiant-top">
                                        <div class="owl-carousel owl-theme dot-style3 story-slider owl-dot-nav nav-none owl-loaded owl-drag">
                                            <div class="owl-stage-outer">
                                              sadsad
                                            </div>
                                          
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-XpST91Agn3uZd1QVq3JcNvLyA7uj13d3s9fQbY8bF2jW0JqJSFkh6DEVDJLbcQ8E" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy12aC9fv5+gM5bGgS7J2h2bjvZkmH4bY1" crossorigin="anonymous"></script>
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-ZJ/saCJAGQ8idK7LEp+qLKn4J7BFlwIeehtv8P0zW4QVDu1oSmSdsJbAMBUVpXy0VJlA1Nel3+8eQ+ZdLfyhLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js" integrity="sha512-E+4j1pwXlM+YJ5LreIj+SG/xMMzNBntZYx1Zc1fgP5Mt/EXi1z3r6D9uRw46bwnY4H7mogz74qrsjIQWwNHYFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script></script>
                    <script src="js/plugin.js"></script>
                    <script src="js/lightbox.js"></script>
                    <script src="js/scripts.js"></script>

                    <script src="jsfiles/vue.3.js"></script>
                    <script src="jsfiles/axios.js"></script>
                    <script src="jsfiles/app.camp.js"></script>
                    <!-- <script src="jsfiles/feature.js"></script> -->






</body><!-- Mirrored from uitheme.net/sociala/default.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 May 2023 17:15:45 GMT -->

</html>