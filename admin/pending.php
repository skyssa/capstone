<?php
session_start();
include "assets/config/config.php";
if (!$_SESSION['fullname']) {
    echo '<script>window.location.href="sign-in.php";</script>';
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | Admin</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="assets/img/bootstraper-logo.png" alt="bootraper logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="users.php"><i class="fas fa-user-friends"></i>Users</a>
                </li>
                <li>
                    <a href="admin.php"><i class="fas fa-user-friends"></i>Admins</a>
                </li>
                <li>
                    <a href="reports.php"><i class="fas fa-file"></i>Reports</a>
                </li>
                <li>
                    <a href="post.php"><i class="fas fa-file"></i>Post</a>
                </li>
                <li>
                    <a href="pending.php"><i class="fas fa-cog"></i>pendings</a>
                </li>
            </ul>
        </nav>
        <div id="body" class="active">
            <!-- navbar navigation component -->
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light">
                    <i class="fas fa-bars"></i><span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i> <span>John Doe</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="" class="dropdown-item"><i class="fas fa-address-card"></i> Profile</a></li>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end of navbar navigation -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">Overview</div>
                            <h2 class="page-title">Teachers Request</h2>
                        </div>
                        <form action="../model/approve.php" method="post">
                            <table class="table table-striped" style="width:100%">

                                <?php
                                $query = "SELECT * FROM users WHERE approval = 'pending' ";
                                $result = mysqli_query($con, $query);
                                $row = mysqli_fetch_assoc($result);
                                do {
                                    if (!is_null($row) && isset($row['approval']) && $row['approval'] == 'pending'){
                                    // echo '';
                                    $imagePath = '../uploads/' . $row['pic'];
                                    $coverPath = '../uploads/' . $row['cover'];
                            
                                    ?>
                                    <thead>
                                        <tr>
                                            <th>School Id</th>
                                            <th>Full Name</th>
                                            <th>email</th>
                                            <th>address</th>
                                            <th>number</th>
                                            <th>role in school</th>
                                            <th>department type</th>
                                            <th>Profile Photo</th>
                                            <th>cover Photo</th>
                                            <th>date registered</th>
                                            <th>status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['school_id']; ?></td>
                                            <td><?php echo $row['fullname']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['number']; ?></td>
                                            <td><?php echo $row['role_in_school']; ?></td>
                                            <td><?php echo $row['department']; ?></td>
                                            <td><img src="<?php echo $imagePath; ?>" class="img-fluid" alt="Image description"></td>
                                            <td><img src="<?php echo $coverPath; ?>" class="img-fluid" alt="Image description"></td>
                                            <td><?php echo $row['date_registered']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td>
                                                    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="approve" class="btn btn-info">Approve</button>
                                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php 
                                    }else{
                                        echo'<h4>NO REQUEST AT THE MOMENT</h4>';

                                    }
                                $row = mysqli_fetch_assoc($result);
                                } while ($row);
                                ?>

                            </table>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/datatables/datatables.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/js/script.js"></script>\
    <script src="assets/js/vue.3.js"></script>
    <script src="assets/js/axios.js"></script>
    <script src="assets/js/app.list.js"></script>
</body>

</html>