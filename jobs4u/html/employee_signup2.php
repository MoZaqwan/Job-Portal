<?php


include 'dbconfig2.php';

?>



<html>

<head>
      <link rel="stylesheet" href="../css/employee.css" />

      <title> Employee Account </title>
</head>

<body>

      <div class="dv1">

            <h1 class="hd1"> Create new account </h1>

            <h2 class="hd2"> Employee Account </h2>

      </div>

      <div class="dv2">


            <form method="post" action="signup_config.php">

                  <input hidden name="employee">
                  <label class="lb"> <b> First Name </b> </label>
                  <br>
                  <input type="name" placeholder="Enter your first name" class="ip" required id="employee_name" name="first_name" />
                  <br> <br>
                  <label class="lb"> <b> Last Name </b> </label>
                  <br>
                  <input type="name" placeholder="Enter your last name" class="ip" required id="last_name" name="last_name" />
                  <br><br>
                  <label class="lb"><b> Email </b></label> </br>
                  <input type="email" placeholder="Enter a valid email" class="ip" required id="employee_mail" name="email" />
                  <br> <br>
                  <label class="lb"><b> Username </b></label> </br>
                  <input type="text" placeholder="Enter your username" class="ip" required id="employee_uname" name="user_name" />
                  <br> <br>


                  <label class="lb"> <b>Password </b> </label> </br>
                  <input type="Password" class="ip" required id="employee_pass" name="password" />
                  </br> <br>
                  <label class="lb"><b> Confirm password </b> </label> </br>
                  <input type="password" class="ip" required id="employee_conpass" name="re_password" />
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
            <input type="submit" value="Create a new account" class="sub" id="employee_sub" name="employee_sign_up" />
      </div>

      </form>
      <!-- php
        if(isset($_GET["error"])){
              if($_GET["error"] == "passworddidntmatch"){
                    echo "<p>Password you entered are didn't matched</p>";
              }
        }
        else if(isset($_GET["error"] == "usakeernamealreadytn")){
              echo "<p>Username already taken</p>";
        }
      ?> -->


</body>

</html>