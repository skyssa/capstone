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
<style>
    .register input ,select, button {
        margin: 5px;
    }
</style>

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
                                        <li data-tab="tab-1" class="current"><a href="sign-in.php" title="">Sign in</a></li>
                                        <li data-tab="tab-2"><a href="#" title="">Sign up</a></li>
                                    </ul>
                                    <div class="sign_in_sec current" id="tab-1">
                                    <h3>Sign up</h3>
                                            <div>
                                                <form class="register" @submit="fnSaveRegister($event)">
                                                    <input type="text" name="fullname" placeholder="fullname">
                                                    <input type="text" name="username" placeholder="username">
                                                    <input type="password" name="password" id="" placeholder="password">
                                                    <select name="user_type">
                                                        <option disabled>User Type</option>
                                                        <option>Teacher</option>
                                                        <option>Student</option>
                                                    </select>
                                                    <select name="dep_type">
                                                        <option disabled>Dept Type</option>
                                                        <option>BSIT</option>
                                                        <option>BSHM</option>
                                                        <option>BSED</option>
                                                        <option>BEED</option>
                                                    </select>
                                                    <button type="submit">Register</button>
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

</html>