<!DOCTYPE html>
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
                                                    <!-- <button type="button" style="margin-left:20px;">login</button> -->
                                                </div>
                                            </form>
                                            <!-- <div class="col-lg-12 no-pdd">
                                                        <button onclick="showpass">Show password</button>
                                                    </div>  -->

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

</html>