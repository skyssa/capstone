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
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>CampusComm</title>
     <link rel="shortcut icon" href="/image/logo.jpeg" type="image/x-icon">

     <script src="https://kit.fontawesome.com/b06a377e67.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="cssfiles/home.css">
     <link rel="stylesheet" href="cssfiles/responsive.css">
     <link rel="stylesheet" href="cssfiles/navbarrespon.css">
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <script src="https://kit.fontawesome.com/b06a377e67.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="/cssfiles/home.css">
     <link rel="stylesheet" href="/cssfiles/responsive.css">
     <link rel="stylesheet" href="/cssfiles/navbarrespon.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<style>
     /* CSS Styles */
     body {
          font-family: Arial, sans-serif;
     }

     .post {
          background-color: #f5f6f7;
          padding: 10px;
          border-radius: 5px;
          margin-bottom: 20px;
          box-shadow: 3px 2px 2px gray;
     }

     .post-header {
          display: flex;
          align-items: center;
          margin-bottom: 10px;
     }

     .post-avatar {
          width: 40px;
          height: 40px;
          border-radius: 50%;
          margin-right: 10px;
     }

     .post-username {
          font-weight: bold;
     }

     .post-timestamp {
          color: #808080;
          font-size: 12px;
          margin-left: auto;
     }

     .post-content {
          margin-bottom: 10px;
     }

     .post-image {
          max-width: 10%;
          margin-bottom: 10px;
     }
     #imahe{
          width: 100%;
          padding: 10px;
     }
     .post-actions {
          display: flex;
          align-items: center;
          color: #606770;
          font-size: 14px;
     }

     .post-action {
          margin-right: 20px;
     }

     .post-action i {
          margin-right: 5px;
     }
     
     #post {
          width: 457px;
          height: 70px;
          border: 1px solid black;
          background-position: center;
          background-size: cover;
     }
</style>

<body>
     <div id="camp-app">
          <div id="mainbox">
          <div id="navbar">
                    <h1>Cc.</h1>
                    <h2></h2>
                    <ul>
                         <li><a href="role.php"><i class="fa-solid fa-house fa-fade fa-sm"></i><span> Home</span> </a></li>

                         <li><a href="chatbox.php"><i class="fa-brands fa-facebook-messenger fa-fade fa-sm"></i><span> Messages</span></a></li>
                         <li id="fa-heart"><a href="department.php"><i class="fa-solid fa-fade fa-school"></i><span> Department</span></a>
                         </li>
                    </ul>
                    <div id="nav2">
                        
                         <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              MORE
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                   <a class="dropdown-item" href="myprofile.html">My Profile</a><br>
                                   <a class="dropdown-item" href="#"><?php
                                        echo $_SESSION['fullname'];
                                        ?></a><br>
                                   <a class="dropdown-item" href="logout.php">Log Out</a>
                              </div>
                         </div>
                        
                    </div>

               </div>
               <hr>
               <div id="main">
                    <div id="cards" style="border: 1px solid black; padding: 20px;">
                         <div>
                         <h3>BSED</h3>
                              <!-- post -->
                              <form @submit="fnSavePost($event)">
                                   <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>" id="">
                                   <input type="hidden" name="name" value="<?php echo $_SESSION['fullname']; ?>" id="">
                                   <div class="form-group">
                                        <label for="description">What's on your mind?</label>
                                        <textarea id="post" rows="5" class="form-control" name="description"></textarea>

                                   </div>
                                   <div class="form-group">
                                        <div>
                                             <input type="file"  name="productimage">                                             
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                             Post
                                        </button>
                                   </div>
                              </form>
                              <div class="card" v-for="post in posts">
                                   <div class="post">
                                        <div class="post-header">
                                             <img class="post-avatar" src="avatar.jpg" alt="Avatar">
                                             <h4 style="font-size: 17px; color: rgb(0, 0, 0);">{{post.names}}<br></h4>
                                             <div class="post-timestamp">
                                                  <p>{{post.date_created}}</p>
                                             </div>
                                        </div>
                                        <div class="card-content">
                                             <p>{{ post.description }}<br></p>
                                        </div>
                                        
                                        <img id="imahe" class="img-fluid" :src="'uploads/' + post.image" />
                                        <div class="post-actions">
                                             <!-- comment -->
                                             <div class="post-action"> <button type="button" data-toggle="modal" data-target="#mym" style="border: none;"><i class="fas fa-comment"></i>Comment</button></div>
                                             <div class="modal fade" id="mym" role="dialog">
                                                  <div class="modal-dialog">
                                                       <div class="modal-content">
                                                            <span class="close">&times;</span>
                                                            <form @submit="fnSaveComment($event)">
                                                                 <input type="hidden" name="pid" value="{{ post.post_id }}">
                                                                 <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']?>">
                                                                 <input type="hidden" name="uname" value="<?php echo $_SESSION['fullname']?>">
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
                                                  </div>
                                             </div>
                                             <!-- report -->
                                             <div class="post-action"> <button type="button" data-toggle="modal" data-target="#mymreport" style="border: none;"><i class="fas fa-cog"></i>Report</button></div>
                                             <div class="modal fade" id="mymreport" role="dialog">
                                                  <div class="modal-dialog">
                                                       <div class="modal-content">
                                                            <span class="close">&times;</span>
                                                            <form @submit="fnSaveReport($event)">
                                                            <?php $pid="{{ post.post_id }}";?>
                                                                 <input type="text" name="postid" v-if="post.post_id" value="{{ post.post_id }}">
                                                                 <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']?>">
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
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   
                              </div>
                         </div>
                    </div>
               </div>
               <div id="main2">
                    <div>
                        
                         <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                         CREATE EVENTS
                         </button>

                         <!-- event -->
                         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                   <form @submit="fnSaveEvent($event)">
                                        <input type="text" name="title" id="" placeholder="Title">
                                        <input type="date" name="date" id="" placeholder="date">
                                        <input type="text" name="events" id="" placeholder="Event">
                                        <button type="submit">create</button>
                                   </form>

                                   <div class="card" v-for="event in events">
                                        <div class="card-heading">
                                             <div class="cardtitle">
                                                  <h5>Event Title: {{ event.title }}<br></h5>
                                                  <h5>Date: {{ event.date }}</h5>
                                             </div>
                                        </div>
                                        <div class="card-content">
                                             <p>Content: {{ event.event }}<br></p><br>
                                        </div>
                                   </div>
                              </div>
                         </div>

                    </div>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
         
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#announceModal">
                    CREATE ANNOUNCEMENT
                    </button>

                    <!-- announcement -->
                    <div class="modal fade" id="announceModal" tabindex="-1" role="dialog" aria-labelledby="announceModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                         <div class="modal-content">
                              <form @submit="fnSaveAnnouncement($event)">
                                   <input type="text" name="title" id="" placeholder="Title">
                                   <input type="text" name="description" id="" placeholder="description">
                                   <button type="submit">announce</button>
                              </form>
                              <div class="card" v-for="announces in announce">
                                   <div class="card-heading">
                                        <div class="cardtitle">
                                             <h6>{{ announces.date_created}}</h6>
                                             <h5>Title: {{ announces.title }}<br></h5>
                                        </div>
                                        
                                   </div>
          
                                   <div class="card-content">
                                        <p>Content: {{ announces.description }}<br></p> <br><br>
                                   </div>
                              </div>
                         </div>
                    </div>
                 

               </div>
          </div>

     </div>
     <script src="jsfiles/script.js"></script>
     <script src="jsfiles/vue.3.js"></script>
     <script src="jsfiles/axios.js"></script>
     <script src="jsfiles/app.camp.js"></script>
</body>
<script src="jsfiles/home.js"></script>

</html>