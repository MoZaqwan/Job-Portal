<?php
include 'dbconfig2.php';
?>
<html>

<head>
      <link rel="stylesheet" href="../css/employer.css" />
      <!--../Styles/-->

      <title> Employer Account </title>
</head>

<body>

      <div class="dv1">

            <h1 class="hd1"> Create new account </h1>

            <h2 class="hd2"> Employer Account </h2>

      </div>

      <div class="dv2">
            <!-- <img src="../Images/download.jpg"> -->


            <form method="post" action="signup_config.php" >

                  <input hidden name="employer">
                  <label class="lb"> Company Name </label>
                  <br>
                  <input type="name" placeholder="Enter organization name" class="ip" required id="comp_name" name="company_name" />
                  <br> <br>

                  <label class="lb"> Company Registration Number </label>
                  <br>
                  <input type="name" placeholder="Enter company registration number" class="ip" required id="comp_regno" name="company_register_num" />
                  <br> <br>


                  <label class="lb"> Email </label> </br>
                  <input type="email" placeholder="Enter a valid email" class="ip" required id="mail" name="email" />
                  <br> <br>

                  <label class="lb"> Username </label> </br>
                  <input type="text" placeholder="Enter your username" class="ip" required id="u_name" name="username" />
                  <br> <br>


                  <label class="lb"> Location </label> </br>
                  <input type="text" placeholder="Enter company address" class="ip" required id="lctn" name="location" />
                  <br> <br>

                  <label class="lb"> Company description </label> </br>
                  <textarea class="tx" id="com_des" name="company_description"> Please include your company description here</textarea>
                  <br> <br>

                  <label class="lb"> Password </label> </br>
                  <input type="Password" class="ip" required id="pass" name="password" />
                  </br> <br>

                  <label class="lb"> Confirm password </label> </br>
                  <input type="password" class="ip" required id="pass" name="re_password" />
                  </br>
                  </br>

                  <?php
                  if (!empty($_GET)) {
                        // if ($_GET['pwd'] == 'passwordincorrect' || $_GET['username'] == 'credentialinvalid') {
                        //       echo '<p class="Error">Username Incorrect</p>';
                        // }
                         
                              if ($_GET['error'] == 'passworddidntmatch') {
                                    echo '<p
                                            class="warning" 
                                            style="color:red;
                                            text-align:center;
                                            font-size: 14px;
                                         ">Password Mismatched!</p>';
									echo '<script type ="text/JavaScript">';  
									echo 'alert("Passwords doesn\'t match, please re-enter password!")';  
									echo '</script>';
                              }

                              if ($_GET['error'] == 'usernamealreadytaken') {
                                    echo '<p
                                           class="warning" 
                                           style="color:red;
                                           text-align:center;
                                           font-size: 14px;
                                        ">Username Already Taken</p>';
									echo '<script type ="text/JavaScript">';  
									echo 'alert("Username already taken, please enter another username")';  
									echo '</script>';
                              }
                        
                  }
                  ?>

      </div>

      <div class="dv3">
            <input type="submit" value="Create a new account" class="sub" id="sub" name="employer_sign_up" />
      </div>

      </form>


</body>

</html>