<?php

// Include database connection and fetch user data
include('../includes/dbconn.php');
include('../includes/fetchUserData.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoXchange | Profile</title>
    <!-- ===== BOX ICONS ===== -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../style/SidebarUser.css">

    <!-------------------STYLE PROFILE SECTION--------------------->
    <style>
      body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Style inputs */
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Create three columns that float next to eachother */
.column {
  float: left;
  width: 33.33%; /* Set the width of each column to 33.33% */
  margin-top: 6px;
  padding: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

/*Style add profile pic*/

.profile {
  display: flex;
  align-items: center;
}

.avatar {
  position: relative;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  overflow: hidden;
  margin-right: 20px;
  cursor: pointer;
}

.avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.change-text {
  position: absolute;
  bottom: 4px;
  left: 50%;
  transform: translateX(-50%);
  background-color: rgba(0, 0, 0, 0.7);
  color: #fff;
  padding: 4px 8px;
  font-size: 12px;
  opacity: 0;
  transition: opacity 0.2s ease;
}

.avatar:hover .change-text {
  opacity: 1;
}

.avatar {
  vertical-align: middle;
  width: 150px;
  height: 150px;
  border-radius: 150%;
}
    </style>
    <!------------------STYLE PROFILE SECTION--------------------->



</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <?php include('sidebar-1.php'); ?>
        <!-- ========================= Main ==================== -->
        <div class="main">
            <?php include('header.php'); ?>
            <div class="content">
                <div clas="nav-title"><h3>Profile</h3></div>
                <!-- !!!!!!!!!!CODES HERE!!!!!!!! -->

                <!--PROFILE PIC-->
                <div class="row">
                  <div class="column">                    
                    <div class="profile">
                      <label for="profile-picture" class="avatar">
                        <img src="../images/avatar.png" alt="Avatar" class="avatar">
                         <span class="change-text">Tap to change</span>
                      </label>
                      <input type="file" id="profile-picture" accept="image/*" hidden>
                    </div>
                  </div>
                  <!--PROFILE PIC-->


                  <!--PROFILE DETAILS-->
                  <div class="column">
                    <form action="/action_page.php">
                      <label for="uname">Username</label>
                      <input type="text" id="uname" name="username" placeholder="Enter username">
                      <label for="fname">First Name</label>
                      <input type="text" id="fname" name="firstname" placeholder="Enter first name">
                      <label for="lname">Last Name</label>
                      <input type="text" id="lname" name="lastname" placeholder="Enter name">
                      
                      <label for="nphone">Phone</label>
                      <input type="text" id="nphone" name="nophone" placeholder="Enter phone">
                      <label for="aemail">Email</label>
                      <input type="text" id="aemail" name="addemail" placeholder="Enter email">
                      
                      </div>
                     <div class = "column">
                      <label for="address">Address</label>
                      <textarea id="address" name="address" placeholder="Enter address" style="height:170px"></textarea>
                      <input type="submit" value="Submit">
                      </div>
                    </form>
                  </div>
              </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>