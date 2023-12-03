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
    <div id="camp-app" >
        <div class="main-wrap">
            <div class="nav-header bg-transparent shadow-none border-0">
                <div class="nav-top w-100">
                    <a href="sign-in.php" class="header-btn d-none d-lg-block bg-dark fw-500 text-white font-xsss p-3 ms-auto w100 text-center lh-20 rounded-xl">Login</a>
                    <a href="sign-up.php" class="header-btn d-none d-lg-block bg-current fw-500 text-white font-xsss p-3 ms-2 w100 text-center lh-20 rounded-xl">Register</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 d-none d-xl-block"><img style="margin-left:30px; margin-top:80px; height:750px;" src="img/CPC.jpg" alt=""></div>
                <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                    <div class="card shadow-none border-0 ms-auto me-auto login-card">
                        <div class="card-body rounded-0 text-left">
                            <h2 class="fw-700 display1-size display2-md-size mb-4">Log In <br>your account</h2>
                            <form class="register" @submit="fnLogin($event)">
                                <div class="form-group icon-input mb-3">
                                    <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                    <input type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" name="username" placeholder="username">
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input type="Password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" name="password" placeholder="password">
                                    <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                                </div>
                                <br>
                                <div class="col-sm-12 p-0 text-left">
                                    <div class="form-group mb-1"><button type="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Register</button></div>
                                </div>
                            </form>
                            <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Dont have account <a href="sign-up.php" class="fw-700 ms-1">Register</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
    <script src="jsfiles/vue.3.js"></script>
    <script src="jsfiles/axios.js"></script>
    <script src="jsfiles/app.camp.js"></script>

</body>

</html>



<!-- <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CampusComm.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="cssfiles/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="cssfiles/style2.css">
    <link rel="stylesheet" type="text/css" href="cssfiles/responsive.css">
</head>

<body class="sign-in">
    <div id="camp-app">
        <div class="wrapper">
            <div class="sign-in-page">
                <div class="signin-popup">
                    <div class="signin-pop">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="cmp-info">
                                    <div class="cm-logo">
                                        <img src="img/Untitled-1.png" alt="">
                                        <p></p>
                                    </div>
                                    <img src="" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="login-sec">
                                    <ul class="sign-control">
                                        <li data-tab="tab-1" class="current"><a href="#" title="">Sign in</a></li>
                                        <li data-tab="tab-2"><a href="sign-up.php" title="">Sign up</a></li>
                                    </ul>
                                    <div class="sign_in_sec current" id="tab-1">
                                        <h3>Sign in</h3>
                                        <div>
                                            <form @submit="fnLogin($event)">
                                                <div class="row">
                                                    <div class="col-lg-12 no-pdd">
                                                        <div class="sn-field">
                                                            <input required type="text" name="username" placeholder="Username" style=" color: black;">
                                                            <i class="la la-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 no-pdd">
                                                        <div class="sn-field">
                                                            <input required type="password" name="password" placeholder="Password" style=" color: black;">
                                                            <i class="la la-lock"></i>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-lg-12 no-pdd">
                                                        <button type="submit">Log In</button>
                                                    </div>
       
                                                </div>
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
    </div>
    <script type="text/javascript" src="jsfiles/jquery.min.js"></script>
    <script type="text/javascript" src="jsfiles/script.js"></script>
    <script src="jsfiles/vue.3.js"></script>
    <script src="jsfiles/axios.js"></script>
    <script src="jsfiles/app.camp.js"></script>
   
</body>

</html> -->