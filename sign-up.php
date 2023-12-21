<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CPC - cc Online</title>

    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/CPC.jpg">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">



</head>

<body class="color-theme-blue">

    <div class="preloader"></div>
    <div id="camp-app" z>
        <div class="main-wrap">
            <div class="nav-header bg-transparent shadow-none border-0">
                <div class="nav-top w-100">
                    <a href="sign-in.php" class="header-btn d-none d-lg-block bg-dark fw-500 text-white font-xsss p-3 ms-auto w100 text-center lh-20 rounded-xl">Login</a>
                    <a href="sign-up.php" class="header-btn d-none d-lg-block bg-current fw-500 text-white font-xsss p-3 ms-2 w100 text-center lh-20 rounded-xl">Register</a>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-xl-5 d-none d-xl-block"><img style="margin-left:30px; margin-top:80px; height:750px;" src="img/CPC.jpg" alt=""></div>
                 -->
                <div style="width: 41.66666667%; float: left;" class="d-none d-xl-block">
                    <img style="margin-left: 30px; margin-top: 80px; width: 95%; height: auto;" src="img/CPC.jpg" alt="">
                </div>

                <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                    <div class="card shadow-none border-0 ms-auto me-auto login-card">
                        <div class="card-body rounded-0 text-left">
                            <h2 class="fw-700 display1-size display2-md-size mb-4">Create <br>your account</h2>
                            <form action="sign-up.php" method="POST" class="register"><!-- @submit="fnSaveRegister($event)" -->

                                <div class="form-group icon-input mb-3">
                                    <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                    <input type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" name="fullname" placeholder="Fullname">
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                    <input type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" name="username" placeholder="username">
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input type="Password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" name="password" placeholder="password">
                                    <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <select name="user_type" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3">
                                        <option disabled>User Type</option>
                                        <option>Teacher</option>
                                        <option>Student</option>
                                        <option>Alumni</option>
                                    </select>
                                </div>
                                <div class="form-group icon-input mb-1">
                                    <select name="dep_type" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3">
                                        <option disabled>Dept Type</option>
                                        <option>BSIT</option>
                                        <option>BSHM</option>
                                        <option>BSED</option>
                                        <option>BEED</option>
                                    </select>
                                </div>

                                <br>
                                <div class="col-sm-12 p-0 text-left">
                                    <div class="form-group mb-1"><button type="submit" name="register" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Register</button></div>
                                </div>
                            </form>
                            <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have account <a href="sign-in.php" class="fw-700 ms-1">Login</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include './includes/config.php';
    if (isset($_POST['register'])) {
        $fname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];
        $dep_type = $_POST['dep_type'];

        $query = $conn->prepare('INSERT INTO tbl_user(name,username,password,user_type,dep_type,isdeleted,date_created) values(?,?,?,?,?,1,now())');;
        $query->bind_param('sssss', $fname, $username, $password, $user_type, $dep_type);

        if ($query->execute()) {
            echo '<script type="text/javascript">';
            echo 'alert("User successfully saved");';
            echo 'window.location.href="sign-in.php";';
            echo '</script>';
        } else {
            echo json_encode(mysqli_error($conn));
            echo '<script>console.log(query)</script>';
        }
    }
    ?>
    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/vue.3.js"></script>
    <script src="js/axios.js"></script>
    <script src="js/app.camp.js"></script>
</body>

</html>