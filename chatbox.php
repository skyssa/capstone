<?php
session_start();
include "includes/config.php";

if (!$_SESSION['fullname']) {
     echo '<script>window.location.href="sign-in.php";</script>';
     exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CampusComm</title>
  <link rel="icon" href="rental.png">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/adminstyle.css">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="cssfiles/chat.css">

</head>

<body id="page-top">

  <div class="container">
    <div id="side1">
                  <a class="nav-link" href="role.php" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-dark small">
                        newsfeed
                    </span>
                </a>
    </div>
    <div id="side2">
                <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-dark small"><?php

                    $fullname = $_SESSION['fullname'];

                    $query = "SELECT * FROM tbl_user WHERE fullname = '$fullname' ";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    do {
                        $full = $row['fullname'];
                        echo $full;
                        $row = mysqli_fetch_assoc($result);
                    } while ($row);

                                                                        ?></span>
                  <!-- <img class="img-profile rounded-circle" src="user.png"> -->
                </a>
    </div>
    <div id="side3">
      <a href="logout.php">Log Out</a>
    </div>
  </div>

  <!-- Page Wrapper -->
  <div id="chat-app">
    <div id="wrapper">

      <!-- Sidebar -->
      <!-- <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: lightgray;" id="accordionSidebar">
        <li class="nav-item dropdown no-arrow">
                <a class="nav-link" href="role.php" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-dark small">
                        newsfeed
                    </span>
                </a>
              </li>

           
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-dark small"><?php

                    $fullname = $_SESSION['fullname'];

                    $query = "SELECT * FROM tbl_user WHERE fullname = '$fullname' ";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    do {
                        $full = $row['fullname'];
                        echo $full;
                        $row = mysqli_fetch_assoc($result);
                    } while ($row);

                                                                        ?></span>
                  <img class="img-profile rounded-circle" src="user.png"> 
                </a>
              </li>
              <li>
              <a href="logout.php">Log Out</a>
              </li>

      </ul> -->
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

           
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars" style="color:black"></i>
            </button>


            <ul class="navbar-nav ml-auto">


              <div class="topbar-divider d-none d-sm-block"></div>
              

            </ul>

          </nav> -->
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-dark" align="center">Messages</h1>


            
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="table-responsive">
                  <table>
                  <h5>send Messages</h5>
                    <thead>
                   
                      <th>To</th>
                      <th>Message</th>
                    </thead>
                    <tbody>
                      <?php 
                        $uid=$_SESSION['user_id'];
                        $query = "SELECT * FROM message WHERE fromuser='$uid'";
                        $result = $conn->query($query);
                      
                        while($row=$result->fetch_assoc()){

                          $tid=$row['touser'];
                          $query1 = "SELECT * FROM tbl_user WHERE user_id='$tid'";
                          $result1 = $conn->query($query1);
                          while ($row1=$result1->fetch_assoc()) {
                            echo "<tr>";
                          echo "<td>".$row1['fullname'].":</td>";
                          echo "<td id='convo'>".$row['message']."</td>";
                          echo "</tr>";
                          }
                          
                        }

                      ?>
                      <td></td>
                    </tbody>
                  </table>

                  <table>
                  <h5>receive Messages</h5>
                    <thead>
                   
                      <th>from</th>
                      <th>Message</th>
                    </thead>
                    <tbody>
                      <?php 
                        $uid=$_SESSION['user_id'];
                        $query = "SELECT * FROM message WHERE touser='$uid'";
                        $result = $conn->query($query);
                        
                        while($row=$result->fetch_assoc()){
                          $fid=$row['fromuser'];
                          $query1 = "SELECT * FROM tbl_user WHERE user_id='$fid'";
                          $result1 = $conn->query($query1);
                          while ($row1=$result1->fetch_assoc()) {
                            echo "<tr>";
                          echo "<td>".$row1['fullname'].":</td>";
                          echo "<td>".$row['message']."</td>";
                          echo "</tr>";
                          }
                        }

                      ?>
                    </tbody>
                  </table><br><br>
                  <form @submit="fnChat($event)">
                    <div>
                      <label for="from">From: </label>
                      <input type="hidden" name="from" value="<?php echo $_SESSION['user_id'] ?>"><?php echo $full?>
                          
                    </div>
                    <div>
                      <label for="">To: </label>
                      <?php
                            $sql = "SELECT * from tbl_user";
                            $result = mysqli_query($conn, $sql);
                            $row1 = mysqli_fetch_assoc($result);
                            echo "<select name='to'>";
                            echo "<option size='30'></option>";
                            while ($row1 = mysqli_fetch_assoc($result)) {
                              # code...
                              echo "<option value='" . $row1['user_id'] . "'>" . $row1['fullname'] . "</option>";
                            }
                            echo "</select>";
                            ?>
                    </div>
                    <div>
                      <textarea class='form-control' name="msg"></textarea>
                    </div>
                    <div id="send-chat">
                    <button type='submit' style="background-color: black; color:aliceblue;">Send Message</button>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>




          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
  </div>
  <!-- End of Page Wrapper -->

  <script src="jsfiles/vue.3.js"></script>
  <script src="jsfiles/axios.js"></script>
  <script>
    const {
      createApp
    } = Vue;

    createApp({
      data() {
        return {

        }
      },
      methods: {
        fnChat: function(e) {
          const vm = this;
          e.preventDefault();
          var form = e.currentTarget;
          const data = new FormData(form);
          data.append('method','fnChat');
          axios.post('model/listModel.php', data)
            .then(function(r) {
              console.log(r);
              if (r.data == 1) {
                alert('Message successfully send');
                window.location.href = "chatbox.php";
              } else {
                alert('there was an error');
              }

            })
        },

      },
      created: function() {

      }
    }).mount('#chat-app')
  </script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>




</body>

</html>