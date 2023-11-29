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

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <link href="cssfiles/chat.css" rel="stylesheet">
</head>

<body id="page-top">

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3">
        <div class="card mt-3">
          <div class="card-body">
            <a class="nav-link" href="role.php" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-dark small">Newsfeed</span>
            </a>
          </div>

          <div class="card-body">
            <span class="mr-2 d-none d-lg-inline text-dark small">
              <?php
              $fullname = $_SESSION['fullname'];

              $query = "SELECT * FROM tbl_user WHERE fullname = '$fullname' ";
              $result = mysqli_query($conn, $query);
              $row = mysqli_fetch_assoc($result);
              do {
                  $full = $row['fullname'];
                  echo $full;
                  $row = mysqli_fetch_assoc($result);
              } while ($row);
              ?>
            </span>
          </div>
        </div>
      </div>


      <!-- Main Content -->
      <div class="col-md-6">
        <div class="card mt-3">
          <div class="card-header">
            <h1 class="h3 mb-2 text-dark">Messenger</h1>
          </div>
          <div class="card-body">
            <!-- Messages section -->
            <div class="messages-section">
              <!-- Send Messages -->
              <div class="send-messages">
                <!-- Add your code for displaying sent messages here -->
                <ul class="list-group">
                  <li class="list-group-item">
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
                  </li>
                  <!-- Add more sent messages as needed -->
                </ul>
              </div>
              <!-- Receive Messages -->
              <div class="receive-messages mt-3">
                <!-- Add your code for displaying received messages here -->
                <ul class="list-group">
                  <li class="list-group-item">
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
                  </li>
                  <!-- Add more received messages as needed -->
                </ul>
              </div>
            </div>

            <!-- Chat input form -->
            <form @submit="fnChat($event)">
                <div>
                      <label for="from">From: </label>
                      <input type="hidden" name="from" value="<?php echo $_SESSION['user_id'] ?>"><?php echo $full?>
                          
                    </div>
                    <div class="form-group mt-3">
                      <label for="">To: </label>
                      <?php
                            $sql = "SELECT * from tbl_user";
                            $result = mysqli_query($conn, $sql);
                            $row1 = mysqli_fetch_assoc($result);
                            echo "<select class='form-control' name='to'>";
                            echo "<option size='30'></option>";
                            while ($row1 = mysqli_fetch_assoc($result)) {
                              # code...
                              echo "<option value='" . $row1['user_id'] . "'>" . $row1['fullname'] . "</option>";
                            }
                            echo "</select>";
                            ?>
                    </div>
              </div>
              <div class="form-group">
                <label for="msg">Message:</label>
                <textarea class="form-control" name="msg"></textarea>
              </div>
              <button type="submit" class="btn btn-dark">Send Message</button>
            </form>
          </div>
        </div>
      </div>

      <!-- User Profile and Log Out -->
      <div class="col-md-3">
        <div class="card mt-3">
          
        </div>
        <div class="card mt-3">
          <div class="card-body">
            <a href="logout.php">Log Out</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Your custom scripts -->
  <script src="jsfiles/vue.3.js"></script>
  <script src="jsfiles/axios.js"></script>
  <script>
    const {
      createApp
    } = Vue;

    createApp({
      data() {
        return {};
      },
      methods: {
        fnChat: function(e) {
          const vm = this;
          e.preventDefault();
          var form = e.currentTarget;
          const data = new FormData(form);
          data.append('method', 'fnChat');
          axios.post('model/listModel.php', data)
            .then(function(r) {
              console.log(r);
              if (r.data == 1) {
                alert('Message successfully sent');
                window.location.href = "chatbox.php";
              } else {
                alert('There was an error');
              }
            });
        },
      },
      created: function() {},
    }).mount('#chat-app');
  </script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

</body>

</html>