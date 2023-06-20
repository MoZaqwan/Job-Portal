<?php
session_start();
include 'dbconfig2.php'
?>

<html lang="en">

<head>
      <link href="../css/dahboard.css" rel="stylesheet" />
      <link href="../css/header.css" rel="stylesheet" />
      <script defer src="../js/dashboard.js"></script>
      <script defer src="../js/header.js"></script>
      <script defer src="../js/home.js"></script>
      <title>Document</title>
</head>

<body>
      <header>
            <?php include 'header.php'; 
			/* echo $_SESSION['userID']; */?>
			
      </header>

      <div class="dashboard">

            <div class="menu">
                  <div class="menu-btns">
                        <a id="dashboard" class="menu-btn">Dashboard</a>
                        <a id="posted" class="menu-btn">Posted Jobs</a>
                        <a id="applicants" class="menu-btn">Applicants</a>
                        <a id="newJob" class="menu-btn">New Job</a>
                        <a id="myProfile" class="menu-btn">My Profile</a>
                  </div>
            </div>

            <div class="interface">

                  <div id="main-dashboard" class="main-dahboard">
                        <?php include 'dashboard_main.php' ?>
                  </div>

                  <div id="publihed-posts" class="published">
                        <table class="published-job-post-table active">
                              <thead>
                                    <tr>
                                          <th>Id</th>
                                          <th>Title</th>
                                          <th>Published Date</th>
                                          <th>Closing Date</th>
                                          <th>Edit</th>
                                          <th>Delete</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php include 'dashboard_employer_posted.php' ?>
                              </tbody>
                        </table>
                  </div>

                  <div id="recieved-applicants" class="applicants">
                        <table class="recieved-application-table">
                              <thead>
                                    <tr>
                                          <th>Id</th>
                                          <th>Name</th>
                                          <th>Title</th>
                                          <th>Email</th>
                                          <th>Download CV</th>

                                    </tr>
                              </thead>
                              <tbody>
                                    <?php include 'dashboard_applicants.php' ?>
                              </tbody>
                        </table>
                  </div>

                  <div id="vacancy-published" class="vacancy-publish">
                        <?php include 'dashboard_employer_newpost.php' ?>
                  </div>

                  <div id="edit-profile" class="edit">
                        <div class="my_profile">
                              <?php include 'dashboard_employer_myprofile.php' ?>
                        </div>
                  </div>
            </div>

      </div>

</body>


</html>